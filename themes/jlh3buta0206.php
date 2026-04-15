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
	  
		  
					$totbuta30206 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30206 from keluarga where kodekel='0206'");
						$jlhtotbuta30206=pg_fetch_array($totbuta30206); 
						$jumlahbuta30206=$jlhtotbuta30206[totjlhbuta30206];
						$totjumlahbuta30206=number_format($jumlahbuta30206,0,",",".");
					echo "$totjumlahbuta30206";
 } ?>