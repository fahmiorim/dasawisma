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
	  
		  
$totbalitap0402 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0402 from kehamilan where kodekel='0402'");
						$jlhtotbalitap0402=pg_fetch_array($totbalitap0402); 
						$jumlahbalitap0402=$jlhtotbalitap0402[totjlhbalitap0402];
						$totjumlahbalitap0402=number_format($jumlahbalitap0402,0,",",".");
					echo "$totjumlahbalitap0402";
 } ?>