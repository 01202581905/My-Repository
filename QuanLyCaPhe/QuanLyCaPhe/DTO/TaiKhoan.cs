using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;

namespace QuanLyCaPhe.DTO
{
    public class TaiKhoan
    {

        public TaiKhoan(int IDTaiKhoan, string TenTaiKhoan,  string Ten , int PhanQuyen , string MatKhau = null )
        {
            this.IDTaiKhoan1 = IDTaiKhoan;
            this.TenTaiKhoan1 = TenTaiKhoan;
            this.MatKhau1 = MatKhau;
            this.Ten1 = Ten;
            this.PhanQuyen1 = PhanQuyen;
        }

        public TaiKhoan(DataRow row)
        {
            this.IDTaiKhoan1 = (int)row["IDTaiKhoan"];
            this.TenTaiKhoan1 = row["TenTaiKhoan"].ToString();
            this.MatKhau1 = row["MatKhau"].ToString();
            this.Ten1 = row["Ten"].ToString();
            this.PhanQuyen1 = (int)row["PhanQuyen"];
        }
        private int IDTaiKhoan;

        private string TenTaiKhoan;

        private string MatKhau;

        private string Ten;

        private int PhanQuyen;




        public int PhanQuyen1
        {
            get { return PhanQuyen; }
            set { PhanQuyen = value; }
        }

        public string Ten1
        {
            get { return Ten; }
            set { Ten = value; }
        }

        public string MatKhau1
        {
            get { return MatKhau; }
            set { MatKhau = value; }
        }

        public string TenTaiKhoan1
        {
            get { return TenTaiKhoan; }
            set { TenTaiKhoan = value; }
        }

        public int IDTaiKhoan1
        {
            get { return IDTaiKhoan; }
            set { IDTaiKhoan = value; }
        }
    }
}
