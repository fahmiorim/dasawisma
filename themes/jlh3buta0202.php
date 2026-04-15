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
	  
		  
					$totbuta30202 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30202 from keluarga where kodekel='0202'");
						$jlhtotbuta30202=pg_fetch_array($totbuta30202); 
						$jumlahbuta30202=$jlhtotbuta30202[totjlhbuta30202];
						$totjumlahbuta30202=number_format($jumlahbuta30202,0,",",".");
					echo "$totjumlahbuta30202";
 } ?>