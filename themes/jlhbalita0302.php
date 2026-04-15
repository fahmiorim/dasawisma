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
	  
		  
					$totbalita0302 =pg_query($koneksi, "select sum(balita) as totjlhbalita0302 from keluarga where kodekel='0302'");
						$jlhtotbalita0302=pg_fetch_array($totbalita0302); 
						$jumlahbalita0302=$jlhtotbalita0302[totjlhbalita0302];
						$totjumlahbalita0302=number_format($jumlahbalita0302,0,",",".");
					echo "$totjumlahbalita0302";
 } ?>