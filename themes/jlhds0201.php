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
	  
		  
					$totds0201 =pg_query($koneksi, "select count(kode) as totjlhds0201 from dasawisma where kodekel='0201'");
						$jlhtotds0201=pg_fetch_array($totds0201); 
						$jumlahds0201=$jlhtotds0201[totjlhds0201];
						$totjumlahds0201=number_format($jumlahds0201,0,",",".");
					echo "$totjumlahds0201";
 } ?>