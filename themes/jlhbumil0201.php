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
	  
		  
					$totbumil0201 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0201 from keluarga where kodekel='0201'");
						$jlhtotbumil0201=pg_fetch_array($totbumil0201); 
						$jumlahbumil0201=$jlhtotbumil0201[totjlhbumil0201];
						$totjumlahbumil0201=number_format($jumlahbumil0201,0,",",".");
					echo "$totjumlahbumil0201";
 } ?>