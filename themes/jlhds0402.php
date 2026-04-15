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
	  
		  
					$totds0402 =pg_query($koneksi, "select count(kode) as totjlhds0402 from dasawisma where kodekel='0402'");
						$jlhtotds0402=pg_fetch_array($totds0402); 
						$jumlahds0402=$jlhtotds0402[totjlhds0402];
						$totjumlahds0402=number_format($jumlahds0402,0,",",".");
					echo "$totjumlahds0402";
 } ?>