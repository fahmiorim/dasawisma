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
	  
		  
					$totkk0206 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0206 from keluarga where kodekel='0206'");
						$jlhtotkk0206=pg_fetch_array($totkk0206); 
						$jumlahkk0206=$jlhtotkk0206[totjlhkk0206];
						$totjumlahkk0206=number_format($jumlahkk0206,0,",",".");
					echo "$totjumlahkk0206";
 } ?>