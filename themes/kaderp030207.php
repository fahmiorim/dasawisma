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
	  
		  
					$totkaderp030207 =pg_query($koneksi, "select sum(kaderp) as totjlhkaderp030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotkaderp030207=pg_fetch_array($totkaderp030207); 
						$jumlahkaderp030207=$jlhtotkaderp030207[totjlhkaderp030207];
						$totjumlahkaderp030207=number_format($jumlahkaderp030207,0,",",".");
					echo "$totjumlahkaderp030207";
 } ?>