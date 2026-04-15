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
	  
		  
					$totbuta30403 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30403 from keluarga where kodekel='0403'");
						$jlhtotbuta30403=pg_fetch_array($totbuta30403); 
						$jumlahbuta30403=$jlhtotbuta30403[totjlhbuta30403];
						$totjumlahbuta30403=number_format($jumlahbuta30403,0,",",".");
					echo "$totjumlahbuta30403";
 } ?>