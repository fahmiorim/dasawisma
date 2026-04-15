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
	  
		  
					$totklg0307 =pg_query($koneksi, "select count(nokk) as totjlhklg0307 from keluarga where kodekel='0307'");
						$jlhtotklg0307=pg_fetch_array($totklg0307); 
						$jumlahklg0307=$jlhtotklg0307[totjlhklg0307];
						$totjumlahklg0307=number_format($jumlahklg0307,0,",",".");
					echo "$totjumlahklg0307";
 } ?>