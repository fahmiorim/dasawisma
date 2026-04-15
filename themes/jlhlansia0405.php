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
	  
		  
					$totlansia0405 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0405 from keluarga where kodekel='0405'");
						$jlhtotlansia0405=pg_fetch_array($totlansia0405); 
						$jumlahlansia0405=$jlhtotlansia0405[totjlhlansia0405];
						$totjumlahlansia0405=number_format($jumlahlansia0405,0,",",".");
					echo "$totjumlahlansia0405";
 } ?>