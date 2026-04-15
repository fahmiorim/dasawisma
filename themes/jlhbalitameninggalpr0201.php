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
	  
		  
$totbalitap0201 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0201 from kehamilan where kodekel='0201'");
						$jlhtotbalitap0201=pg_fetch_array($totbalitap0201); 
						$jumlahbalitap0201=$jlhtotbalitap0201[totjlhbalitap0201];
						$totjumlahbalitap0201=number_format($jumlahbalitap0201,0,",",".");
					echo "$totjumlahbalitap0201";
 } ?>