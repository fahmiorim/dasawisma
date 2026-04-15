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
	  
		  
					$totagt0409 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0409 from keluarga where kodekel='0409'");
						$jlhtotagt0409=pg_fetch_array($totagt0409); 
						$jumlahagt0409=$jlhtotagt0409[totjlhagt0409];
						$totjumlahagt0409=number_format($jumlahagt0409,0,",",".");
					echo "$totjumlahagt0409";
 } ?>