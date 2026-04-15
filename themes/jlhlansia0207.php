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
	  
		  
					$totlansia0207 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0207 from keluarga where kodekel='0207'");
						$jlhtotlansia0207=pg_fetch_array($totlansia0207); 
						$jumlahlansia0207=$jlhtotlansia0207[totjlhlansia0207];
						$totjumlahlansia0207=number_format($jumlahlansia0207,0,",",".");
					echo "$totjumlahlansia0207";
 } ?>