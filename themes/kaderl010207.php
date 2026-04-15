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
	  
		  
					$totkaderl010207 =pg_query($koneksi, "select sum(kaderl) as totjlhkaderl010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotkaderl010207=pg_fetch_array($totkaderl010207); 
						$jumlahkaderl010207=$jlhtotkaderl010207[totjlhkaderl010207];
						$totjumlahkaderl010207=number_format($jumlahkaderl010207,0,",",".");
					echo "$totjumlahkaderl010207";
 } ?>