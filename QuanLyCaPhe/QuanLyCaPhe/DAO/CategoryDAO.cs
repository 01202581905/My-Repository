using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using QuanLyCaPhe.DTO;
using System.Data;

namespace QuanLyCaPhe.DAO
{
    public class CategoryDAO
    {
        private static CategoryDAO instance;

        public static CategoryDAO Instance
        {
            get { if (instance == null) instance = new CategoryDAO(); return CategoryDAO.instance; }
            private set { CategoryDAO.instance = value; }
        }

        private CategoryDAO() { }

        public List<Category> GetListCategory()
        {
            List<Category> list = new List<Category>();
            string query = "SELECT * FROM LoaiSanPham";
            DataTable data = DataProvider.Instance.ExecuteQuery(query);
            foreach (DataRow item in data.Rows)
            {
                Category category = new Category(item);

                list.Add(category);
            }
            return list;
        }

        public Category GetCategoryByID(int id)
        {
            Category ctgr = null;

            string query = "Select * from LoaiSanPham Where IDLoaiSP = " + id;
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                ctgr = new Category(item);
                return ctgr;
            }
            return ctgr;
        }

        public List<Category> SearchLoaiSanPhamByName(string ctgrname)
        {
            List<Category> listcategory = new List<Category>();
            string query = string.Format("Select * from LoaiSanPham WHERE TenLoaiSP like N'%{0}%'", ctgrname);
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                Category category = new Category(item);
                listcategory.Add(category);
            }
            return listcategory;
        }

        public bool InsertLoaiSanPham(string name)
        {
            string query = string.Format("INSERT INTO LoaiSanPham VALUES (N'{0}')", name);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool UPdateLoaiSanPham(int id, string name)
        {
            string query = string.Format("UPDATE LoaiSanPham SET TenLoaiSP = N'{0}' WHERE IDLoaiSP = {1}", name, id);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool DeleteLoaiSanPham(int id)
        {

            string query = string.Format("DELETE LoaiSanPham WHERE IDLoaiSP = {0}", id);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }
    }
}
