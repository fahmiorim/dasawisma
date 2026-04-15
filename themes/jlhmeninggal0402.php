 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 include "../config/koneksi.php";
 include "../config/fungsi_terbilang.php";
  include "../config/library.php";
	  
		  
			$totmeninggal0402 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0402 from kehamilan where kodekel='0402'");
						$jlhtotmeninggal0402=pg_fetch_array($totmeninggal0402); 
						$jumlahmeninggal0402=$jlhtotmeninggal0402[totjlhmeninggal0402];
						$totjumlahmeninggal0402=number_format($jumlahmeninggal0402,0,",",".");
					echo "$totjumlahmeninggal0402";
 } ?>