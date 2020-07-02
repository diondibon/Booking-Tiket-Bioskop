<?php
require_once 'koneksiDB.php';

class modelTransaksi extends koneksiDB
{
	private $dataTransaksi;
	private $dataSettlement;
	private $dataCetak;
	private $kode=0;
	private $trxbaru;

	function select(){
		$sqltext="SELECT * FROM TRANSAKSI JOIN ADMIN on TRANSAKSI.ID_ADMIN=ADMIN.id_admin JOIN CUSTOMER on TRANSAKSI.ID_CUSTOMER=CUSTOMER.id_customer JOIN TIKET on TRANSAKSI.ID_TIKET=TIKET.id_tiket";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;

			if($this->kode<(int)substr($row['ID_TRANSAKSI'], 3, 3))
			{
				$this->kode=(int)substr($row['ID_TRANSAKSI'], 3, 3);	
			}

		}
		return $this->dataTransaksi = $temp;
		oci_free_statement($statement);
	}

	function insert($id_transaksi,$id_admin,$id_customer,$id_tiket,$tgl_pesan,$jumlah,$total_harga)
	{
		$sqltext="INSERT INTO TRANSAKSI VALUES ('$id_admin','$id_customer','$id_tiket',to_date('$tgl_pesan','mm/dd/yyyy'),'$jumlah','$total_harga','$id_transaksi')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}


	function getData()
	{
		return $this->dataTransaksi;
	}

	function getSettlement()
	{
		return $this->dataSettlement;
	}

	function delete($id)
	{
		$sqltext="DELETE FROM TRANSAKSI WHERE ID_TRANSAKSI='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

// $id_tiket,$id_kursi,$tanggal,$id_customer,$judul_film,$kode_bioskop,$stock,$harga
	function update($id_transaksi,$id_admin,$id_customer,$id_tiket,$tgl_pesan,$jumlah,$total_harga)
	{
		$sqltext="UPDATE TRANSAKSI VALUES ('$id_admin','$id_customer','$id_tiket',to_date('$tgl_pesan','mm/dd/yyyy'),'$jumlah','$total_harga','$id_transaksi')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function setTrxBaru()
	{
		return $this->trxbaru="TRX".sprintf($this->kode+1);
	}

	function getTrxBaru()
	{
		echo $this->trxbaru;
	}

	function settlement($awal,$akhir){
		$sqltext="SELECT * FROM TRANSAKSI INNER join ADMIN on TRANSAKSI.ID_ADMIN=ADMIN.ID_ADMIN INNER JOIN TIKET on TRANSAKSI.ID_TIKET=TIKET.ID_TIKET WHERE WAKTU BETWEEN to_date('$awal','mm/dd/yyyy') AND to_date('$akhir','mm/dd/yyyy')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;

		}
		$this->dataSettlement = $temp;



		oci_free_statement($statement);
	}

	function cetakNota($id_transaksi){
		$sqltext="SELECT * FROM TRANSAKSI INNER join ADMIN on TRANSAKSI.ID_ADMIN=ADMIN.ID_ADMIN INNER JOIN TIKET on TRANSAKSI.ID_TIKET=TIKET.ID_TIKET WHERE ID_TRANSAKSI = '$id_transaksi' ";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;

		}
		$this->dataCetak = $temp;



		oci_free_statement($statement);
	}

}
$modelTx=new modelTransaksi();
?>

