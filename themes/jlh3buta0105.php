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
	  
		  
					$totbuta30105 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30105 from keluarga where kodekel='0105'");
						$jlhtotbuta30105=pg_fetch_array($totbuta30105); 
						$jumlahbuta30105=$jlhtotbuta30105[totjlhbuta30105];
						$totjumlahbuta30105=number_format($jumlahbuta30105,0,",",".");
					echo "$totjumlahbuta30105";
 } ?>