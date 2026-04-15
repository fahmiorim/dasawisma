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
	  
		  
			$totakte0508 =pg_query($koneksi, "select count(akte) as totjlhakte0508 from kehamilan where kodekel='0508'");
						$jlhtotakte0508=pg_fetch_array($totakte0508); 
						$jumlahakte0508=$jlhtotakte0508[totjlhakte0508];
						$totjumlahakte0508=number_format($jumlahakte0508,0,",",".");
					echo "$totjumlahakte0508";
 } ?>