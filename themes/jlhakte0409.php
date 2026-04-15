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
	  
		  
			$totakte0409 =pg_query($koneksi, "select count(akte) as totjlhakte0409 from kehamilan where kodekel='0409'");
						$jlhtotakte0409=pg_fetch_array($totakte0409); 
						$jumlahakte0409=$jlhtotakte0409[totjlhakte0409];
						$totjumlahakte0409=number_format($jumlahakte0409,0,",",".");
					echo "$totjumlahakte0409";
 } ?>