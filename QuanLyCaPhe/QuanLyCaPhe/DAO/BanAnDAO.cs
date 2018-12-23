using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using QuanLyCaPhe.DTO;
using System.Data;

namespace QuanLyCaPhe.DAO
{
    public class BanAnDAO
    {
        private static BanAnDAO instance;

        public static BanAnDAO Instance
        {
            get { if (instance == null) instance = new BanAnDAO(); return BanAnDAO.instance; }
            private set { BanAnDAO.instance = value; }
        }

        public static int btnHeight = 100;
        public static int btnWidth = 100;
        private BanAnDAO() { }

        public List<BanAn> LoadTableList()
        {
            List<BanAn> tablelist = new List<BanAn>();

            DataTable data = DataProvider.Instance.ExecuteQuery("BanAnList");

            foreach (DataRow item in data.Rows)
            {
                BanAn banan = new BanAn(item);
                tablelist.Add(banan);
            }
            return tablelist;
        }

        public bool InsertBanAn(string name, string trangthai)
        {
            string query = string.Format("INSERT INTO BanAn (TenBanAn ,TrangThai) VALUES (N'{0}',N'{1}')", name, trangthai);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

        public bool UPdateBanAn(string name,int id)
        {
            string query = string.Format("UPDATE BanAn SET TenBanAn = N'{0}' WHERE IDBanAn = {1}",name,id);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }

           public bool DeleteBanAn(int idBanAn)
           {
               ChiTietHoaDonDAO.Instance.DeleteCTHDByIDBanAN(idBanAn);
               string query = string.Format("DELETE BanAn WHERE IDBanAn = {0}", idBanAn);
               int result = DataProvider.Instance.ExecuteNonQuery(query);
               return result > 0;
           }
    }
}
