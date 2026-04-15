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
	  
		  
			$totakte0203 =pg_query($koneksi, "select count(akte) as totjlhakte0203 from kehamilan where kodekel='0203'");
						$jlhtotakte0203=pg_fetch_array($totakte0203); 
						$jumlahakte0203=$jlhtotakte0203[totjlhakte0203];
						$totjumlahakte0203=number_format($jumlahakte0203,0,",",".");
					echo "$totjumlahakte0203";
 } ?>