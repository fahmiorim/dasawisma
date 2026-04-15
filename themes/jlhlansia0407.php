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
	  
		  
					$totlansia0407 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0407 from keluarga where kodekel='0407'");
						$jlhtotlansia0407=pg_fetch_array($totlansia0407); 
						$jumlahlansia0407=$jlhtotlansia0407[totjlhlansia0407];
						$totjumlahlansia0407=number_format($jumlahlansia0407,0,",",".");
					echo "$totjumlahlansia0407";
 } ?>