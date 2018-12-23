using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;

namespace QuanLyCaPhe.DTO
{
    public class ChiTietHoaDon
    {
        public ChiTietHoaDon(int IDCTHoaDon , int IDSanPham , int IDHoaDon , int SoLuong, int GiaTien)
        {
            this.IDCTHoaDon1 = IDCTHoaDon;
            this.IDHoaDon1 = IDHoaDon;
            this.IDSanPham1 = IDSanPham;
            this.SoLuong1 = SoLuong;
            this.GiaTien1 = GiaTien;
        }

        public ChiTietHoaDon(DataRow row)
        {
            this.IDCTHoaDon1 = (int)row["IDCTHoaDon"];
            this.IDHoaDon1 = (int)row["IDHoaDon"];
            this.IDSanPham1 = (int)row["IDSanPham"];
            this.SoLuong1 = (int)row["SoLuong"];
            this.GiaTien1 = (int)row["GiaTien"];
        }
        private int IDCTHoaDon;

        private int IDSanPham;

        private int IDHoaDon;

        private int SoLuong;

        private int GiaTien;



        public int GiaTien1
        {
            get { return GiaTien; }
            set { GiaTien = value; }
        }

        public int SoLuong1
        {
            get { return SoLuong; }
            set { SoLuong = value; }
        }

        public int IDHoaDon1
        {
            get { return IDHoaDon; }
            set { IDHoaDon = value; }
        }

        public int IDSanPham1
        {
            get { return IDSanPham; }
            set { IDSanPham = value; }
        }

        public int IDCTHoaDon1
        {
            get { return IDCTHoaDon; }
            set { IDCTHoaDon = value; }
        }
    }
}