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
	  
		  
$totbalitap0303 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0303 from kehamilan where kodekel='0303'");
						$jlhtotbalitap0303=pg_fetch_array($totbalitap0303); 
						$jumlahbalitap0303=$jlhtotbalitap0303[totjlhbalitap0303];
						$totjumlahbalitap0303=number_format($jumlahbalitap0303,0,",",".");
					echo "$totjumlahbalitap0303";
 } ?>