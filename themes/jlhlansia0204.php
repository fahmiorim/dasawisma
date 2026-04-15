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
	  
		  
					$totlansia0204 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0204 from keluarga where kodekel='0204'");
						$jlhtotlansia0204=pg_fetch_array($totlansia0204); 
						$jumlahlansia0204=$jlhtotlansia0204[totjlhlansia0204];
						$totjumlahlansia0204=number_format($jumlahlansia0204,0,",",".");
					echo "$totjumlahlansia0204";
 } ?>