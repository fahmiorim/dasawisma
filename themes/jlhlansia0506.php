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
	  
		  
					$totlansia0506 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0506 from keluarga where kodekel='0506'");
						$jlhtotlansia0506=pg_fetch_array($totlansia0506); 
						$jumlahlansia0506=$jlhtotlansia0506[totjlhlansia0506];
						$totjumlahlansia0506=number_format($jumlahlansia0506,0,",",".");
					echo "$totjumlahlansia0506";
 } ?>