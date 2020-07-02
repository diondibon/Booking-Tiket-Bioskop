<?php
class koneksiDB
{
	private $uname='dion06833';
	private $pass='dion';
	private $host='localhost/XE';
	protected $koneksi;

	function __construct()
	{
		$konek=oci_connect($this->uname, $this->pass,$this->host);
		if ($konek)
		{
			echo " ";
			$this->koneksi=$konek;
		}
		else
		{
			echo "Gagal";
		}
	}
}

$objekKoneksi=new koneksiDB();

?>