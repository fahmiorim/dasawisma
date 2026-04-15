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
	  
		  
					$totbuta30303 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30303 from keluarga where kodekel='0303'");
						$jlhtotbuta30303=pg_fetch_array($totbuta30303); 
						$jumlahbuta30303=$jlhtotbuta30303[totjlhbuta30303];
						$totjumlahbuta30303=number_format($jumlahbuta30303,0,",",".");
					echo "$totjumlahbuta30303";
 } ?>