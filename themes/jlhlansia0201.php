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
	  
		  
					$totlansia0201 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0201 from keluarga where kodekel='0201'");
						$jlhtotlansia0201=pg_fetch_array($totlansia0201); 
						$jumlahlansia0201=$jlhtotlansia0201[totjlhlansia0201];
						$totjumlahlansia0201=number_format($jumlahlansia0201,0,",",".");
					echo "$totjumlahlansia0201";
 } ?>