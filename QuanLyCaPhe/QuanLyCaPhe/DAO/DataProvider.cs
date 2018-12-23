using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;
using System.Data.SqlClient;

namespace QuanLyCaPhe.DAO
{
    public class DataProvider
    {
        private static DataProvider instance;

        public static DataProvider Instance
        {
            get { if (instance == null) instance = new DataProvider(); return DataProvider.instance; }
            private set { DataProvider.instance = value; }
        }

        private DataProvider() { }

        private string connstring = @"Data Source=DESKTOP-4DBDQ62\SQLEXPRESS;Initial Catalog=QuanLyCaPhe;Persist Security Info=True;User ID=sa;Password=123456";


        public DataTable ExecuteQuery(string query, object[] parameters = null)
        {
            DataTable data = new DataTable();
            using (SqlConnection conn = new SqlConnection(connstring))
            {
                conn.Open();
                SqlCommand cmd = new SqlCommand(query, conn);

                if (parameters != null)
                {
                    string[] listPara = query.Split(' ');

                    int i = 0;
                    foreach (string item in listPara)
                    {
                        if (item.Contains('@'))
                        {
                            cmd.Parameters.AddWithValue(item, parameters[i]);
                            i++;
                        }
                    }
                }



                SqlDataAdapter adp = new SqlDataAdapter(cmd);

                adp.Fill(data);
                conn.Close();
            }
            return data;
        }


        public int ExecuteNonQuery(string query, object[] parameters = null)
        {
            int data = 0;

            using (SqlConnection conn = new SqlConnection(connstring))
            {
                conn.Open();
                SqlCommand cmd = new SqlCommand(query, conn);

                if (parameters != null)
                {
                    string[] listPara = query.Split(' ');

                    int i = 0;
                    foreach (string item in listPara)
                    {
                        if (item.Contains('@'))
                        {
                            cmd.Parameters.AddWithValue(item, parameters[i]);
                            i++;
                        }
                    }
                }
                data = cmd.ExecuteNonQuery();

                conn.Close();
            }
            return data;
        }


        public object ExecuteScalar(string query, object[] parameters = null)
        {
            object data = 0;

            using (SqlConnection conn = new SqlConnection(connstring))
            {
                conn.Open();
                SqlCommand cmd = new SqlCommand(query, conn);

                if (parameters != null)
                {
                    string[] listPara = query.Split(' ');

                    int i = 0;
                    foreach (string item in listPara)
                    {
                        if (item.Contains('@'))
                        {
                            cmd.Parameters.AddWithValue(item, parameters[i]);
                            i++;
                        }
                    }
                }
                data = cmd.ExecuteScalar();

                conn.Close();
            }
            return data;
        }
    }
}
