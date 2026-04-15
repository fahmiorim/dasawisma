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
	  
		  
					$totbuta30502 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30502 from keluarga where kodekel='0502'");
						$jlhtotbuta30502=pg_fetch_array($totbuta30502); 
						$jumlahbuta30502=$jlhtotbuta30502[totjlhbuta30502];
						$totjumlahbuta30502=number_format($jumlahbuta30502,0,",",".");
					echo "$totjumlahbuta30502";
 } ?>