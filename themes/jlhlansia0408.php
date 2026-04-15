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
	  
		  
					$totlansia0408 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0408 from keluarga where kodekel='0408'");
						$jlhtotlansia0408=pg_fetch_array($totlansia0408); 
						$jumlahlansia0408=$jlhtotlansia0408[totjlhlansia0408];
						$totjumlahlansia0408=number_format($jumlahlansia0408,0,",",".");
					echo "$totjumlahlansia0408";
 } ?>