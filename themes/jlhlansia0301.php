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
	  
		  
					$totlansia0301 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0301 from keluarga where kodekel='0301'");
						$jlhtotlansia0301=pg_fetch_array($totlansia0301); 
						$jumlahlansia0301=$jlhtotlansia0301[totjlhlansia0301];
						$totjumlahlansia0301=number_format($jumlahlansia0301,0,",",".");
					echo "$totjumlahlansia0301";
 } ?>