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
	  
		  
					$totbalita0508 =pg_query($koneksi, "select sum(balita) as totjlhbalita0508 from keluarga where kodekel='0508'");
						$jlhtotbalita0508=pg_fetch_array($totbalita0508); 
						$jumlahbalita0508=$jlhtotbalita0508[totjlhbalita0508];
						$totjumlahbalita0508=number_format($jumlahbalita0508,0,",",".");
					echo "$totjumlahbalita0508";
 } ?>