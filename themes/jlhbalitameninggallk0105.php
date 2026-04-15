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
	  
		  
$totbalital0105 =pg_query($koneksi, "select sum(balital) as totjlhbalital0105 from kehamilan where kodekel='0105'");
						$jlhtotbalital0105=pg_fetch_array($totbalital0105); 
						$jumlahbalital0105=$jlhtotbalital0105[totjlhbalital0105];
						$totjumlahbalital0105=number_format($jumlahbalital0105,0,",",".");
					echo "$totjumlahbalital0105";
 } ?>