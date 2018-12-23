using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using QuanLyCaPhe.DAO;
using QuanLyCaPhe.DTO;
using System.Globalization;
using System.Threading;

namespace QuanLyCaPhe
{
    public partial class QuanLy : Form
    {
        private TaiKhoan LoginTaiKhoan;

        public TaiKhoan LoginTaiKhoan1
        {
            get { return LoginTaiKhoan; }
            set { LoginTaiKhoan = value; ChangeTaiKhoan(LoginTaiKhoan.PhanQuyen1); }
        }

        public QuanLy(TaiKhoan tk)
        {
            InitializeComponent();

            this.LoginTaiKhoan1 = tk;

            LoadBanAn();
           LoadCategory();
        }


        #region Method

        void ChangeTaiKhoan(int PhanQuyen)
        {
            adminToolStripMenuItem.Enabled = PhanQuyen == 1;
            thôngTinTàiKhoảnToolStripMenuItem.Text += " (" + LoginTaiKhoan1.Ten1 + ") "; 
        }

        void ShowHoaDon(int id)
        {
            lstvHoaDon.Items.Clear();
            List<QuanLyCaPhe.DTO.Menu> listCTHD = MenuDAO.Instance.GetListMenu(id);

            float TongTien = 0;
            foreach (QuanLyCaPhe.DTO.Menu item in listCTHD)
            {
                ListViewItem lvitem = new ListViewItem(item.FoodName1.ToString());
                lvitem.SubItems.Add(item.Count1.ToString());
                lvitem.SubItems.Add(item.Price1.ToString());
                lvitem.SubItems.Add(item.TotalPrice1.ToString());
                TongTien += item.TotalPrice1;
                lstvHoaDon.Items.Add(lvitem);
            }
            CultureInfo cul = new CultureInfo("vi-VN");

            Thread.CurrentThread.CurrentCulture = cul;

           txtTongTien.Text = TongTien.ToString("c",cul);

        }


        void LoadCategory()
        {
            List<Category> listctgr = CategoryDAO.Instance.GetListCategory();
            cmbLoaiSP.DataSource = listctgr;
            cmbLoaiSP.DisplayMember = "TenLoaiSP1";
            
        }

        void LoadSanPham(int id)
        {
            List<SanPham> listSP = SanPhamDAO.Instance.GetSanPhamByID(id);
            cmbSP.DataSource = listSP;
            cmbSP.DisplayMember = "TenSanPham1";
        }

        void btn_Click(object sender, EventArgs e)
        {
            int BanAnID = ((sender as Button).Tag as BanAn).IDBanAn1;
            lstvHoaDon.Tag = (sender as Button).Tag;
            ShowHoaDon(BanAnID);
        }

        void LoadBanAn()
        {
            flowlayoutBanAn.Controls.Clear();
            List<BanAn> tablelist =  BanAnDAO.Instance.LoadTableList();

            foreach (BanAn item in tablelist)
            {
                Button btn = new Button() { Width = BanAnDAO.btnWidth, Height = BanAnDAO.btnHeight };
                btn.Text = item.TenBanAn1 + Environment.NewLine + item.TrangThai1;
                btn.Click += btn_Click;
                btn.Tag = item;
                switch (item.TrangThai1)
                {
                    case "Trống":
                        btn.BackColor = Color.Aqua;
                        break;
                    default:
                        btn.BackColor = Color.LightGoldenrodYellow;
                        break;
                }
                flowlayoutBanAn.Controls.Add(btn);

            }
        }

        #endregion





        #region event

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            int id = 0;
            ComboBox cb = sender as ComboBox;
            if (cb.SelectedItem == null)
                return;

            Category selected = cb.SelectedItem as Category;
            id = selected.IDLoaiSP1;

            LoadSanPham(id);
        }

        private void numericUpDown1_ValueChanged(object sender, EventArgs e)
        {

        }

