<?php
require_once "koneksiDB.php";

class modelCustomer extends koneksiDB
{
	private $datacustomer;

	function select()
	{
		$sqltext = "SELECT * FROM CUSTOMER";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//variabel data customer diambil dari database
		while($row=oci_fetch_array($statement, OCI_BOTH)){
			$temp[]=$row;
		}
		$this->datacustomer=$temp;

	
	}

	function getData()
	{
		return $this->datacustomer;
	}

	function viewdata(){
		foreach ($this->datacustomer as $key)
		{
			echo $key['ID_CUSTOMER'];
			echo "  ->  ";
			echo $key["NAMA"];
			echo "  ->  ";
			echo $key["PASSWORD"];
			echo "  ->  ";
			echo $key["NO_TELP"];
			echo "  ->  ";
			echo $key["ALAMAT"];
			echo "<br>";
		}
	}

	function insert($id_customer,$nama,$alamat,$no_telp,$password)
	{
		$sqltext = "INSERT INTO CUSTOMER VALUES('$id_customer','$nama','$alamat','$no_telp','$password')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function delete($id_customer)
	{
		$sqltext = "DELETE FROM CUSTOMER WHERE ID_CUSTOMER='$id_customer'";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_customer,$nama,$alamat,$no_telp,$password)
	{
		$sqltext = "UPDATE CUSTOMER SET NAMA='$nama',ALAMAT='$alamat',NO_TELP='$no_telp',PASSWORD='$password' WHERE ID_CUSTOMER='$id_customer'";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
}

//$objmodelCustomer = new modelCustomer();
//$objmodelCustomer->select();
//$objmodelCustomer->viewdata();
//$objmodelCustomer->delete('666');
//$objmodelCustomer->insert('666','Andi','Bali','081222','125');
//$objmodelCustomer->update('444','Dono','jonggol','08123','123');
?>