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
	  
		  
$totbalitap0206 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0206 from kehamilan where kodekel='0206'");
						$jlhtotbalitap0206=pg_fetch_array($totbalitap0206); 
						$jumlahbalitap0206=$jlhtotbalitap0206[totjlhbalitap0206];
						$totjumlahbalitap0206=number_format($jumlahbalitap0206,0,",",".");
					echo "$totjumlahbalitap0206";
 } ?>