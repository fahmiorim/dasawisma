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
	  
		  
			$totakte0307 =pg_query($koneksi, "select count(akte) as totjlhakte0307 from kehamilan where kodekel='0307'");
						$jlhtotakte0307=pg_fetch_array($totakte0307); 
						$jumlahakte0307=$jlhtotakte0307[totjlhakte0307];
						$totjumlahakte0307=number_format($jumlahakte0307,0,",",".");
					echo "$totjumlahakte0307";
 } ?>