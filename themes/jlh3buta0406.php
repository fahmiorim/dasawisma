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
	  
		  
					$totbuta30406 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30406 from keluarga where kodekel='0406'");
						$jlhtotbuta30406=pg_fetch_array($totbuta30406); 
						$jumlahbuta30406=$jlhtotbuta30406[totjlhbuta30406];
						$totjumlahbuta30406=number_format($jumlahbuta30406,0,",",".");
					echo "$totjumlahbuta30406";
 } ?>