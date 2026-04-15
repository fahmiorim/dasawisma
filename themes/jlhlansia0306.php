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
	  
		  
					$totlansia0306 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0306 from keluarga where kodekel='0306'");
						$jlhtotlansia0306=pg_fetch_array($totlansia0306); 
						$jumlahlansia0306=$jlhtotlansia0306[totjlhlansia0306];
						$totjumlahlansia0306=number_format($jumlahlansia0306,0,",",".");
					echo "$totjumlahlansia0306";
 } ?>