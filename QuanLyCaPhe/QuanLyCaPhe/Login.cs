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

namespace QuanLyCaPhe
{
    public partial class formLogin : Form
    {
        public formLogin()
        {
            InitializeComponent();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            string username = txtUserName.Text;
            string password = txtPassWord.Text;
            if (Login(username,password))
            {
                TaiKhoan loginTK = TaiKhoanDAO.Instance.GetTaiKhoanByUserName(username);
                QuanLy ql = new QuanLy(loginTK);
                this.Hide();
                ql.ShowDialog();
                this.Show();
            }
            else
            {
                MessageBox.Show("Sai tên đăng nhập hoặc mật khẩu !");
            }
        }

        bool Login(string username , string password)
        {
            return TaiKhoanDAO.Instance.Login(username, password);
        }

        private void btnThoat_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }
    }
}
