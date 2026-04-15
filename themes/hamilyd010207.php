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
	  
		  
					$tothamilyd010207 =pg_query($koneksi, "select sum(hamilyd) as totjlhhamilyd010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtothamilyd010207=pg_fetch_array($tothamilyd010207); 
						$jumlahhamilyd010207=$jlhtothamilyd010207[totjlhhamilyd010207];
						$totjumlahhamilyd010207=number_format($jumlahhamilyd010207,0,",",".");
					echo "$totjumlahhamilyd010207";
 } ?>