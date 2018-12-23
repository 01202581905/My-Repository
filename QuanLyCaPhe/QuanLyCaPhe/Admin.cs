using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data;
using System.Data.Sql;
using System.Data.SqlClient;
using QuanLyCaPhe.DAO;
using QuanLyCaPhe.DTO;

namespace QuanLyCaPhe
{
    public partial class Admin : Form
    {
        BindingSource foodlist = new BindingSource();

        BindingSource accountlist = new BindingSource();

        BindingSource categoryfoodlist = new BindingSource();

        BindingSource bananlist = new BindingSource();

        public TaiKhoan loginAcc;
        public Admin()
        {
            InitializeComponent();

            LoadDateTimePicker();

            dtgSanPham.DataSource = foodlist;

            dtgTaiKhoan.DataSource = accountlist;

            dtgLoaiSP.DataSource = categoryfoodlist;

            dtgBanAn.DataSource = bananlist;

            LoadListByDate(dttinput.Value, dttoutput.Value);

            LoadListSanPham();

            LoadListCategorySanPham();

            LoadTaiKhoan();

            LoadBanAn();

            LoadCategorySanPham(cbLoaiSP);

            AddSanPhamBinding();

            AddCategorySanPhamBinding();

            AddTaiKhoanBinding();

            AddBanAnBinding();

           
        }

        #region Methods

        void LoadData()
        {

        }

        void LoadListByDate(DateTime tgvao, DateTime tgra)
        {
            dtgThongKe.DataSource =  HoaDonDAO.Instance.GetListHoaDonByDate(tgvao, tgra);
        }

        void LoadDateTimePicker()
        {
            DateTime today = DateTime.Now;
            dttinput.Value = new DateTime(today.Year, today.Month, 1);
            dttoutput.Value = dttinput.Value.AddMonths(1).AddDays(-1);
        }

        void LoadListSanPham()
        {
            foodlist.DataSource = SanPhamDAO.Instance.GetListSanPham();
        }

        void LoadListCategorySanPham()
        {
            categoryfoodlist.DataSource = CategoryDAO.Instance.GetListCategory();
        }

        void LoadBanAn()
        {
            bananlist.DataSource = BanAnDAO.Instance.LoadTableList();
        }

        void AddSanPhamBinding()
        {
            txtSPTen.DataBindings.Add(new Binding("Text", dtgSanPham.DataSource, "TenSanPham1", true , DataSourceUpdateMode.Never));
            txtSPID.DataBindings.Add(new Binding("Text", dtgSanPham.DataSource, "IDSanPham1", true, DataSourceUpdateMode.Never));
            nmrSPGia.DataBindings.Add(new Binding("Value", dtgSanPham.DataSource, "GiaTien1", true, DataSourceUpdateMode.Never));


        }

        void AddCategorySanPhamBinding()
        {
            txtLSPID.DataBindings.Add(new Binding("Text", dtgLoaiSP.DataSource, "IDLoaiSP1", true, DataSourceUpdateMode.Never));
            txtLSPTen.DataBindings.Add(new Binding("Text", dtgLoaiSP.DataSource, "TenLoaiSP1", true, DataSourceUpdateMode.Never));
        }

        void AddTaiKhoanBinding()
        {
            txtTKtenTK.DataBindings.Add(new Binding("Text", dtgTaiKhoan.DataSource, "TenTaiKhoan", true, DataSourceUpdateMode.Never));
            txtTKTen.DataBindings.Add(new Binding("Text", dtgTaiKhoan.DataSource, "Ten", true, DataSourceUpdateMode.Never));
            nmbLoaiTK.DataBindings.Add(new Binding("Value", dtgTaiKhoan.DataSource, "PhanQuyen", true, DataSourceUpdateMode.Never));
        }

        void AddBanAnBinding()
        {
            txtBAID.DataBindings.Add(new Binding("Text", dtgBanAn.DataSource, "IDBanAn1", true, DataSourceUpdateMode.Never));
            txtBATem.DataBindings.Add(new Binding("Text", dtgBanAn.DataSource, "TenBanAn1", true, DataSourceUpdateMode.Never));
            txtBATrangThai.DataBindings.Add(new Binding("Text", dtgBanAn.DataSource, "TrangThai1", true, DataSourceUpdateMode.Never));
        }

        void LoadTaiKhoan()
        {
            accountlist.DataSource = TaiKhoanDAO.Instance.GetListTaiKhoan();
        }