        private void đăngXuấtToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void thôngTinToolStripMenuItem_Click(object sender, EventArgs e)
        {
            ThongTinCaNhan ttcn = new ThongTinCaNhan(LoginTaiKhoan1);
            ttcn.ShowDialog();
        }

        private void adminToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Admin ad = new Admin();
            ad.loginAcc = LoginTaiKhoan;
            ad.InsertSanPham += ad_InsertSanPham;
            ad.UpdateSanPham += ad_UpdateSanPham;
            ad.DeleteSanPham += ad_DeleteSanPham;
            ad.ShowDialog();
        }

        void ad_InsertSanPham(object sender, EventArgs e)
        {
            LoadSanPham((cmbLoaiSP.SelectedItem as Category).IDLoaiSP1);
            if(lstvHoaDon.Tag != null)
                ShowHoaDon((lstvHoaDon.Tag as BanAn).IDBanAn1);
        }

        void ad_UpdateSanPham(object sender, EventArgs e)
        {
            LoadSanPham((cmbLoaiSP.SelectedItem as Category).IDLoaiSP1);
            if (lstvHoaDon.Tag != null)
                ShowHoaDon((lstvHoaDon.Tag as BanAn).IDBanAn1);
        }

        void ad_DeleteSanPham(object sender, EventArgs e)
        {
            LoadSanPham((cmbLoaiSP.SelectedItem as Category).IDLoaiSP1);
            if (lstvHoaDon.Tag != null)
                ShowHoaDon((lstvHoaDon.Tag as BanAn).IDBanAn1);
            LoadBanAn();
        }

        private void btnThemSP_Click(object sender, EventArgs e)
        {
            BanAn banan = lstvHoaDon.Tag as BanAn;
            if (banan == null)
            {
                MessageBox.Show("Hãy chọn bàn trước khi thêm sản phẩm");
                return;
            }
            int idHD = HoaDonDAO.Instance.GetBillByTableID(banan.IDBanAn1);

            int idSanPham = (cmbSP.SelectedItem as SanPham).IDSanPham1;

            int SoLuong = (int)nmrThemMon.Value;


            if (idHD == -1)
            {
                HoaDonDAO.Instance.InsertHoaDon(banan.IDBanAn1);

                ChiTietHoaDonDAO.Instance.InsertChiTietHoaDon(HoaDonDAO.Instance.GetMaxIDHoaDon(), idSanPham, SoLuong);
            }
            else
            {
                ChiTietHoaDonDAO.Instance.InsertChiTietHoaDon(idHD, idSanPham, SoLuong);
            }
            ShowHoaDon(banan.IDBanAn1);

            LoadBanAn();
        }

        private void btnThanhToan_Click(object sender, EventArgs e)
        {
            BanAn banan = lstvHoaDon.Tag as BanAn;

            int idHoaDon = HoaDonDAO.Instance.GetBillByTableID(banan.IDBanAn1);
            int discount = (int)nmrGG.Value;

            double totalprice =  Convert.ToDouble(txtTongTien.Text.Split(',')[0]);

            double totaldiscount = 0;
            if (discount == 0)
            {
                totaldiscount = 0;
            }
            else
            {
                totaldiscount = (totalprice / 100) * discount;
            }
            double finaltotalPrice = totalprice - totaldiscount ;

            if (idHoaDon != -1)
            {
                if (MessageBox.Show(string.Format("Bạn chắc chắn muốn thanh toán hóa đơn  cho bàn :{0} \n  \nTiền : {1} \n \n Tiền được giảm giá : {2}  \n \n Tổng Tiền : {3} ", banan.TenBanAn1, totalprice, totaldiscount, finaltotalPrice), "Thông Báo", MessageBoxButtons.OKCancel) == System.Windows.Forms.DialogResult.OK)
                {
                    HoaDonDAO.Instance.ThanhToan(idHoaDon, discount, (float)finaltotalPrice);
                    ShowHoaDon(banan.IDBanAn1);
                    LoadBanAn();
                }
            }
        }

        #endregion

        // trống
        private void lstvHoaDon_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void btnGiamGia_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
