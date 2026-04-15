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
	  
		  
					$totbuta30506 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30506 from keluarga where kodekel='0506'");
						$jlhtotbuta30506=pg_fetch_array($totbuta30506); 
						$jumlahbuta30506=$jlhtotbuta30506[totjlhbuta30506];
						$totjumlahbuta30506=number_format($jumlahbuta30506,0,",",".");
					echo "$totjumlahbuta30506";
 } ?>