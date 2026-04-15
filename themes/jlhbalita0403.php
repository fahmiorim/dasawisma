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
	  
		  
					$totbalita0403 =pg_query($koneksi, "select sum(balita) as totjlhbalita0403 from keluarga where kodekel='0403'");
						$jlhtotbalita0403=pg_fetch_array($totbalita0403); 
						$jumlahbalita0403=$jlhtotbalita0403[totjlhbalita0403];
						$totjumlahbalita0403=number_format($jumlahbalita0403,0,",",".");
					echo "$totjumlahbalita0403";
 } ?>