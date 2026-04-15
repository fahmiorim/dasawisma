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
	  
		  
					$totlansia0302 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0302 from keluarga where kodekel='0302'");
						$jlhtotlansia0302=pg_fetch_array($totlansia0302); 
						$jumlahlansia0302=$jlhtotlansia0302[totjlhlansia0302];
						$totjumlahlansia0302=number_format($jumlahlansia0302,0,",",".");
					echo "$totjumlahlansia0302";
 } ?>