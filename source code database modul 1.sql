sqlplus system

create tablespace dion_06833
	datafile 'D:\Document\Semester 6\Basdat\Praktikum\dion_06833.dbf'
	size 30M;

create user dion06833
	identified by dion
	default tablespace dion_06833
	quota 30M on dion_06833;

grant all privileges to dion06833;

conn dion06833/dion



create table admin
(
	id_admin int,
	nama varchar(30),
	alamat varchar(100),
	password varchar(10),
	no_telp number(12),
	constraint pk_admin primary key (id_admin)
);

create table customer
(
	id_customer int,
	nama varchar(30),
	alamat varchar(100),
	no_telp number(12),
	password varchar(10)
);

alter table customer 
	add constraint pk_customer primary key (id_customer);

create table registrasi
(
	no_registrasi int,
	id_customer int,
	id_admin int,
	tgl_registrasi date
);

alter table registrasi 
	add constraint pk_registrasi primary key (no_registrasi)
	add constraint fk_id_customer foreign key (id_customer)
	references customer (id_customer)
	add constraint fk_id_admin foreign key (id_admin)
	references admin (id_admin);

create table film
(
	kategori varchar(10),
	judul_film varchar(15)
);	

alter table film 
	add constraint pk_film primary key (judul_film);

create table jadwal
(
	tanggal date,
	judul_film varchar(15),
	jam_tayang Timestamp,
	jam_selesai Timestamp
);

alter table jadwal 
	add constraint pk_jadwal primary key (tanggal)
	add constraint fk_judul_film foreign key (judul_film)
	references film (judul_film);

create table kursi
(
	id_kursi int,
	nama_kursi varchar(5)
);	

alter table kursi
	add constraint pk_kursi primary key (id_kursi);

create table bioskop
(
	kode_bioskop int,
	id_kursi int,
	judul_film varchar(15),
	no_bioskop varchar(3)
);	

alter table bioskop 
	add constraint pk_kode_bioskop primary key (kode_bioskop)
	add constraint fk_id_kursi foreign key (id_kursi)
	references kursi (id_kursi)
	add constraint fk_judul_film1 foreign key (judul_film)
	references film (judul_film);

create table tiket
(
	id_tiket int,
	id_kursi int,
	tanggal date,
	id_customer int,
	judul_film varchar(15),
	kode_bioskop int,
	stock int,
	harga number(9)
);

alter table tiket 
	add constraint pk_tiket primary key (id_tiket)
	add constraint fk_id_kursi1 foreign key (id_kursi)
	references kursi (id_kursi)
	add constraint fk_tanggal1 foreign key (tanggal)
	references jadwal (tanggal)
	add constraint fk_id_customer2 foreign key (id_customer)
	references customer (id_customer)
	add constraint fk_judul_film2 foreign key (judul_film)
	references film (judul_film)
	add constraint fk_kode_bioskop foreign key (kode_bioskop)
	references bioskop (kode_bioskop);

create table transaksi
(
	id_transaksi int,
	id_admin int,
	id_customer int,
	id_tiket int,
	tgl_pesan date,
	jumlah int,
	total_harga number(9)
);

alter table transaksi 
	add constraint pk_transaksi primary key (id_transaksi)
	add constraint fk_id_admin1 foreign key (id_admin)
	references admin (id_admin)
	add constraint fk_id_customer1 foreign key (id_customer)
	references customer (id_customer)
	add constraint fk_id_tiket foreign key (id_tiket)
	references tiket (id_tiket);

create sequence id_tiket
	minvalue 1
	maxvalue 999
	start with 1
	increment by 1
	cache 20;

Alter table tiket 
	rename column harga to harga_06833;

Alter table tiket 
	rename column harga_06833 to harga;

ALTER TABLE customer ADD UNIQUE (no_telp);


ALTER TABLE tiket
  MODIFY stock number(3);
