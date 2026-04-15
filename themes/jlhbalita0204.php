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
	  
		  
					$totbalita0204 =pg_query($koneksi, "select sum(balita) as totjlhbalita0204 from keluarga where kodekel='0204'");
						$jlhtotbalita0204=pg_fetch_array($totbalita0204); 
						$jumlahbalita0204=$jlhtotbalita0204[totjlhbalita0204];
						$totjumlahbalita0204=number_format($jumlahbalita0204,0,",",".");
					echo "$totjumlahbalita0204";
 } ?>