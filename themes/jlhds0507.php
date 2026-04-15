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
	  
		  
					$totds0507 =pg_query($koneksi, "select count(kode) as totjlhds0507 from dasawisma where kodekel='0507'");
						$jlhtotds0507=pg_fetch_array($totds0507); 
						$jumlahds0507=$jlhtotds0507[totjlhds0507];
						$totjumlahds0507=number_format($jumlahds0507,0,",",".");
					echo "$totjumlahds0507";
 } ?>