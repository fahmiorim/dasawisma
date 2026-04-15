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
	  
		  
					$totwusyd010207 =pg_query($koneksi, "select sum(wusyd) as totjlhwusyd010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotwusyd010207=pg_fetch_array($totwusyd010207); 
						$jumlahwusyd010207=$jlhtotwusyd010207[totjlhwusyd010207];
						$totjumlahwusyd010207=number_format($jumlahwusyd010207,0,",",".");
					echo "$totjumlahwusyd010207";
 } ?>