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
	  
		  
			$totakte0408 =pg_query($koneksi, "select count(akte) as totjlhakte0408 from kehamilan where kodekel='0408'");
						$jlhtotakte0408=pg_fetch_array($totakte0408); 
						$jumlahakte0408=$jlhtotakte0408[totjlhakte0408];
						$totjumlahakte0408=number_format($jumlahakte0408,0,",",".");
					echo "$totjumlahakte0408";
 } ?>