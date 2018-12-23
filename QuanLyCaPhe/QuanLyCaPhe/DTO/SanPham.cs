using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;


namespace QuanLyCaPhe.DTO
{
    public class SanPham
    {
        public SanPham(int IDSanPham, string TenSanPham, int LoaiSP, float GiaTien)
        {
            this.IDSanPham1 = IDSanPham;
            this.TenSanPham1 = TenSanPham;
            this.LoaiSP1 = LoaiSP;
            this.GiaTien1 = GiaTien;
        }

        public SanPham(DataRow row)
        {
            this.IDSanPham1 = (int)row["IDSanPham"];
            this.LoaiSP1 = (int)row["LoaiSP"];
            this.TenSanPham1 = row["TenSanPham"].ToString();
            this.GiaTien1 = (float)Convert.ToDouble(row["GiaTien"].ToString());
        }

        private  int IDSanPham;

        private int LoaiSP;

        private string TenSanPham;

        private float GiaTien;



        public float GiaTien1
        {
          get { return GiaTien; }
          set { GiaTien = value; }
        }

        public string TenSanPham1
        {
          get { return TenSanPham; }
          set { TenSanPham = value; }
        }

        public int LoaiSP1
        {
          get { return LoaiSP; }
          set { LoaiSP = value; }
        }

        public int IDSanPham1
        {
          get { return IDSanPham; }
          set { IDSanPham = value; }
        }


    }
}