        void LoadCategorySanPham(ComboBox cbLoaiSP)
        {
            cbLoaiSP.DataSource = CategoryDAO.Instance.GetListCategory();
            cbLoaiSP.DisplayMember = "TenLoaiSP1";
        }

        List<SanPham> SearchSanPhamByName(string name)
        {
            List<SanPham> listSanPham = SanPhamDAO.Instance.SearchSanPhamByName(name);

            return listSanPham;
        }

        void AddAccount(string username, string ten, int phanquyen)
        {
            if (TaiKhoanDAO.Instance.InsertAccount(username, ten, phanquyen))
            {
                MessageBox.Show("Thêm tài khoản thành công");
            }
            else
            {
                MessageBox.Show("Thêm tài khoản thất bại");
            }
            LoadTaiKhoan();
        }

        void EditAccount(string username, string ten, int phanquyen)
        {
            if (TaiKhoanDAO.Instance.UPdateAccount(username, ten, phanquyen))
            {
                MessageBox.Show("Cập nhật tài khoản thành công");
            }
            else
            {
                MessageBox.Show("Cập nhật tài khoản thất bại");
            }
            LoadTaiKhoan();
        }

        void DeleteAccount(string username)
        {
            if (loginAcc.TenTaiKhoan1.Equals(username))
            {
                MessageBox.Show("Tài khoản hiện đang sử dụng. Nên không thể xóa");
            }
            if (TaiKhoanDAO.Instance.DeleteAccount(username))
            {
                MessageBox.Show("Xóa tài khoản thành công");
            }
            else
            {
                MessageBox.Show("Xóa tài khoản thất bại");
            }
            LoadTaiKhoan();
        }

        void ResetPassword(string username)
        {
            if (TaiKhoanDAO.Instance.resetPassword(username))
            {
                MessageBox.Show("Đặt lại mật khẩu thành công");
            }
            else
            {
                MessageBox.Show("Đặt lại mật khẩu thất bại");
            }
        }


        #endregion



        #region Event


