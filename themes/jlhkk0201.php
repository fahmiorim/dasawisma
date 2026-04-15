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
	  
		  
					$totkk0201 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0201 from keluarga where kodekel='0201'");
						$jlhtotkk0201=pg_fetch_array($totkk0201); 
						$jumlahkk0201=$jlhtotkk0201[totjlhkk0201];
						$totjumlahkk0201=number_format($jumlahkk0201,0,",",".");
					echo "$totjumlahkk0201";
 } ?>