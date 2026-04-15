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
	  
		  
$totbalitap0409 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0409 from kehamilan where kodekel='0409'");
						$jlhtotbalitap0409=pg_fetch_array($totbalitap0409); 
						$jumlahbalitap0409=$jlhtotbalitap0409[totjlhbalitap0409];
						$totjumlahbalitap0409=number_format($jumlahbalitap0409,0,",",".");
					echo "$totjumlahbalitap0409";
 } ?>