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
	  
		  
					$totds0409 =pg_query($koneksi, "select count(kode) as totjlhds0409 from dasawisma where kodekel='0409'");
						$jlhtotds0409=pg_fetch_array($totds0409); 
						$jumlahds0409=$jlhtotds0409[totjlhds0409];
						$totjumlahds0409=number_format($jumlahds0409,0,",",".");
					echo "$totjumlahds0409";
 } ?>