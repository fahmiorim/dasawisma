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
	  
		  
					$totlansia0404 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0404 from keluarga where kodekel='0404'");
						$jlhtotlansia0404=pg_fetch_array($totlansia0404); 
						$jumlahlansia0404=$jlhtotlansia0404[totjlhlansia0404];
						$totjumlahlansia0404=number_format($jumlahlansia0404,0,",",".");
					echo "$totjumlahlansia0404";
 } ?>