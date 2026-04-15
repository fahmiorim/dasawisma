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
	  
		  
					$totbuta30104 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30104 from keluarga where kodekel='0104'");
						$jlhtotbuta30104=pg_fetch_array($totbuta30104); 
						$jumlahbuta30104=$jlhtotbuta30104[totjlhbuta30104];
						$totjumlahbuta30104=number_format($jumlahbuta30104,0,",",".");
					echo "$totjumlahbuta30104";
 } ?>