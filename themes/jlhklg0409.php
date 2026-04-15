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
	  
		  
					$totklg0409 =pg_query($koneksi, "select count(nokk) as totjlhklg0409 from keluarga where kodekel='0409'");
						$jlhtotklg0409=pg_fetch_array($totklg0409); 
						$jumlahklg0409=$jlhtotklg0409[totjlhklg0409];
						$totjumlahklg0409=number_format($jumlahklg0409,0,",",".");
					echo "$totjumlahklg0409";
 } ?>