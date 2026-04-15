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
	  
		  
			$totakte0507 =pg_query($koneksi, "select count(akte) as totjlhakte0507 from kehamilan where kodekel='0507'");
						$jlhtotakte0507=pg_fetch_array($totakte0507); 
						$jumlahakte0507=$jlhtotakte0507[totjlhakte0507];
						$totjumlahakte0507=number_format($jumlahakte0507,0,",",".");
					echo "$totjumlahakte0507";
 } ?>