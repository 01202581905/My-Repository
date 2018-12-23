using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;

namespace QuanLyCaPhe.DTO
{
    public class HoaDon
    {
        public HoaDon(int IDHoaDon, DateTime? ThoiGianVao, DateTime? ThoiGianRa, int BanAn, int TrangThai, int Discount = 0)
        {
            this.IDHoaDon1 = IDHoaDon;
            this.ThoiGianVao1 = ThoiGianVao;
            this.ThoiGianRa1 = ThoiGianRa;
            this.BanAn1 = BanAn;
            this.TrangThai1 = TrangThai;
            this.Discount1 = Discount;
        }

        public HoaDon(DataRow row)
        {
            this.IDHoaDon1 = (int)row["IDHoaDon"];
            this.ThoiGianVao1 = (DateTime?)row["ThoiGianVao"];
            var ThoiGianRaTemp = row["ThoiGianRa"];
            if(ThoiGianRaTemp.ToString() != "")
                this.ThoiGianRa1 = (DateTime?)ThoiGianRaTemp;

            this.BanAn1 = (int)row["BanAn"];
            this.TrangThai1 = (int)row["TrangThai"];
            this.Discount1 = (int)row["Discount"];
        }
        private int IDHoaDon;

        private int Discount;

        private DateTime? ThoiGianVao;

        private DateTime? ThoiGianRa;

        private int BanAn;

        private int TrangThai;


        public int Discount1
        {
            get { return Discount; }
            set { Discount = value; }
        }

        public int IDHoaDon1
        {
            get { return IDHoaDon; }
            set { IDHoaDon = value; }
        }

        public DateTime? ThoiGianVao1
        {
            get { return ThoiGianVao; }
            set { ThoiGianVao = value; }
        }

        public DateTime? ThoiGianRa1
        {
            get { return ThoiGianRa; }
            set { ThoiGianRa = value; }
        }

        public int BanAn1
        {
            get { return BanAn; }
            set { BanAn = value; }
        }

        public int TrangThai1
        {
            get { return TrangThai; }
            set { TrangThai = value; }
        }
    }
}
