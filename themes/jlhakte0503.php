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
	  
		  
			$totakte0503 =pg_query($koneksi, "select count(akte) as totjlhakte0503 from kehamilan where kodekel='0503'");
						$jlhtotakte0503=pg_fetch_array($totakte0503); 
						$jumlahakte0503=$jlhtotakte0503[totjlhakte0503];
						$totjumlahakte0503=number_format($jumlahakte0503,0,",",".");
					echo "$totjumlahakte0503";
 } ?>