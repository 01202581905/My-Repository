using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using QuanLyCaPhe.DTO;
using System.Data;

namespace QuanLyCaPhe.DAO
{
    public class MenuDAO
    {
        private static MenuDAO instance;

        public static MenuDAO Instance
        {
            get { if (instance == null) instance = new MenuDAO(); return MenuDAO.instance; }
           private set { MenuDAO.instance = value; }
        }

        private MenuDAO() { }

        public List<Menu> GetListMenu(int id)
        {
            List<Menu> listmenu = new List<Menu>();
            string query = "Select sp.TenSanPham,sp.GiaTien,cthd.SoLuong,sp.GiaTien*cthd.SoLuong as Tongtien From HoaDon as hd, ChiTietHoaDon as cthd,SanPham as sp Where	cthd.IDHoaDon = hd.IDHoaDon and cthd.IDSanPham = sp.IDSanPham and hd.TrangThai = 0 and	hd.BanAn = " + id;
            DataTable data = DataProvider.Instance.ExecuteQuery(query);

            foreach (DataRow item in data.Rows)
            {
                Menu menu = new Menu(item);
                listmenu.Add(menu);
            }
            return listmenu;
        }
    }
}
