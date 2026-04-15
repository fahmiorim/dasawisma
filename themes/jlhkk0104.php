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
	  
		  
					$totkk0104 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0104 from keluarga where kodekel='0104'");
						$jlhtotkk0104=pg_fetch_array($totkk0104); 
						$jumlahkk0104=$jlhtotkk0104[totjlhkk0104];
						$totjumlahkk0104=number_format($jumlahkk0104,0,",",".");
					echo "$totjumlahkk0104";
 } ?>