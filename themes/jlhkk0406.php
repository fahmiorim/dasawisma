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
	  
		  
					$totkk0406 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0406 from keluarga where kodekel='0406'");
						$jlhtotkk0406=pg_fetch_array($totkk0406); 
						$jumlahkk0406=$jlhtotkk0406[totjlhkk0406];
						$totjumlahkk0406=number_format($jumlahkk0406,0,",",".");
					echo "$totjumlahkk0406";
 } ?>