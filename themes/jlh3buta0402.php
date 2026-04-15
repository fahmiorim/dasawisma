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
	  
		  
					$totbuta30402 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30402 from keluarga where kodekel='0402'");
						$jlhtotbuta30402=pg_fetch_array($totbuta30402); 
						$jumlahbuta30402=$jlhtotbuta30402[totjlhbuta30402];
						$totjumlahbuta30402=number_format($jumlahbuta30402,0,",",".");
					echo "$totjumlahbuta30402";
 } ?>