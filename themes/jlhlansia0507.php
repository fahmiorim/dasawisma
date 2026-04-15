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
	  
		  
					$totlansia0507 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0507 from keluarga where kodekel='0507'");
						$jlhtotlansia0507=pg_fetch_array($totlansia0507); 
						$jumlahlansia0507=$jlhtotlansia0507[totjlhlansia0507];
						$totjumlahlansia0507=number_format($jumlahlansia0507,0,",",".");
					echo "$totjumlahlansia0507";
 } ?>