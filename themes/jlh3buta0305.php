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
	  
		  
					$totbuta30305 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30305 from keluarga where kodekel='0305'");
						$jlhtotbuta30305=pg_fetch_array($totbuta30305); 
						$jumlahbuta30305=$jlhtotbuta30305[totjlhbuta30305];
						$totjumlahbuta30305=number_format($jumlahbuta30305,0,",",".");
					echo "$totjumlahbuta30305";
 } ?>