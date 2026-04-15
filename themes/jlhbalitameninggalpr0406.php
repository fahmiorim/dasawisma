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
	  
		  
$totbalitap0406 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0406 from kehamilan where kodekel='0406'");
						$jlhtotbalitap0406=pg_fetch_array($totbalitap0406); 
						$jumlahbalitap0406=$jlhtotbalitap0406[totjlhbalitap0406];
						$totjumlahbalitap0406=number_format($jumlahbalitap0406,0,",",".");
					echo "$totjumlahbalitap0406";
 } ?>