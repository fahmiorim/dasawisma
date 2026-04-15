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
	  
		  
			$totakte0401 =pg_query($koneksi, "select count(akte) as totjlhakte0401 from kehamilan where kodekel='0401'");
						$jlhtotakte0401=pg_fetch_array($totakte0401); 
						$jumlahakte0401=$jlhtotakte0401[totjlhakte0401];
						$totjumlahakte0401=number_format($jumlahakte0401,0,",",".");
					echo "$totjumlahakte0401";
 } ?>