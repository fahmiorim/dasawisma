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
	  
		  
$totbalitap0304 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0304 from kehamilan where kodekel='0304'");
						$jlhtotbalitap0304=pg_fetch_array($totbalitap0304); 
						$jumlahbalitap0304=$jlhtotbalitap0304[totjlhbalitap0304];
						$totjumlahbalitap0304=number_format($jumlahbalitap0304,0,",",".");
					echo "$totjumlahbalitap0304";
 } ?>