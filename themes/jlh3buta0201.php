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
	  
		  
					$totbuta30201 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30201 from keluarga where kodekel='0201'");
						$jlhtotbuta30201=pg_fetch_array($totbuta30201); 
						$jumlahbuta30201=$jlhtotbuta30201[totjlhbuta30201];
						$totjumlahbuta30201=number_format($jumlahbuta30201,0,",",".");
					echo "$totjumlahbuta30201";
 } ?>