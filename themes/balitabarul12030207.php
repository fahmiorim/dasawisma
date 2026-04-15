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
	  
		  
					$totbalitabarul12030207 =pg_query($koneksi, "select sum(balitabarul12) as totjlhbalitabarul12030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitabarul12030207=pg_fetch_array($totbalitabarul12030207); 
						$jumlahbalitabarul12030207=$jlhtotbalitabarul12030207[totjlhbalitabarul12030207];
						$totjumlahbalitabarul12030207=number_format($jumlahbalitabarul12030207,0,",",".");
					echo "$totjumlahbalitabarul12030207";
 } ?>