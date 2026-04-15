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
	  
		  
					$totbuta30501 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30501 from keluarga where kodekel='0501'");
						$jlhtotbuta30501=pg_fetch_array($totbuta30501); 
						$jumlahbuta30501=$jlhtotbuta30501[totjlhbuta30501];
						$totjumlahbuta30501=number_format($jumlahbuta30501,0,",",".");
					echo "$totjumlahbuta30501";
 } ?>