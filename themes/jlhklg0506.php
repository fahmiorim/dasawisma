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
	  
		  
					$totklg0506 =pg_query($koneksi, "select count(nokk) as totjlhklg0506 from keluarga where kodekel='0506'");
						$jlhtotklg0506=pg_fetch_array($totklg0506); 
						$jumlahklg0506=$jlhtotklg0506[totjlhklg0506];
						$totjumlahklg0506=number_format($jumlahklg0506,0,",",".");
					echo "$totjumlahklg0506";
 } ?>