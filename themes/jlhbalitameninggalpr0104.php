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
	  
		  
$totbalitap0104 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0104 from kehamilan where kodekel='0104'");
						$jlhtotbalitap0104=pg_fetch_array($totbalitap0104); 
						$jumlahbalitap0104=$jlhtotbalitap0104[totjlhbalitap0104];
						$totjumlahbalitap0104=number_format($jumlahbalitap0104,0,",",".");
					echo "$totjumlahbalitap0104";
 } ?>