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
	  
		  
					$totlansia0202 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0202 from keluarga where kodekel='0202'");
						$jlhtotlansia0202=pg_fetch_array($totlansia0202); 
						$jumlahlansia0202=$jlhtotlansia0202[totjlhlansia0202];
						$totjumlahlansia0202=number_format($jumlahlansia0202,0,",",".");
					echo "$totjumlahlansia0202";
 } ?>