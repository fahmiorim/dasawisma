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
	  
		  
					$totbalita0504 =pg_query($koneksi, "select sum(balita) as totjlhbalita0504 from keluarga where kodekel='0504'");
						$jlhtotbalita0504=pg_fetch_array($totbalita0504); 
						$jumlahbalita0504=$jlhtotbalita0504[totjlhbalita0504];
						$totjumlahbalita0504=number_format($jumlahbalita0504,0,",",".");
					echo "$totjumlahbalita0504";
 } ?>