using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using QuanLyCaPhe.DTO;
using QuanLyCaPhe.DAO;

namespace QuanLyCaPhe
{
    public partial class ThongTinCaNhan : Form
    {
        private TaiKhoan LoginTaiKhoan;

        public TaiKhoan LoginTaiKhoan1
        {
            get { return LoginTaiKhoan; }
            set { LoginTaiKhoan = value; ChangeTaiKhoan(LoginTaiKhoan); }
        }


        public ThongTinCaNhan(TaiKhoan tk)
        {
            InitializeComponent();
            LoginTaiKhoan1 = tk;
        }

        void ChangeTaiKhoan(TaiKhoan tk)
        {
            txtTenTK.Text = LoginTaiKhoan1.TenTaiKhoan1;
            txtTenHT.Text = LoginTaiKhoan1.Ten1;
        }


        void UpdateTaiKhoan()
        {
            string name = txtTenHT.Text;
            string password = txtMatKhau.Text;
            string newpass = txtMatKhauMoi.Text;
            string renewpass = txtNhapLaiMKM.Text;
            string username = txtTenTK.Text;

            if (!newpass.Equals(renewpass))
            {
                MessageBox.Show(" Nhập lại mật khẩu mới chưa chính xác . Vui lòng nhập lại ! ");
            }
            else
            {
                if (TaiKhoanDAO.Instance.UpdateTaiKhoan(username, name, password, newpass))
                {
                    MessageBox.Show(" Cập nhật thông tin thành công ! ");
                }
                else
                {
                    MessageBox.Show(" Vui lòng điền đúng mật khẩu ");
                }

            }

        }


        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void btnThoat_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void btnCapNhat_Click(object sender, EventArgs e)
        {
            UpdateTaiKhoan();
        }
    }
}
