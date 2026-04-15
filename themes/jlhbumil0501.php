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
	  
		  
					$totbumil0501 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0501 from keluarga where kodekel='0501'");
						$jlhtotbumil0501=pg_fetch_array($totbumil0501); 
						$jumlahbumil0501=$jlhtotbumil0501[totjlhbumil0501];
						$totjumlahbumil0501=number_format($jumlahbumil0501,0,",",".");
					echo "$totjumlahbumil0501";
 } ?>