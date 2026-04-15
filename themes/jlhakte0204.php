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
	  
		  
			$totakte0204 =pg_query($koneksi, "select count(akte) as totjlhakte0204 from kehamilan where kodekel='0204'");
						$jlhtotakte0204=pg_fetch_array($totakte0204); 
						$jumlahakte0204=$jlhtotakte0204[totjlhakte0204];
						$totjumlahakte0204=number_format($jumlahakte0204,0,",",".");
					echo "$totjumlahakte0204";
 } ?>