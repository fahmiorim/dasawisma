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
	  
		  
$totbalitap0305 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0305 from kehamilan where kodekel='0305'");
						$jlhtotbalitap0305=pg_fetch_array($totbalitap0305); 
						$jumlahbalitap0305=$jlhtotbalitap0305[totjlhbalitap0305];
						$totjumlahbalitap0305=number_format($jumlahbalitap0305,0,",",".");
					echo "$totjumlahbalitap0305";
 } ?>