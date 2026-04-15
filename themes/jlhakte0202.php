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
	  
		  
			$totakte0202 =pg_query($koneksi, "select count(akte) as totjlhakte0202 from kehamilan where kodekel='0202'");
						$jlhtotakte0202=pg_fetch_array($totakte0202); 
						$jumlahakte0202=$jlhtotakte0202[totjlhakte0202];
						$totjumlahakte0202=number_format($jumlahakte0202,0,",",".");
					echo "$totjumlahakte0202";
 } ?>