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
	  
		  
					$totbuta30304 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30304 from keluarga where kodekel='0304'");
						$jlhtotbuta30304=pg_fetch_array($totbuta30304); 
						$jumlahbuta30304=$jlhtotbuta30304[totjlhbuta30304];
						$totjumlahbuta30304=number_format($jumlahbuta30304,0,",",".");
					echo "$totjumlahbuta30304";
 } ?>