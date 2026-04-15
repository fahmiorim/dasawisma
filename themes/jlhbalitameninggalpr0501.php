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
	  
		  
$totbalitap0501 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0501 from kehamilan where kodekel='0501'");
						$jlhtotbalitap0501=pg_fetch_array($totbalitap0501); 
						$jumlahbalitap0501=$jlhtotbalitap0501[totjlhbalitap0501];
						$totjumlahbalitap0501=number_format($jumlahbalitap0501,0,",",".");
					echo "$totjumlahbalitap0501";
 } ?>