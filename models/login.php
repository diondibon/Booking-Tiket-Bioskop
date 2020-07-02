<?php

require '../model/database.php';

class modelOP extends koneksiDB
{
	private $dataOP;
	private $dataLogin;

	function select(){
		$sqltext="SELECT * FROM ADMIN";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataOP = $temp;

		oci_free_statement($statement);
	}

	function login(){
		$sqltext="SELECT * FROM ADMIN";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataLogin = $temp;

		oci_free_statement($statement);
	}

	function insert($id_admin,$nama,$alamat,$password,$no_telp)
	{
		$sqltext="INSERT INTO ADMIN VALUES ('$id_admin','$nama','$alamat','$password','$no_telp')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}


	function getData()
	{
		return $this->dataOP;
	}

	function delete($id)
	{
		$sqltext="DELETE FROM ADMIN WHERE ID_ADMIN='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_admin,$nama,$alamat,$password,$no_telp)
	{
		$sqltext="UPDATE ADMIN SET NAMA='$nama', ALAMAT='$alamat', PASSWORD='$password', NO_TELP='$no_telp' WHERE ID_ADMIN = '$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function viewData()
	{
		
		foreach ($this->dataBBM as $key) {
			echo "<tr><td>".$key['KODE_PRODUK']."</td>";
    		echo "<td>".$key['NAMA_PRODUK']."</td>";
    		echo "<td>".$key['HARGA']."</td>";
    		echo "<td><button type='button'>Edit</button></td></tr>";

		}
	}

}

// $modelBBM=new modelBBM();
// $modelBBM->select();
// if (isset($_POST['input'])) {
// echo $modelBBM->insert();
//  }
// //$modelBBM->viewData();

// // }
// //header('Location: ../view/viewProdukBBM.php'); 
// //$_POST['harga']
?>

