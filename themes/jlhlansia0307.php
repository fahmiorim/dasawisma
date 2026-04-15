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
	  
		  
					$totlansia0307 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0307 from keluarga where kodekel='0307'");
						$jlhtotlansia0307=pg_fetch_array($totlansia0307); 
						$jumlahlansia0307=$jlhtotlansia0307[totjlhlansia0307];
						$totjumlahlansia0307=number_format($jumlahlansia0307,0,",",".");
					echo "$totjumlahlansia0307";
 } ?>