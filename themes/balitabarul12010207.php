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
	  
		  
					$totbalitabarul12010207 =pg_query($koneksi, "select sum(balitabarul12) as totjlhbalitabarul12010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitabarul12010207=pg_fetch_array($totbalitabarul12010207); 
						$jumlahbalitabarul12010207=$jlhtotbalitabarul12010207[totjlhbalitabarul12010207];
						$totjumlahbalitabarul12010207=number_format($jumlahbalitabarul12010207,0,",",".");
					echo "$totjumlahbalitabarul12010207";
 } ?>