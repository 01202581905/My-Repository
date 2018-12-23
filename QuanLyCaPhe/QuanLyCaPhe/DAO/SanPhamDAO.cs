using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;
using QuanLyCaPhe.DTO;

namespace QuanLyCaPhe.DAO
{
    public class SanPhamDAO
    {
        private static SanPhamDAO instance;

        public static SanPhamDAO Instance
        {
            get { if (instance == null) instance = new SanPhamDAO(); return SanPhamDAO.instance; }
            private set { SanPhamDAO.instance = value; }
        }

        private SanPhamDAO() { }

        public List<SanPham> GetSanPhamByID(int id)
        {
            List<SanPham> list = new List<SanPham>();
            string query = "SELECT * FROM SanPham WHERE LoaiSP = "+id;
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                SanPham food = new SanPham(item);
                list.Add(food);
            }
            return list;
        }

        public List<SanPham> GetListSanPham()
        {
            List<SanPham> list = new List<SanPham>();
            string query = "Select * from SanPham";
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                SanPham food = new SanPham(item);
                list.Add(food);
            }
            return list;
        }

        public List<SanPham> SearchSanPhamByName(string name)
        {
            List<SanPham> list = new List<SanPham>();
            string query = string.Format("Select * from SanPham WHERE TenSanPham like N'%{0}%'",name);
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                SanPham food = new SanPham(item);
                list.Add(food);
            }
            return list;
        }

        public bool InsertSanPham(string name , int id , float price)
        {
            string query = string.Format("INSERT INTO SanPham (TenSanPham ,LoaiSP ,GiaTien) VALUES (N'{0}',{1} , {2})", name , id , price);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool UPdateSanPham(int idSP, string name, int id, float price)
        {
            string query = string.Format("UPDATE SanPham SET TenSanPham = N'{0}', LoaiSP = {1} , GiaTien = {2} WHERE IDSanPham = {3}", name, id, price, idSP);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool DeleteSanPham(int idSP)
        {
            ChiTietHoaDonDAO.Instance.DeleteCTHDByIDSanPham(idSP);
            string query = string.Format("DELETE SanPham WHERE IDSanPham = {0}", idSP);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool DeleteSanPhamByCategory(int idloaisp)
        {
            ChiTietHoaDonDAO.Instance.DeleteCTHDByIDSanPham(idloaisp);
            string query = string.Format("DELETE SanPham WHERE LoaiSP = {0}", idloaisp);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        
    }
}
