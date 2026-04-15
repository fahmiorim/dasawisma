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
	  
		  
					$totlansia0402 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0402 from keluarga where kodekel='0402'");
						$jlhtotlansia0402=pg_fetch_array($totlansia0402); 
						$jumlahlansia0402=$jlhtotlansia0402[totjlhlansia0402];
						$totjumlahlansia0402=number_format($jumlahlansia0402,0,",",".");
					echo "$totjumlahlansia0402";
 } ?>