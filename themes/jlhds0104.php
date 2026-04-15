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
	  
		  
					$totds0104 =pg_query($koneksi, "select count(kode) as totjlhds0104 from dasawisma where kodekel='0104'");
						$jlhtotds0104=pg_fetch_array($totds0104); 
						$jumlahds0104=$jlhtotds0104[totjlhds0104];
						$totjumlahds0104=number_format($jumlahds0104,0,",",".");
					echo "$totjumlahds0104";
 } ?>