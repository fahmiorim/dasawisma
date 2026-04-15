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
	  
		  
					$totds0403 =pg_query($koneksi, "select count(kode) as totjlhds0403 from dasawisma where kodekel='0403'");
						$jlhtotds0403=pg_fetch_array($totds0403); 
						$jumlahds0403=$jlhtotds0403[totjlhds0403];
						$totjumlahds0403=number_format($jumlahds0403,0,",",".");
					echo "$totjumlahds0403";
 } ?>