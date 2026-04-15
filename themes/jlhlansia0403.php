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
	  
		  
					$totlansia0403 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0403 from keluarga where kodekel='0403'");
						$jlhtotlansia0403=pg_fetch_array($totlansia0403); 
						$jumlahlansia0403=$jlhtotlansia0403[totjlhlansia0403];
						$totjumlahlansia0403=number_format($jumlahlansia0403,0,",",".");
					echo "$totjumlahlansia0403";
 } ?>