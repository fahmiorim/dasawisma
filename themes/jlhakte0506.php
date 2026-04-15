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
	  
		  
			$totakte0506 =pg_query($koneksi, "select count(akte) as totjlhakte0506 from kehamilan where kodekel='0506'");
						$jlhtotakte0506=pg_fetch_array($totakte0506); 
						$jumlahakte0506=$jlhtotakte0506[totjlhakte0506];
						$totjumlahakte0506=number_format($jumlahakte0506,0,",",".");
					echo "$totjumlahakte0506";
 } ?>