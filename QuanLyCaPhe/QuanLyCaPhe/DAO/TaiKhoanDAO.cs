using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;
using QuanLyCaPhe.DTO;

namespace QuanLyCaPhe.DAO
{
    public class TaiKhoanDAO
    {
        private static TaiKhoanDAO instance;

        public static TaiKhoanDAO Instance
        {
            get { if(instance == null) instance = new TaiKhoanDAO(); return instance; }
            private set { instance = value; }
        }

        private TaiKhoanDAO() { }

        public bool Login(string userName, string passWord)
        {
            string query = "Exec DangNhap @userName , @passWord";

            DataTable result = DataProvider.Instance.ExecuteQuery(query, new object[] { userName, passWord });
            return result.Rows.Count > 0;
        }

        public bool UpdateTaiKhoan(string username , string name , string password , string newpass)
        {

            int result = DataProvider.Instance.ExecuteNonQuery("Exec UpdateTaiKhoan @username , @tenhienthi , @matkhau , @newmatkhau ",new object[]{username , name , password , newpass });

            return result > 0;


        }

        public DataTable GetListTaiKhoan()
        {
            return DataProvider.Instance.ExecuteQuery("SELECT TenTaiKhoan , Ten , PhanQuyen FROM QuanLy");
        }

        public TaiKhoan GetTaiKhoanByUserName(string username)
        {
            string query="SELECT * FROM QuanLy WHERE TenTaiKhoan = '"+ username +"'";
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                return new TaiKhoan(item);
            }
            return null;
        }


       public bool InsertAccount(string username, string ten, int phanquyen)
        {
            string query = string.Format("INSERT INTO QuanLy(TenTaiKhoan ,Ten ,PhanQuyen) VALUES (N'{0}',N'{1}' , {2})", username, ten, phanquyen);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool UPdateAccount( string username, string ten, int phanquyen)
        {
            string query = string.Format("UPDATE QuanLy SET Ten = N'{0}' , PhanQuyen = {1} WHERE TenTaiKhoan = N'{2}'",  ten, phanquyen, username);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool DeleteAccount(string username)
        {
            string query = string.Format("DELETE QuanLy WHERE TenTaiKhoan = N'{0}'", username);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool resetPassword(string username)
        {
            string query = string.Format("UPDATE QuanLy SET MatKhau = 1 Where TenTaiKhoan = N'{0}' ", username);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }
    }
}
