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
	  
		  
					$totkaderl030207 =pg_query($koneksi, "select sum(kaderl) as totjlhkaderl030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotkaderl030207=pg_fetch_array($totkaderl030207); 
						$jumlahkaderl030207=$jlhtotkaderl030207[totjlhkaderl030207];
						$totjumlahkaderl030207=number_format($jumlahkaderl030207,0,",",".");
					echo "$totjumlahkaderl030207";
 } ?>