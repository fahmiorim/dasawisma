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
	  
		  
					$totkk0303 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0303 from keluarga where kodekel='0303'");
						$jlhtotkk0303=pg_fetch_array($totkk0303); 
						$jumlahkk0303=$jlhtotkk0303[totjlhkk0303];
						$totjumlahkk0303=number_format($jumlahkk0303,0,",",".");
					echo "$totjumlahkk0303";
 } ?>