using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using QuanLyCaPhe.DTO;
using System.Data;

namespace QuanLyCaPhe.DAO
{
    public class ChiTietHoaDonDAO
    {
        private static ChiTietHoaDonDAO instance;

        public static ChiTietHoaDonDAO Instance
        {
            get { if (instance == null) instance = new ChiTietHoaDonDAO(); return ChiTietHoaDonDAO.instance; }
            private set { ChiTietHoaDonDAO.instance = value; }
        }

        private ChiTietHoaDonDAO() { }

        public void DeleteCTHDByIDSanPham(int id)
        {
            DataProvider.Instance.ExecuteQuery("DELETE ChiTietHoaDon WHERE IDSanPham = " + id);
        }

        public void DeleteCTHDByIDBanAN(int idbanan)
        {
            DataProvider.Instance.ExecuteQuery("DELETE HoaDon WHERE BanAn = " + idbanan);
        }

        public List<ChiTietHoaDon> GetListCTHoaDon(int id)
        {
            List<ChiTietHoaDon> listCTHD = new List<ChiTietHoaDon>();

            DataTable data = DataProvider.Instance.ExecuteQuery("SELECT * FROM ChiTietHoaDon WHERE IDCTHoaDon = " + id);

            foreach (DataRow item in data.Rows)
            {
                ChiTietHoaDon cthd = new ChiTietHoaDon(item);

                listCTHD.Add(cthd);
            }

            return listCTHD;
        }

        public void InsertChiTietHoaDon(int idSP , int idHoaDon , int SoLuong)
        {
            DataProvider.Instance.ExecuteNonQuery("EXEC ThemChiTietHD @IDSanPham , @IDHoaDon , @SoLuong", new object[] { idSP , idHoaDon , SoLuong });
        }
    }
}
