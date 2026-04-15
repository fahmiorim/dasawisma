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
	  
		  
			$totakte0404 =pg_query($koneksi, "select count(akte) as totjlhakte0404 from kehamilan where kodekel='0404'");
						$jlhtotakte0404=pg_fetch_array($totakte0404); 
						$jumlahakte0404=$jlhtotakte0404[totjlhakte0404];
						$totjumlahakte0404=number_format($jumlahakte0404,0,",",".");
					echo "$totjumlahakte0404";
 } ?>