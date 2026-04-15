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
	  
		  
			$totakte0101 =pg_query($koneksi, "select count(akte) as totjlhakte0101 from kehamilan where kodekel='0101'");
						$jlhtotakte0101=pg_fetch_array($totakte0101); 
						$jumlahakte0101=$jlhtotakte0101[totjlhakte0101];
						$totjumlahakte0101=number_format($jumlahakte0101,0,",",".");
					echo "$totjumlahakte0101";
 } ?>