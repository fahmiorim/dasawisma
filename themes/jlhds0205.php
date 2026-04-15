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
	  
		  
					$totds0205 =pg_query($koneksi, "select count(kode) as totjlhds0205 from dasawisma where kodekel='0205'");
						$jlhtotds0205=pg_fetch_array($totds0205); 
						$jumlahds0205=$jlhtotds0205[totjlhds0205];
						$totjumlahds0205=number_format($jumlahds0205,0,",",".");
					echo "$totjumlahds0205";
 } ?>