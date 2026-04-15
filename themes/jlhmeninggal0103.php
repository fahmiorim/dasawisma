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
	  
		  
			$totmeninggal0103 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0103 from kehamilan where kodekel='0103'");
						$jlhtotmeninggal0103=pg_fetch_array($totmeninggal0103); 
						$jumlahmeninggal0103=$jlhtotmeninggal0103[totjlhmeninggal0103];
						$totjumlahmeninggal0103=number_format($jumlahmeninggal0103,0,",",".");
					echo "$totjumlahmeninggal0103";
 } ?>