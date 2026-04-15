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
	  
		  
					$totbumil0406 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0406 from keluarga where kodekel='0406'");
						$jlhtotbumil0406=pg_fetch_array($totbumil0406); 
						$jumlahbumil0406=$jlhtotbumil0406[totjlhbumil0406];
						$totjumlahbumil0406=number_format($jumlahbumil0406,0,",",".");
					echo "$totjumlahbumil0406";
 } ?>