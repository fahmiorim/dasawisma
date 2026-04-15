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
	  
		  
					$totbalitalamap12030207 =pg_query($koneksi, "select sum(balitalamap12) as totjlhbalitalamap12030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitalamap12030207=pg_fetch_array($totbalitalamap12030207); 
						$jumlahbalitalamap12030207=$jlhtotbalitalamap12030207[totjlhbalitalamap12030207];
						$totjumlahbalitalamap12030207=number_format($jumlahbalitalamap12030207,0,",",".");
					echo "$totjumlahbalitalamap12030207";
 } ?>