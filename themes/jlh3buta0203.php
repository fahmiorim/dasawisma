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
	  
		  
					$totbuta30203 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30203 from keluarga where kodekel='0203'");
						$jlhtotbuta30203=pg_fetch_array($totbuta30203); 
						$jumlahbuta30203=$jlhtotbuta30203[totjlhbuta30203];
						$totjumlahbuta30203=number_format($jumlahbuta30203,0,",",".");
					echo "$totjumlahbuta30203";
 } ?>