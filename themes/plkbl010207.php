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
	  
		  
					$totplkbl010207 =pg_query($koneksi, "select sum(plkbl) as totjlhplkbl010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotplkbl010207=pg_fetch_array($totplkbl010207); 
						$jumlahplkbl010207=$jlhtotplkbl010207[totjlhplkbl010207];
						$totjumlahplkbl010207=number_format($jumlahplkbl010207,0,",",".");
					echo "$totjumlahplkbl010207";
 } ?>