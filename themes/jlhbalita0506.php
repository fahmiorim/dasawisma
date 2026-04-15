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
	  
		  
					$totbalita0506 =pg_query($koneksi, "select sum(balita) as totjlhbalita0506 from keluarga where kodekel='0506'");
						$jlhtotbalita0506=pg_fetch_array($totbalita0506); 
						$jumlahbalita0506=$jlhtotbalita0506[totjlhbalita0506];
						$totjumlahbalita0506=number_format($jumlahbalita0506,0,",",".");
					echo "$totjumlahbalita0506";
 } ?>