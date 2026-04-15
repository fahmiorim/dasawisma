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
	  
		  
					$totbuta30102 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30102 from keluarga where kodekel='0102'");
						$jlhtotbuta30102=pg_fetch_array($totbuta30102); 
						$jumlahbuta30102=$jlhtotbuta30102[totjlhbuta30102];
						$totjumlahbuta30102=number_format($jumlahbuta30102,0,",",".");
					echo "$totjumlahbuta30102";
 } ?>