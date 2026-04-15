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
	  
		  
			$totakte0403 =pg_query($koneksi, "select count(akte) as totjlhakte0403 from kehamilan where kodekel='0403'");
						$jlhtotakte0403=pg_fetch_array($totakte0403); 
						$jumlahakte0403=$jlhtotakte0403[totjlhakte0403];
						$totjumlahakte0403=number_format($jumlahakte0403,0,",",".");
					echo "$totjumlahakte0403";
 } ?>