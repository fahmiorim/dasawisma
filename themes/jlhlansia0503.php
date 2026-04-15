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
	  
		  
					$totlansia0503 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0503 from keluarga where kodekel='0503'");
						$jlhtotlansia0503=pg_fetch_array($totlansia0503); 
						$jumlahlansia0503=$jlhtotlansia0503[totjlhlansia0503];
						$totjumlahlansia0503=number_format($jumlahlansia0503,0,",",".");
					echo "$totjumlahlansia0503";
 } ?>