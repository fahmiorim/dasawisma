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
	  
		  
					$tothamilyd020207 =pg_query($koneksi, "select sum(hamilyd) as totjlhhamilyd020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtothamilyd020207=pg_fetch_array($tothamilyd020207); 
						$jumlahhamilyd020207=$jlhtothamilyd020207[totjlhhamilyd020207];
						$totjumlahhamilyd020207=number_format($jumlahhamilyd020207,0,",",".");
					echo "$totjumlahhamilyd020207";
 } ?>