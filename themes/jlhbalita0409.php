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
	  
		  
					$totbalita0409 =pg_query($koneksi, "select sum(balita) as totjlhbalita0409 from keluarga where kodekel='0409'");
						$jlhtotbalita0409=pg_fetch_array($totbalita0409); 
						$jumlahbalita0409=$jlhtotbalita0409[totjlhbalita0409];
						$totjumlahbalita0409=number_format($jumlahbalita0409,0,",",".");
					echo "$totjumlahbalita0409";
 } ?>