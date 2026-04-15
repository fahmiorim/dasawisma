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
	  
		  
					$totbuta30507 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30507 from keluarga where kodekel='0507'");
						$jlhtotbuta30507=pg_fetch_array($totbuta30507); 
						$jumlahbuta30507=$jlhtotbuta30507[totjlhbuta30507];
						$totjumlahbuta30507=number_format($jumlahbuta30507,0,",",".");
					echo "$totjumlahbuta30507";
 } ?>