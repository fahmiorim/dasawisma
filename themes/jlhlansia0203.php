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
	  
		  
					$totlansia0203 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0203 from keluarga where kodekel='0203'");
						$jlhtotlansia0203=pg_fetch_array($totlansia0203); 
						$jumlahlansia0203=$jlhtotlansia0203[totjlhlansia0203];
						$totjumlahlansia0203=number_format($jumlahlansia0203,0,",",".");
					echo "$totjumlahlansia0203";
 } ?>