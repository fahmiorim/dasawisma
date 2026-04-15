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
	  
		  
					$totbalita0405 =pg_query($koneksi, "select sum(balita) as totjlhbalita0405 from keluarga where kodekel='0405'");
						$jlhtotbalita0405=pg_fetch_array($totbalita0405); 
						$jumlahbalita0405=$jlhtotbalita0405[totjlhbalita0405];
						$totjumlahbalita0405=number_format($jumlahbalita0405,0,",",".");
					echo "$totjumlahbalita0405";
 } ?>