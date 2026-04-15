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
	  
		  
					$totplkbp020207 =pg_query($koneksi, "select sum(plkbp) as totjlhplkbp020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotplkbp020207=pg_fetch_array($totplkbp020207); 
						$jumlahplkbp020207=$jlhtotplkbp020207[totjlhplkbp020207];
						$totjumlahplkbp020207=number_format($jumlahplkbp020207,0,",",".");
					echo "$totjumlahplkbp020207";
 } ?>