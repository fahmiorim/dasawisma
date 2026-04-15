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
	  
		  
					$totkk0402 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0402 from keluarga where kodekel='0402'");
						$jlhtotkk0402=pg_fetch_array($totkk0402); 
						$jumlahkk0402=$jlhtotkk0402[totjlhkk0402];
						$totjumlahkk0402=number_format($jumlahkk0402,0,",",".");
					echo "$totjumlahkk0402";
 } ?>