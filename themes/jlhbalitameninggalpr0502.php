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
	  
		  
$totbalitap0502 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0502 from kehamilan where kodekel='0502'");
						$jlhtotbalitap0502=pg_fetch_array($totbalitap0502); 
						$jumlahbalitap0502=$jlhtotbalitap0502[totjlhbalitap0502];
						$totjumlahbalitap0502=number_format($jumlahbalitap0502,0,",",".");
					echo "$totjumlahbalitap0502";
 } ?>