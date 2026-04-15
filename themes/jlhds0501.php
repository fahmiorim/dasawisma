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
	  
		  
					$totds0501 =pg_query($koneksi, "select count(kode) as totjlhds0501 from dasawisma where kodekel='0501'");
						$jlhtotds0501=pg_fetch_array($totds0501); 
						$jumlahds0501=$jlhtotds0501[totjlhds0501];
						$totjumlahds0501=number_format($jumlahds0501,0,",",".");
					echo "$totjumlahds0501";
 } ?>