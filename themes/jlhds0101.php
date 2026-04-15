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
	  
		  
					$totds0101 =pg_query($koneksi, "select count(kode) as totjlhds0101 from dasawisma where kodekel='0101'");
						$jlhtotds0101=pg_fetch_array($totds0101); 
						$jumlahds0101=$jlhtotds0101[totjlhds0101];
						$totjumlahds0101=number_format($jumlahds0101,0,",",".");
					echo "$totjumlahds0101";
 } ?>