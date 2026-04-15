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
	  
		  
					$totlansia0101 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0101 from keluarga where kodekel='0101'");
						$jlhtotlansia0101=pg_fetch_array($totlansia0101); 
						$jumlahlansia0101=$jlhtotlansia0101[totjlhlansia0101];
						$totjumlahlansia0101=number_format($jumlahlansia0101,0,",",".");
					echo "$totjumlahlansia0101";
 } ?>