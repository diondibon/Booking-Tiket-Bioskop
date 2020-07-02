<?php
require '../models/modelTransaksi.php';

class prosesTransaksi
{
	private $action;
	

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelTransaksi();
		if($this->action=="tambah")
		{
			//echo "ini menu tambah";
			$id_transaksi=$_POST['inputidtransaksi'];
			$id_admin=$_POST['inputidadmin'];
			$id_customer=$_POST['inputidcustomer'];
			$id_tiket=$_POST['inputidtiket'];
			$tgl_pesan=$_POST['inputtglpesan'];
			$jumlahr=$_POST['inputjumlah'];
			$total_harga=$_POST['inputtotalharga'];
			 echo $id_admin;
			 echo $id_customer;
			$objmodel->insert($id_transaksi,$id_admin,$id_customer,$id_tiket,$tgl_pesan,$jumlah,$total_harga);
			header("location:../views/transaksi.php");
		}
		else if($this->action=="hapus")
		{
			$id_=$_GET['id'];
			$objmodel->delete($id);
			header("location:../views/transaksi.php");

		}

	}
}

$objproses=new prosesTransaksi($_GET['aksi']);
$objproses->proses();
?>

