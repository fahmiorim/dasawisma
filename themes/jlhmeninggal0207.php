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
	  
		  
			$totmeninggal0207 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0207 from kehamilan where kodekel='0207'");
						$jlhtotmeninggal0207=pg_fetch_array($totmeninggal0207); 
						$jumlahmeninggal0207=$jlhtotmeninggal0207[totjlhmeninggal0207];
						$totjumlahmeninggal0207=number_format($jumlahmeninggal0207,0,",",".");
					echo "$totjumlahmeninggal0207";
 } ?>