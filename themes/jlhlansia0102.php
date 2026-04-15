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
	  
		  
					$totlansia0102 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0102 from keluarga where kodekel='0102'");
						$jlhtotlansia0102=pg_fetch_array($totlansia0102); 
						$jumlahlansia0102=$jlhtotlansia0102[totjlhlansia0102];
						$totjumlahlansia0102=number_format($jumlahlansia0102,0,",",".");
					echo "$totjumlahlansia0102";
 } ?>