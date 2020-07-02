<?php
$cetak = $_GET['id'];
?>

<html>
<head>
	<title>CETAK NOTA TRANSAKSI</title>
</head>
<meta http-equiv="refresh" content="3;../views/index.php"></head>
<body>
		<h2>BOOKING TIKET</h2>
 		===============================================
		<?php

		$konek = oci_connect("dion06833", "dion", "localhost/XE");
		$s = oci_parse($konek, "SELECT * FROM TRANSAKSI INNER join ADMIN on TRANSAKSI.ID_ADMIN=ADMIN.ID_ADMIN INNER JOIN TIKET on TRANSAKSI.ID_TIKET=TIKET.ID_TIKET WHERE ID_TRANSAKSI = '$cetak'");
		oci_execute($s);

		while ($row = oci_fetch_array($s,OCI_BOTH)) {
			?>	
                        <h4>KODE TRANSAKSI = <?php echo $row['ID_TRANSAKSI']?></h4>
                        <h4>TANGGAL = <?php echo $row['tgl_pesan']?></h4>
                        <h4>ID ADMIN = <?php echo $row['ID_ADMIN']?></h4>
                        <h4>ID CUSTOMER = <?php echo $row['ID_CUSTOMER']?></h4>
                        <h4>ID TIKET = <?php echo $row['ID_TIKET']?></h4>
                        <h4>JUMLAH = <?php echo $row['jumlah']?></h4>
                        <h4>TOTAL HARGA = Rp.<?php echo $row['Total_Harga']?></h4>                        
                      
		<?php
		}
?>
		===============================================
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>