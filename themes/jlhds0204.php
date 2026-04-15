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
	  
		  
					$totds0204 =pg_query($koneksi, "select count(kode) as totjlhds0204 from dasawisma where kodekel='0204'");
						$jlhtotds0204=pg_fetch_array($totds0204); 
						$jumlahds0204=$jlhtotds0204[totjlhds0204];
						$totjumlahds0204=number_format($jumlahds0204,0,",",".");
					echo "$totjumlahds0204";
 } ?>