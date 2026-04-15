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
	  
		  
$totbalitap0105 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0105 from kehamilan where kodekel='0105'");
						$jlhtotbalitap0105=pg_fetch_array($totbalitap0105); 
						$jumlahbalitap0105=$jlhtotbalitap0105[totjlhbalitap0105];
						$totjumlahbalitap0105=number_format($jumlahbalitap0105,0,",",".");
					echo "$totjumlahbalitap0105";
 } ?>