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
	  
		  
$totbalital0406 =pg_query($koneksi, "select sum(balital) as totjlhbalital0406 from kehamilan where kodekel='0406'");
						$jlhtotbalital0406=pg_fetch_array($totbalital0406); 
						$jumlahbalital0406=$jlhtotbalital0406[totjlhbalital0406];
						$totjumlahbalital0406=number_format($jumlahbalital0406,0,",",".");
					echo "$totjumlahbalital0406";
 } ?>