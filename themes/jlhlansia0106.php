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
	  
		  
					$totlansia0106 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0106 from keluarga where kodekel='0106'");
						$jlhtotlansia0106=pg_fetch_array($totlansia0106); 
						$jumlahlansia0106=$jlhtotlansia0106[totjlhlansia0106];
						$totjumlahlansia0106=number_format($jumlahlansia0106,0,",",".");
					echo "$totjumlahlansia0106";
 } ?>