using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;

namespace QuanLyCaPhe.DTO
{
    public class Menu
    {
        public Menu(string TenSanPham, int SoLuong, float GiaTien, float Tongtien)
        {
            this.FoodName1 = TenSanPham;
            this.Count1 = SoLuong;
            this.Price1 = GiaTien;
            this.TotalPrice1 = Tongtien;
        }

        public Menu(DataRow row)
        {
            this.FoodName1 = row["TenSanPham"].ToString();
            this.Count1 = (int)row["SoLuong"];
            this.Price1 = (float)Convert.ToDouble(row["GiaTien"].ToString());
            this.TotalPrice1 = (float)Convert.ToDouble(row["Tongtien"].ToString());
        }

        private string FoodName;

        private int Count;

        private float Price;

        private float TotalPrice;



        public float TotalPrice1
        {
            get { return TotalPrice; }
            set { TotalPrice = value; }
        }

        public float Price1
        {
            get { return Price; }
            set { Price = value; }
        }

        public int Count1
        {
            get { return Count; }
            set { Count = value; }
        }

        public string FoodName1
        {
            get { return FoodName; }
            set { FoodName = value; }
        }
    }
}