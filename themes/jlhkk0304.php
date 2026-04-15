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
	  
		  
					$totkk0304 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0304 from keluarga where kodekel='0304'");
						$jlhtotkk0304=pg_fetch_array($totkk0304); 
						$jumlahkk0304=$jlhtotkk0304[totjlhkk0304];
						$totjumlahkk0304=number_format($jumlahkk0304,0,",",".");
					echo "$totjumlahkk0304";
 } ?>