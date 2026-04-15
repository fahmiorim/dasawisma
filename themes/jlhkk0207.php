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
	  
		  
					$totkk0207 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0207 from keluarga where kodekel='0207'");
						$jlhtotkk0207=pg_fetch_array($totkk0207); 
						$jumlahkk0207=$jlhtotkk0207[totjlhkk0207];
						$totjumlahkk0207=number_format($jumlahkk0207,0,",",".");
					echo "$totjumlahkk0207";
 } ?>