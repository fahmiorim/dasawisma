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
	  
		  
					$tothamilyd030207 =pg_query($koneksi, "select sum(hamilyd) as totjlhhamilyd030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtothamilyd030207=pg_fetch_array($tothamilyd030207); 
						$jumlahhamilyd030207=$jlhtothamilyd030207[totjlhhamilyd030207];
						$totjumlahhamilyd030207=number_format($jumlahhamilyd030207,0,",",".");
					echo "$totjumlahhamilyd030207";
 } ?>