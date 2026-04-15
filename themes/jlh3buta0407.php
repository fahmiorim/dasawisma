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
	  
		  
					$totbuta30407 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30407 from keluarga where kodekel='0407'");
						$jlhtotbuta30407=pg_fetch_array($totbuta30407); 
						$jumlahbuta30407=$jlhtotbuta30407[totjlhbuta30407];
						$totjumlahbuta30407=number_format($jumlahbuta30407,0,",",".");
					echo "$totjumlahbuta30407";
 } ?>