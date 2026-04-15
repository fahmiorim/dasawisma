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
	  
		  
			$totakte0106 =pg_query($koneksi, "select count(akte) as totjlhakte0106 from kehamilan where kodekel='0106'");
						$jlhtotakte0106=pg_fetch_array($totakte0106); 
						$jumlahakte0106=$jlhtotakte0106[totjlhakte0106];
						$totjumlahakte0106=number_format($jumlahakte0106,0,",",".");
					echo "$totjumlahakte0106";
 } ?>