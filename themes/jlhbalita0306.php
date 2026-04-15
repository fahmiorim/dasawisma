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
	  
		  
					$totbalita0306 =pg_query($koneksi, "select sum(balita) as totjlhbalita0306 from keluarga where kodekel='0306'");
						$jlhtotbalita0306=pg_fetch_array($totbalita0306); 
						$jumlahbalita0306=$jlhtotbalita0306[totjlhbalita0306];
						$totjumlahbalita0306=number_format($jumlahbalita0306,0,",",".");
					echo "$totjumlahbalita0306";
 } ?>