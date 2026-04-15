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
	  
		  
					$totplkbp030207 =pg_query($koneksi, "select sum(plkbp) as totjlhplkbp030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotplkbp030207=pg_fetch_array($totplkbp030207); 
						$jumlahplkbp030207=$jlhtotplkbp030207[totjlhplkbp030207];
						$totjumlahplkbp030207=number_format($jumlahplkbp030207,0,",",".");
					echo "$totjumlahplkbp030207";
 } ?>