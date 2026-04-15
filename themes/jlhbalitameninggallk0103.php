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
	  
		  
$totbalital0103 =pg_query($koneksi, "select sum(balital) as totjlhbalital0103 from kehamilan where kodekel='0103'");
						$jlhtotbalital0103=pg_fetch_array($totbalital0103); 
						$jumlahbalital0103=$jlhtotbalital0103[totjlhbalital0103];
						$totjumlahbalital0103=number_format($jumlahbalital0103,0,",",".");
					echo "$totjumlahbalital0103";
 } ?>