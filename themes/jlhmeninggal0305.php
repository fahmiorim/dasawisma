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
	  
		  
			$totmeninggal0305 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0305 from kehamilan where kodekel='0305'");
						$jlhtotmeninggal0305=pg_fetch_array($totmeninggal0305); 
						$jumlahmeninggal0305=$jlhtotmeninggal0305[totjlhmeninggal0305];
						$totjumlahmeninggal0305=number_format($jumlahmeninggal0305,0,",",".");
					echo "$totjumlahmeninggal0305";
 } ?>