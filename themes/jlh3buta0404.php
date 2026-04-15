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
	  
		  
					$totbuta30404 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30404 from keluarga where kodekel='0404'");
						$jlhtotbuta30404=pg_fetch_array($totbuta30404); 
						$jumlahbuta30404=$jlhtotbuta30404[totjlhbuta30404];
						$totjumlahbuta30404=number_format($jumlahbuta30404,0,",",".");
					echo "$totjumlahbuta30404";
 } ?>