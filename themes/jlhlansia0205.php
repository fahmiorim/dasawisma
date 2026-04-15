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
	  
		  
					$totlansia0205 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0205 from keluarga where kodekel='0205'");
						$jlhtotlansia0205=pg_fetch_array($totlansia0205); 
						$jumlahlansia0205=$jlhtotlansia0205[totjlhlansia0205];
						$totjumlahlansia0205=number_format($jumlahlansia0205,0,",",".");
					echo "$totjumlahlansia0205";
 } ?>