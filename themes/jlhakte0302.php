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
	  
		  
			$totakte0302 =pg_query($koneksi, "select count(akte) as totjlhakte0302 from kehamilan where kodekel='0302'");
						$jlhtotakte0302=pg_fetch_array($totakte0302); 
						$jumlahakte0302=$jlhtotakte0302[totjlhakte0302];
						$totjumlahakte0302=number_format($jumlahakte0302,0,",",".");
					echo "$totjumlahakte0302";
 } ?>