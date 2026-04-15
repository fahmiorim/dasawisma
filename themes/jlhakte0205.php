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
	  
		  
			$totakte0205 =pg_query($koneksi, "select count(akte) as totjlhakte0205 from kehamilan where kodekel='0205'");
						$jlhtotakte0205=pg_fetch_array($totakte0205); 
						$jumlahakte0205=$jlhtotakte0205[totjlhakte0205];
						$totjumlahakte0205=number_format($jumlahakte0205,0,",",".");
					echo "$totjumlahakte0205";
 } ?>