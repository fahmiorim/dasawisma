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
	  
		  
					$totbalita0408 =pg_query($koneksi, "select sum(balita) as totjlhbalita0408 from keluarga where kodekel='0408'");
						$jlhtotbalita0408=pg_fetch_array($totbalita0408); 
						$jumlahbalita0408=$jlhtotbalita0408[totjlhbalita0408];
						$totjumlahbalita0408=number_format($jumlahbalita0408,0,",",".");
					echo "$totjumlahbalita0408";
 } ?>