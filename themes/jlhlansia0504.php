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
	  
		  
					$totlansia0504 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0504 from keluarga where kodekel='0504'");
						$jlhtotlansia0504=pg_fetch_array($totlansia0504); 
						$jumlahlansia0504=$jlhtotlansia0504[totjlhlansia0504];
						$totjumlahlansia0504=number_format($jumlahlansia0504,0,",",".");
					echo "$totjumlahlansia0504";
 } ?>