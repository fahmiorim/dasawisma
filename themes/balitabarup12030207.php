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
	  
		  
					$totbalitabarup12030207 =pg_query($koneksi, "select sum(balitabarup12) as totjlhbalitabarup12030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitabarup12030207=pg_fetch_array($totbalitabarup12030207); 
						$jumlahbalitabarup12030207=$jlhtotbalitabarup12030207[totjlhbalitabarup12030207];
						$totjumlahbalitabarup12030207=number_format($jumlahbalitabarup12030207,0,",",".");
					echo "$totjumlahbalitabarup12030207";
 } ?>