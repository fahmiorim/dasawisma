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
	  
		  
					$totbalita0401 =pg_query($koneksi, "select sum(balita) as totjlhbalita0401 from keluarga where kodekel='0401'");
						$jlhtotbalita0401=pg_fetch_array($totbalita0401); 
						$jumlahbalita0401=$jlhtotbalita0401[totjlhbalita0401];
						$totjumlahbalita0401=number_format($jumlahbalita0401,0,",",".");
					echo "$totjumlahbalita0401";
 } ?>