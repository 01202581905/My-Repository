using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;

namespace QuanLyCaPhe.DTO
{
    public class BanAn
    {
        public BanAn(int IDBanAn, string TenBanAn, string TrangThai)
        {
            this.IDBanAn1 = IDBanAn;
            this.TenBanAn1 = TenBanAn;
            this.TrangThai1 = TrangThai;
        }

        public BanAn(DataRow row)
        {
            this.IDBanAn1 = (int)row["IDBanAn"];
            this.TenBanAn1 = row["TenBanAn"].ToString();
            this.TrangThai1 = row["TrangThai"].ToString();

        }
        private int IDBanAn;

        private string TenBanAn;

        private string TrangThai;



        public int IDBanAn1
        {
            get { return IDBanAn; }
            set { IDBanAn = value; }
        }

        public string TenBanAn1
        {
            get { return TenBanAn; }
            set { TenBanAn = value; }
        }

        public string TrangThai1
        {
            get { return TrangThai; }
            set { TrangThai = value; }
        }
    }
}
