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
	  
		  
			$totakte0102 =pg_query($koneksi, "select count(akte) as totjlhakte0102 from kehamilan where kodekel='0102'");
						$jlhtotakte0102=pg_fetch_array($totakte0102); 
						$jumlahakte0102=$jlhtotakte0102[totjlhakte0102];
						$totjumlahakte0102=number_format($jumlahakte0102,0,",",".");
					echo "$totjumlahakte0102";
 } ?>