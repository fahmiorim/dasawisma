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
	  
		  
					$totklg0205 =pg_query($koneksi, "select count(nokk) as totjlhklg0205 from keluarga where kodekel='0205'");
						$jlhtotklg0205=pg_fetch_array($totklg0205); 
						$jumlahklg0205=$jlhtotklg0205[totjlhklg0205];
						$totjumlahklg0205=number_format($jumlahklg0205,0,",",".");
					echo "$totjumlahklg0205";
 } ?>