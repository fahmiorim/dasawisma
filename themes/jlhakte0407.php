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
	  
		  
			$totakte0407 =pg_query($koneksi, "select count(akte) as totjlhakte0407 from kehamilan where kodekel='0407'");
						$jlhtotakte0407=pg_fetch_array($totakte0407); 
						$jumlahakte0407=$jlhtotakte0407[totjlhakte0407];
						$totjumlahakte0407=number_format($jumlahakte0407,0,",",".");
					echo "$totjumlahakte0407";
 } ?>