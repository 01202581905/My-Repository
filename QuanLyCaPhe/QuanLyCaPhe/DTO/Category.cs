using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;

namespace QuanLyCaPhe.DTO
{
    public class Category
    {

        public Category(int IDLoaiSP, string TenLoaiSP)
        {
            this.IDLoaiSP1 = IDLoaiSP;
            this.TenLoaiSP1 = TenLoaiSP;
        }

        public Category(DataRow row)
        {
            this.IDLoaiSP1 = (int)row["IDLoaiSP"];
            this.TenLoaiSP1 = row["TenLoaiSP"].ToString();
        }
        private int IDLoaiSP;

        private string TenLoaiSP;



        public string TenLoaiSP1
        {
            get { return TenLoaiSP; }
            set { TenLoaiSP = value; }
        }

        public int IDLoaiSP1
        {
            get { return IDLoaiSP; }
            set { IDLoaiSP = value; }
        }

    }
}
