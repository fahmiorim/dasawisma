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
	  
		  
					$totkaderp010207 =pg_query($koneksi, "select sum(kaderp) as totjlhkaderp010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotkaderp010207=pg_fetch_array($totkaderp010207); 
						$jumlahkaderp010207=$jlhtotkaderp010207[totjlhkaderp010207];
						$totjumlahkaderp010207=number_format($jumlahkaderp010207,0,",",".");
					echo "$totjumlahkaderp010207";
 } ?>