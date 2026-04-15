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
	  
		  
			$totakte0501 =pg_query($koneksi, "select count(akte) as totjlhakte0501 from kehamilan where kodekel='0501'");
						$jlhtotakte0501=pg_fetch_array($totakte0501); 
						$jumlahakte0501=$jlhtotakte0501[totjlhakte0501];
						$totjumlahakte0501=number_format($jumlahakte0501,0,",",".");
					echo "$totjumlahakte0501";
 } ?>