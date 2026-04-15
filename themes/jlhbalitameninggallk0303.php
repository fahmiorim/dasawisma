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
	  
		  
$totbalital0303 =pg_query($koneksi, "select sum(balital) as totjlhbalital0303 from kehamilan where kodekel='0303'");
						$jlhtotbalital0303=pg_fetch_array($totbalital0303); 
						$jumlahbalital0303=$jlhtotbalital0303[totjlhbalital0303];
						$totjumlahbalital0303=number_format($jumlahbalital0303,0,",",".");
					echo "$totjumlahbalital0303";
 } ?>