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
	  
		  
					$totbalita0203 =pg_query($koneksi, "select sum(balita) as totjlhbalita0203 from keluarga where kodekel='0203'");
						$jlhtotbalita0203=pg_fetch_array($totbalita0203); 
						$jumlahbalita0203=$jlhtotbalita0203[totjlhbalita0203];
						$totjumlahbalita0203=number_format($jumlahbalita0203,0,",",".");
					echo "$totjumlahbalita0203";
 } ?>