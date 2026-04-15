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
	  
		  
					$totbuta30207 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30207 from keluarga where kodekel='0207'");
						$jlhtotbuta30207=pg_fetch_array($totbuta30207); 
						$jumlahbuta30207=$jlhtotbuta30207[totjlhbuta30207];
						$totjumlahbuta30207=number_format($jumlahbuta30207,0,",",".");
					echo "$totjumlahbuta30207";
 } ?>