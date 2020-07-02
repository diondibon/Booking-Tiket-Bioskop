<?php
require "koneksiDB.php";

class modelAdmin extends koneksiDB
{
	private $dataadmin;
	private $kode=0;
	private $idbaru;

	function select()
	{
		$sqltext = "SELECT * FROM ADMIN";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		$data;
		//variabel data admin diambil dari database
		while($row=oci_fetch_array($statement, OCI_BOTH))
		{
			$data[]=$row;

			if($this->kode<(int)substr($row['ID_ADMIN'], 3, 3)) 
			{
				$this->kode=(int)substr($row['ID_ADMIN'], 3, 3);	
			}
		}
		return $this->dataadmin=$data;
		oci_free_statement($statement);

	
	}

	/*function getData()
	{
		return $this->dataadmin;
	}*/

	function viewdata(){
		foreach ($this->dataadmin as $key)
		{
			echo $key['ID_ADMIN'];
			/*echo "  ->  ";
			echo $key["NAMA"];
			echo "  ->  ";
			echo $key["PASSWORD"];
			echo "  ->  ";
			echo $key["NO_TELP"];
			echo "  ->  ";
			echo $key["ALAMAT"];*/
			echo "<br>";
		}
	}

	function insert($id_admin,$nama,$alamat,$no_telp,$password)
	{
		$sqltext = "INSERT INTO ADMIN VALUES('$id_admin','$nama','$alamat','$no_telp','$password')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function delete($id_admin)
	{
		$sqltext = "DELETE FROM ADMIN WHERE ID_ADMIN='$id_admin'";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_admin,$nama,$alamat,$no_telp,$password)
	{
		$sqltext = "UPDATE ADMIN SET NAMA='$nama',ALAMAT='$alamat',NO_TELP='$no_telp',PASSWORD='$password' WHERE ID_ADMIN='$id_admin'";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function setIdbaru()
	{
		return $this->idbaru=($this->kode+1);
	}

	function getIdbaru()
	{
		echo $this->idbaru;
	}
}

$admin=new modelAdmin();
//$objmodelCustomer = new modelCustomer();
//$objmodelCustomer->select();
//$objmodelCustomer->viewdata();
//$objmodelCustomer->delete('666');
//$objmodelCustomer->insert('666','Andi','Bali','081222','125');
//$objmodelCustomer->update('444','Dono','jonggol','08123','123');
?>