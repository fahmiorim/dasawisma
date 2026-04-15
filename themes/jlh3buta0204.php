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
	  
		  
					$totbuta30204 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30204 from keluarga where kodekel='0204'");
						$jlhtotbuta30204=pg_fetch_array($totbuta30204); 
						$jumlahbuta30204=$jlhtotbuta30204[totjlhbuta30204];
						$totjumlahbuta30204=number_format($jumlahbuta30204,0,",",".");
					echo "$totjumlahbuta30204";
 } ?>