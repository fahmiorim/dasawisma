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
	  
		  
					$totlansia0505 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0505 from keluarga where kodekel='0505'");
						$jlhtotlansia0505=pg_fetch_array($totlansia0505); 
						$jumlahlansia0505=$jlhtotlansia0505[totjlhlansia0505];
						$totjumlahlansia0505=number_format($jumlahlansia0505,0,",",".");
					echo "$totjumlahlansia0505";
 } ?>