        private void btnThongKe_Click(object sender, EventArgs e)
        {
            LoadListByDate(dttinput.Value , dttoutput.Value);

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void dtgThongKe_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void btnSPXem_Click(object sender, EventArgs e)
        {
            LoadListSanPham();
        }

        private void txtSPID_TextChanged(object sender, EventArgs e)
        {
            try
            {
                if (dtgSanPham.SelectedCells.Count > 0)
                {
                    int id = (int)dtgSanPham.SelectedCells[0].OwningRow.Cells["LoaiSP1"].Value;

                    Category category = CategoryDAO.Instance.GetCategoryByID(id);

                    cbLoaiSP.SelectedItem = category;

                    int index = -1;
                    int i = 0;
                    foreach (Category item in cbLoaiSP.Items)
                    {
                        if (item.IDLoaiSP1 == category.IDLoaiSP1)
                        {
                            index = i;
                            break;
                        }
                        i++;
                    }
                    cbLoaiSP.SelectedIndex = index;
                }
            }
            catch
            {

            }
        }

        private void btnSPthem_Click(object sender, EventArgs e)
        {
            string name = txtSPTen.Text;
            int id = (cbLoaiSP.SelectedItem as Category).IDLoaiSP1;
            float price = (float)nmrSPGia.Value;

            if (SanPhamDAO.Instance.InsertSanPham(name, id, price))
            {
                MessageBox.Show("Thêm món thành công");
                LoadListSanPham();
                if (insertSanPham != null)
                    insertSanPham(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Thêm không thành công");
            }
        }

        private void btmSpxoa_Click(object sender, EventArgs e)
        {
            int idSP = Convert.ToInt32(txtSPID.Text);

            if (SanPhamDAO.Instance.DeleteSanPham(idSP))
            {
                MessageBox.Show("Xóa món ăn thành công");
                LoadListSanPham();
                if (deleteSanPham != null)
                    deleteSanPham(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Xóa không thành công");
            }
        }

        private void btnSPSua_Click(object sender, EventArgs e)
        {
            string name = txtSPTen.Text;
            int id = (cbLoaiSP.SelectedItem as Category).IDLoaiSP1;
            float price = (float)nmrSPGia.Value;
            int idSP = Convert.ToInt32(txtSPID.Text);

            if (SanPhamDAO.Instance.UPdateSanPham(idSP, name, id, price))
            {
                MessageBox.Show("Chỉnh sữa món ăn thành công");
                LoadListSanPham();
                if (updateSanPham != null)
                    updateSanPham(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Chỉnh sữa món ăn không thành công");
            }
        }

        private void btnSPTim_Click(object sender, EventArgs e)
        {
           foodlist.DataSource = SearchSanPhamByName(txtSearchSP.Text);
        }


        private void btnLSPThem_Click(object sender, EventArgs e)
        {
            string name = txtLSPTen.Text;
            if (CategoryDAO.Instance.InsertLoaiSanPham(name))
            {
                MessageBox.Show("Thêm loại món ăn thành công");
                LoadListCategorySanPham();
            }
            else
            {
                MessageBox.Show("Thêm không thành công");
                LoadListCategorySanPham();
            }
        }

        private void btnLSPXem_Click(object sender, EventArgs e)
        {
            LoadListCategorySanPham();
        }

        private void btnLSPSua_Click(object sender, EventArgs e)
        {
            string name = txtLSPTen.Text;
            int id = Convert.ToInt32(txtLSPID.Text);

            if (CategoryDAO.Instance.UPdateLoaiSanPham(id , name))
            {
                MessageBox.Show("Chỉnh sữa loại món ăn thành công");
                LoadListCategorySanPham();
            }
            else
            {
                MessageBox.Show("Chỉnh sữa loại món ăn không thành công");
                LoadListCategorySanPham();
            }
        }

        private void btnLSPXoa_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(txtLSPID.Text);

            if (CategoryDAO.Instance.DeleteLoaiSanPham(id))
            {
                MessageBox.Show("Xóa loại món ăn thành công");
                LoadListCategorySanPham();
            }
            else
            {
                MessageBox.Show("Xóa loại không thành công");
                LoadListCategorySanPham();
            }
        }



        private void btnTKXem_Click(object sender, EventArgs e)
        {
            LoadTaiKhoan();
        }

       private void btnTKThem_Click(object sender, EventArgs e)
        {
            string username = txtTKtenTK.Text;
            string ten = txtTKTen.Text;
            int phanquyen = (int)nmbLoaiTK.Value;

            AddAccount(username, ten, phanquyen);
        }

        private void btnTKXoa_Click(object sender, EventArgs e)
        {
            string username = txtTKtenTK.Text;
            DeleteAccount(username);
        }

        private void btnTKSua_Click(object sender, EventArgs e)
        {
            string username = txtTKtenTK.Text;
            string ten = txtTKTen.Text;
            int phanquyen = (int)nmbLoaiTK.Value;

            EditAccount(username, ten, phanquyen);
        }

        private void btnTKMK_Click(object sender, EventArgs e)
        {
            string username = txtTKtenTK.Text;
            ResetPassword(username);
        }


        private void btnBAThem_Click(object sender, EventArgs e)
        {
            string name = txtBATem.Text;
            string trangthai = txtBATrangThai.Text;
            if(BanAnDAO.Instance.InsertBanAn(name,trangthai))
            {
                MessageBox.Show("Thêm bàn ăn thành công");
                LoadBanAn();

            }
            else
            {
                MessageBox.Show("Thêm bàn ăn thất bại");
                LoadBanAn();
            }
        }

        private void btnBASua_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(txtBAID.Text);
            string name = txtBATem.Text;
            if(BanAnDAO.Instance.UPdateBanAn(name,id))
            {
                MessageBox.Show("Chỉnh sửa bàn ăn thành công");
                LoadBanAn();
            }
            else
            {
                MessageBox.Show("Chỉnh sửa bàn ăn thất bại");
                LoadBanAn();
            }
        }

        private void btnBAXoa_Click(object sender, EventArgs e)
        {
            int idbanan = Convert.ToInt32(txtBAID.Text);
            if(BanAnDAO.Instance.DeleteBanAn(idbanan))
            {
                MessageBox.Show("Xóa bàn ăn thành công");
                LoadBanAn();
            }
            else
            {
                MessageBox.Show("Xóa bàn ăn khống thành công");
                LoadBanAn();
            }
        }
  

        private event EventHandler insertSanPham;
        public event EventHandler InsertSanPham
        {
            add { insertSanPham += value; }
            remove { insertSanPham -= value; }
        }

        private event EventHandler deleteSanPham;
        public event EventHandler DeleteSanPham
        {
            add { deleteSanPham += value; }
            remove { deleteSanPham -= value; }
        }

        private event EventHandler updateSanPham;
        public event EventHandler UpdateSanPham
        {
            add { updateSanPham += value; }
            remove { updateSanPham -= value; }
        }

        private void tbpThucAn_Click(object sender, EventArgs e)
        {

        }

        private void tbpTaiKhoan_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        #endregion

    }
}
