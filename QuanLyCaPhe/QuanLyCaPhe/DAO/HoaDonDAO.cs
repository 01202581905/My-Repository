using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;
using QuanLyCaPhe.DTO;

namespace QuanLyCaPhe.DAO
{
    public class HoaDonDAO
    {
        private static HoaDonDAO instance;

        public static HoaDonDAO Instance
        {
            get { if (instance == null) instance = new HoaDonDAO(); return HoaDonDAO.instance; }
            private set { HoaDonDAO.instance = value; }
        }

        private HoaDonDAO() { }


        //success : hoadon id
        //fail : -1
        public int GetBillByTableID(int id)
        {
            DataTable data = DataProvider.Instance.ExecuteQuery("SELECT * FROM HoaDon WHERE BanAn = "+id+" AND TrangThai = 0");
            if (data.Rows.Count > 0)
            {
                HoaDon hoadon = new HoaDon(data.Rows[0]);
                return hoadon.IDHoaDon1;
            }
            return -1;
        }


        public void ThanhToan(int id,int discount, float total)
        {
            string query = "UPDATE HoaDon SET ThoiGianRa = Getdate() , TrangThai = 1, " + " Discount = " + discount + ", TotalPrice = " + total + " WHERE IDHoaDon="+id;
            DataProvider.Instance.ExecuteNonQuery(query);
        }


        public void InsertHoaDon(int id)
        {
            DataProvider.Instance.ExecuteNonQuery("EXEC ThemHoaDon @BanAn", new object[] { id });
        }

        public int GetMaxIDHoaDon()
        {
            try
            {
                return (int)DataProvider.Instance.ExecuteScalar("SELECT MAX (IDHoaDon) FROM HoaDon");
            }
            catch
            {
                return 1;
            }
            
        }

        public DataTable GetListHoaDonByDate(DateTime tgvao , DateTime tgra)
        {
            string query = " Exec GetListHoaDonByDate @tgvao , @tgra ";
            return DataProvider.Instance.ExecuteQuery(query,new object[]{tgvao , tgra});
        }
    }
}
