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
	  
		  
$totbalitap0103 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0103 from kehamilan where kodekel='0103'");
						$jlhtotbalitap0103=pg_fetch_array($totbalitap0103); 
						$jumlahbalitap0103=$jlhtotbalitap0103[totjlhbalitap0103];
						$totjumlahbalitap0103=number_format($jumlahbalitap0103,0,",",".");
					echo "$totjumlahbalitap0103";
 } ?>