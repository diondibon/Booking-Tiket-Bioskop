<?php
require "../models/modelCustomer.php";

class prosesCustomer
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodelCustomer=new modelCustomer();

		if ($this->action=="tambah")
		{
			$id_customer=$_POST['inputidcustomer'];
			$nama=$_POST['inputnama'];
			$password=$_POST['inputpassword'];
			$no_telp=$_POST['inputnotelp'];
			$alamat=$_POST['inputalamat'];
			$objmodelCustomer->insert($id_customer, $nama, $alamat, $no_telp, $password);
			header("location:../views/dataCustomer.php");
		}
		elseif ($this->action=="hapus") 
		{
			$id_customer=$_GET['hapusidcustomer'];
			$objmodelCustomer->delete($id_customer);
			header("location:../views/dataCustomer.php");
		}
		elseif ($this->action=="edit") 
		{
			echo "Masuk ke Edit";
			$id_customer=$_POST['editidcustomer'];
			$nama=$_POST['editnama'];
			$password=$_POST['editpassword'];
			$no_telp=$_POST['editnotelp'];
			$alamat=$_POST['editalamat'];
			$objmodelCustomer->update($id_customer, $nama, $alamat, $no_telp, $password);
			header("location:../views/dataCustomer.php");
		}
	}
}

$objprosesCustomer = new prosesCustomer($_GET['aksi']);
$objprosesCustomer->proses();

?>