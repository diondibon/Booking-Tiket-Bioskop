<?php
require "../models/modelAdmin.php";

class prosesAdmin
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodelAdmin=new modelAdmin();

		if ($this->action=="tambah")
		{
			$id_admin=$_POST['inputidadmin'];
			$nama=$_POST['inputnama'];
			$password=$_POST['inputpassword'];
			$no_telp=$_POST['inputnotelp'];
			$alamat=$_POST['inputalamat'];
			$objmodelAdmin->insert($id_admin, $nama, $alamat, $no_telp, $password);
			header("location:../views/dataAdmin.php");
		}
		elseif ($this->action=="hapus") 
		{
			$id_admin=$_GET['hapusidadmin'];
			$objmodelAdmin->delete($id_admin);
			header("location:../views/dataAdmin.php");
		}
		elseif ($this->action=="edit") 
		{
			echo "Masuk ke Edit";
			$id_admin=$_POST['editidadmin'];
			$nama=$_POST['editnama'];
			$password=$_POST['editpassword'];
			$no_telp=$_POST['editnotelp'];
			$alamat=$_POST['editalamat'];
			$objmodelAdmin->update($id_admin, $nama, $alamat, $no_telp, $password);
			header("location:../views/dataAdmin.php");
		}
	}
}

$objprosesAdmin = new prosesAdmin($_GET['aksi']);
$objprosesAdmin->proses();

?>