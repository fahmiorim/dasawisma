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
	  
		  
$totbalital0502 =pg_query($koneksi, "select sum(balital) as totjlhbalital0502 from kehamilan where kodekel='0502'");
						$jlhtotbalital0502=pg_fetch_array($totbalital0502); 
						$jumlahbalital0502=$jlhtotbalital0502[totjlhbalital0502];
						$totjumlahbalital0502=number_format($jumlahbalital0502,0,",",".");
					echo "$totjumlahbalital0502";
 } ?>