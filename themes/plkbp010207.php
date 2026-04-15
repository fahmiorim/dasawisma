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
	  
		  
					$totplkbp010207 =pg_query($koneksi, "select sum(plkbp) as totjlhplkbp010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotplkbp010207=pg_fetch_array($totplkbp010207); 
						$jumlahplkbp010207=$jlhtotplkbp010207[totjlhplkbp010207];
						$totjumlahplkbp010207=number_format($jumlahplkbp010207,0,",",".");
					echo "$totjumlahplkbp010207";
 } ?>