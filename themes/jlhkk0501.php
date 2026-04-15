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
	  
		  
					$totkk0501 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0501 from keluarga where kodekel='0501'");
						$jlhtotkk0501=pg_fetch_array($totkk0501); 
						$jumlahkk0501=$jlhtotkk0501[totjlhkk0501];
						$totjumlahkk0501=number_format($jumlahkk0501,0,",",".");
					echo "$totjumlahkk0501";
 } ?>