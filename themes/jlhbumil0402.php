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
	  
		  
					$totbumil0402 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0402 from keluarga where kodekel='0402'");
						$jlhtotbumil0402=pg_fetch_array($totbumil0402); 
						$jumlahbumil0402=$jlhtotbumil0402[totjlhbumil0402];
						$totjumlahbumil0402=number_format($jumlahbumil0402,0,",",".");
					echo "$totjumlahbumil0402";
 } ?>