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
	  
		  
					$totds0304 =pg_query($koneksi, "select count(kode) as totjlhds0304 from dasawisma where kodekel='0304'");
						$jlhtotds0304=pg_fetch_array($totds0304); 
						$jumlahds0304=$jlhtotds0304[totjlhds0304];
						$totjumlahds0304=number_format($jumlahds0304,0,",",".");
					echo "$totjumlahds0304";
 } ?>