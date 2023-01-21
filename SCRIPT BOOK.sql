/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18/07/2022 00:06:14                          */
/*==============================================================*/


drop table if exists DETIL_TRANSAKSI;

drop table if exists INVENTORY;

drop table if exists TRANSAKSI;

/*==============================================================*/
/* Table: DETIL_TRANSAKSI                                       */
/*==============================================================*/
create table DETIL_TRANSAKSI
(
   ID_TRANSAKSI         char(13) not null,
   ISBN                 char(11) not null,
   JUMLAH_DETAIL        int not null,
   SUB_TOTAL            int not null,
   primary key (ID_TRANSAKSI, ISBN)
);

/*==============================================================*/
/* Table: INVENTORY                                             */
/*==============================================================*/
create table INVENTORY
(
   ISBN                 char(11) not null,
   JUDUL_BUKU           varchar(61) not null,
   STOK_BUKU            int not null,
   HARGA_BUKU           int not null,
   primary key (ISBN)
);

/*==============================================================*/
/* Table: TRANSAKSI                                             */
/*==============================================================*/
create table TRANSAKSI
(
   ID_TRANSAKSI         char(13) not null,
   TANGGAL_TRANSAKSI    datetime not null,
   TOTAL_TRANSAKSI      int not null,
   primary key (ID_TRANSAKSI)
);

alter table DETIL_TRANSAKSI add constraint FK_RELATIONSHIP_1 foreign key (ID_TRANSAKSI)
      references TRANSAKSI (ID_TRANSAKSI);

alter table DETIL_TRANSAKSI add constraint FK_RELATIONSHIP_2 foreign key (ISBN)
      references INVENTORY (ISBN);

