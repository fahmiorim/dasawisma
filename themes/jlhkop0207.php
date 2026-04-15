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
	  
		  
					$totkop0207 =pg_query($koneksi, "select count(kodekel) as totjlhkop0207 from koperasi where kodekel='0207'");
						$jlhtotkop0207=pg_fetch_array($totkop0207); 
						$jumlahkop0207=$jlhtotkop0207[totjlhkop0207];
						$totjumlahkop0207=number_format($jumlahkop0207,0,",",".");
					echo "$totjumlahkop0207";
 } ?>