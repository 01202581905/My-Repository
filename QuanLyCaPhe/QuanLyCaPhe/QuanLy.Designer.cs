namespace QuanLyCaPhe
{
    partial class QuanLy
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.adminToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.thôngTinTàiKhoảnToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.thôngTinToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.đăngXuấtToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.panel2 = new System.Windows.Forms.Panel();
            this.label1 = new System.Windows.Forms.Label();
            this.txtTongTien = new System.Windows.Forms.TextBox();
            this.btnGiamGia = new System.Windows.Forms.Button();
            this.nmrGG = new System.Windows.Forms.NumericUpDown();
            this.btnThanhToan = new System.Windows.Forms.Button();
            this.panel3 = new System.Windows.Forms.Panel();
            this.lstvHoaDon = new System.Windows.Forms.ListView();
            this.columnHeader1 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader2 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader3 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader4 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.panel4 = new System.Windows.Forms.Panel();
            this.label2 = new System.Windows.Forms.Label();
            this.btnThemSP = new System.Windows.Forms.Button();
            this.nmrThemMon = new System.Windows.Forms.NumericUpDown();
            this.cmbSP = new System.Windows.Forms.ComboBox();
            this.cmbLoaiSP = new System.Windows.Forms.ComboBox();
            this.flowlayoutBanAn = new System.Windows.Forms.FlowLayoutPanel();
            this.menuStrip1.SuspendLayout();
            this.panel2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.nmrGG)).BeginInit();
            this.panel3.SuspendLayout();
            this.panel4.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.nmrThemMon)).BeginInit();
            this.SuspendLayout();
            // 
            // menuStrip1
            // 
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.adminToolStripMenuItem,
            this.thôngTinTàiKhoảnToolStripMenuItem});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Size = new System.Drawing.Size(909, 24);
            this.menuStrip1.TabIndex = 1;
            this.menuStrip1.Text = "menuStrip1";
            // 
            // adminToolStripMenuItem
            // 
            this.adminToolStripMenuItem.Name = "adminToolStripMenuItem";
            this.adminToolStripMenuItem.Size = new System.Drawing.Size(55, 20);
            this.adminToolStripMenuItem.Text = "Admin";
            this.adminToolStripMenuItem.Click += new System.EventHandler(this.adminToolStripMenuItem_Click);
            // 
            // thôngTinTàiKhoảnToolStripMenuItem
            // 
            this.thôngTinTàiKhoảnToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.thôngTinToolStripMenuItem,
            this.đăngXuấtToolStripMenuItem});
            this.thôngTinTàiKhoảnToolStripMenuItem.Name = "thôngTinTàiKhoảnToolStripMenuItem";
            this.thôngTinTàiKhoảnToolStripMenuItem.Size = new System.Drawing.Size(129, 20);
            this.thôngTinTàiKhoảnToolStripMenuItem.Text = "Thông Tin Tài Khoản";
            // 
            // thôngTinToolStripMenuItem
            // 
            this.thôngTinToolStripMenuItem.Name = "thôngTinToolStripMenuItem";
            this.thôngTinToolStripMenuItem.Size = new System.Drawing.Size(129, 22);
            this.thôngTinToolStripMenuItem.Text = "Thông Tin";
            this.thôngTinToolStripMenuItem.Click += new System.EventHandler(this.thôngTinToolStripMenuItem_Click);
            // 
            // đăngXuấtToolStripMenuItem
            // 
            this.đăngXuấtToolStripMenuItem.Name = "đăngXuấtToolStripMenuItem";
            this.đăngXuấtToolStripMenuItem.Size = new System.Drawing.Size(129, 22);
            this.đăngXuấtToolStripMenuItem.Text = "Đăng Xuất";
            this.đăngXuấtToolStripMenuItem.Click += new System.EventHandler(this.đăngXuấtToolStripMenuItem_Click);
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.label1);
            this.panel2.Controls.Add(this.txtTongTien);
            this.panel2.Controls.Add(this.btnGiamGia);
            this.panel2.Controls.Add(this.nmrGG);
            this.panel2.Controls.Add(this.btnThanhToan);
            this.panel2.Location = new System.Drawing.Point(497, 401);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(400, 96);
            this.panel2.TabIndex = 2;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(191, 19);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(79, 20);
            this.label1.TabIndex = 6;
            this.label1.Text = "Tổng Tiền";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // txtTongTien
            // 
            this.txtTongTien.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtTongTien.Location = new System.Drawing.Point(177, 56);
            this.txtTongTien.Name = "txtTongTien";
            this.txtTongTien.ReadOnly = true;
            this.txtTongTien.Size = new System.Drawing.Size(100, 26);
            this.txtTongTien.TabIndex = 5;
            this.txtTongTien.Text = "0";
            this.txtTongTien.TextAlign = System.Windows.Forms.HorizontalAlignment.Right;
            // 
            // btnGiamGia
            // 
            this.btnGiamGia.Location = new System.Drawing.Point(48, 10);
            this.btnGiamGia.Name = "btnGiamGia";
            this.btnGiamGia.Size = new System.Drawing.Size(81, 40);
            this.btnGiamGia.TabIndex = 4;
            this.btnGiamGia.Text = "Giảm Giá";
            this.btnGiamGia.UseVisualStyleBackColor = true;
            this.btnGiamGia.Click += new System.EventHandler(this.btnGiamGia_Click);
            // 
            // nmrGG
            // 
            this.nmrGG.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.nmrGG.Location = new System.Drawing.Point(48, 58);
            this.nmrGG.Name = "nmrGG";
            this.nmrGG.Size = new System.Drawing.Size(81, 29);
            this.nmrGG.TabIndex = 3;
            // 
            // btnThanhToan
            // 
            this.btnThanhToan.Location = new System.Drawing.Point(300, 19);
            this.btnThanhToan.Name = "btnThanhToan";
            this.btnThanhToan.Size = new System.Drawing.Size(97, 68);
            this.btnThanhToan.TabIndex = 0;
            this.btnThanhToan.Text = "Thanh Toán";
            this.btnThanhToan.UseVisualStyleBackColor = true;
            this.btnThanhToan.Click += new System.EventHandler(this.btnThanhToan_Click);
            // 
            // panel3
            // 
            this.panel3.Controls.Add(this.lstvHoaDon);
            this.panel3.Location = new System.Drawing.Point(497, 125);
            this.panel3.Name = "panel3";
            this.panel3.Size = new System.Drawing.Size(400, 273);
            this.panel3.TabIndex = 3;
            // 
            // lstvHoaDon
            // 
            this.lstvHoaDon.Columns.AddRange(new System.Windows.Forms.ColumnHeader[] {
            this.columnHeader1,
            this.columnHeader2,
            this.columnHeader3,
            this.columnHeader4});
            this.lstvHoaDon.GridLines = true;
            this.lstvHoaDon.Location = new System.Drawing.Point(6, 3);
            this.lstvHoaDon.Name = "lstvHoaDon";
            this.lstvHoaDon.Size = new System.Drawing.Size(391, 266);
            this.lstvHoaDon.TabIndex = 0;
            this.lstvHoaDon.UseCompatibleStateImageBehavior = false;
            this.lstvHoaDon.View = System.Windows.Forms.View.Details;
            this.lstvHoaDon.SelectedIndexChanged += new System.EventHandler(this.lstvHoaDon_SelectedIndexChanged);
            // 
            // columnHeader1
            // 
            this.columnHeader1.Text = "Tên Món Ăn";
            this.columnHeader1.Width = 139;
            // 
            // columnHeader2
            // 
            this.columnHeader2.Text = "Số Lượng";
            this.columnHeader2.Width = 64;
            // 
            // columnHeader3
            // 
            this.columnHeader3.Text = "Đơn Giá";
            this.columnHeader3.Width = 84;
            // 
            // columnHeader4
            // 
            this.columnHeader4.Text = "Thành Tiền";
            this.columnHeader4.Width = 100;
            // 
            // panel4
            // 
            this.panel4.Controls.Add(this.label2);
            this.panel4.Controls.Add(this.btnThemSP);
            this.panel4.Controls.Add(this.nmrThemMon);
            this.panel4.Controls.Add(this.cmbSP);
            this.panel4.Controls.Add(this.cmbLoaiSP);
            this.panel4.Location = new System.Drawing.Point(497, 29);
            this.panel4.Name = "panel4";
            this.panel4.Size = new System.Drawing.Size(400, 90);
            this.panel4.TabIndex = 4;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(192, 7);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(78, 20);
            this.label2.TabIndex = 4;
            this.label2.Text = "Số Lượng";
            // 
            // btnThemSP
            // 
            this.btnThemSP.Location = new System.Drawing.Point(300, 6);
            this.btnThemSP.Name = "btnThemSP";
            this.btnThemSP.Size = new System.Drawing.Size(97, 67);
            this.btnThemSP.TabIndex = 3;
            this.btnThemSP.Text = "Thêm Món";
            this.btnThemSP.UseVisualStyleBackColor = true;
            this.btnThemSP.Click += new System.EventHandler(this.btnThemSP_Click);
            // 
            // nmrThemMon
            // 
            this.nmrThemMon.Location = new System.Drawing.Point(196, 40);
            this.nmrThemMon.Maximum = new decimal(new int[] {
            50,
            0,
            0,
            0});
            this.nmrThemMon.Minimum = new decimal(new int[] {
            50,
            0,
            0,
            -2147483648});
            this.nmrThemMon.Name = "nmrThemMon";
            this.nmrThemMon.Size = new System.Drawing.Size(62, 20);
            this.nmrThemMon.TabIndex = 2;
            this.nmrThemMon.Value = new decimal(new int[] {
            1,
            0,
            0,
            0});
            this.nmrThemMon.ValueChanged += new System.EventHandler(this.numericUpDown1_ValueChanged);
            // 
            // cmbSP
            // 
            this.cmbSP.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.cmbSP.FormattingEnabled = true;
            this.cmbSP.Location = new System.Drawing.Point(3, 49);
            this.cmbSP.Name = "cmbSP";
            this.cmbSP.Size = new System.Drawing.Size(161, 24);
            this.cmbSP.TabIndex = 1;
            // 
            // cmbLoaiSP
            // 
            this.cmbLoaiSP.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.cmbLoaiSP.FormattingEnabled = true;
            this.cmbLoaiSP.Location = new System.Drawing.Point(3, 3);
            this.cmbLoaiSP.Name = "cmbLoaiSP";
            this.cmbLoaiSP.Size = new System.Drawing.Size(161, 24);
            this.cmbLoaiSP.TabIndex = 0;
            this.cmbLoaiSP.SelectedIndexChanged += new System.EventHandler(this.comboBox1_SelectedIndexChanged);
            // 
            // flowlayoutBanAn
            // 
            this.flowlayoutBanAn.AutoScroll = true;
            this.flowlayoutBanAn.Location = new System.Drawing.Point(12, 27);
            this.flowlayoutBanAn.Name = "flowlayoutBanAn";
            this.flowlayoutBanAn.Size = new System.Drawing.Size(479, 470);
            this.flowlayoutBanAn.TabIndex = 5;
            // 
            // QuanLy
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(909, 500);
            this.Controls.Add(this.flowlayoutBanAn);
            this.Controls.Add(this.panel4);
            this.Controls.Add(this.panel3);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.menuStrip1);
            this.MainMenuStrip = this.menuStrip1;
            this.Name = "QuanLy";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Quản Lý Hóa Đơn";
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            this.panel2.ResumeLayout(false);
            this.panel2.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.nmrGG)).EndInit();
            this.panel3.ResumeLayout(false);
            this.panel4.ResumeLayout(false);
            this.panel4.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.nmrThemMon)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem adminToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem thôngTinTàiKhoảnToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem thôngTinToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem đăngXuấtToolStripMenuItem;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Panel panel3;
        private System.Windows.Forms.ListView lstvHoaDon;
        private System.Windows.Forms.Panel panel4;
        private System.Windows.Forms.ComboBox cmbSP;
        private System.Windows.Forms.ComboBox cmbLoaiSP;
        private System.Windows.Forms.Button btnThemSP;
        private System.Windows.Forms.NumericUpDown nmrThemMon;
        private System.Windows.Forms.Button btnThanhToan;
        private System.Windows.Forms.Button btnGiamGia;
        private System.Windows.Forms.NumericUpDown nmrGG;
        private System.Windows.Forms.FlowLayoutPanel flowlayoutBanAn;
        private System.Windows.Forms.ColumnHeader columnHeader1;
        private System.Windows.Forms.ColumnHeader columnHeader2;
        private System.Windows.Forms.ColumnHeader columnHeader3;
        private System.Windows.Forms.ColumnHeader columnHeader4;
        private System.Windows.Forms.TextBox txtTongTien;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
    }
}