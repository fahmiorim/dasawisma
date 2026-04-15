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
	  
		  
			$totakte0301 =pg_query($koneksi, "select count(akte) as totjlhakte0301 from kehamilan where kodekel='0301'");
						$jlhtotakte0301=pg_fetch_array($totakte0301); 
						$jumlahakte0301=$jlhtotakte0301[totjlhakte0301];
						$totjumlahakte0301=number_format($jumlahakte0301,0,",",".");
					echo "$totjumlahakte0301";
 } ?>