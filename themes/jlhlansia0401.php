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
	  
		  
					$totlansia0401 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0401 from keluarga where kodekel='0401'");
						$jlhtotlansia0401=pg_fetch_array($totlansia0401); 
						$jumlahlansia0401=$jlhtotlansia0401[totjlhlansia0401];
						$totjumlahlansia0401=number_format($jumlahlansia0401,0,",",".");
					echo "$totjumlahlansia0401";
 } ?>