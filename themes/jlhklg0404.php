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
	  
		  
					$totklg0404 =pg_query($koneksi, "select count(nokk) as totjlhklg0404 from keluarga where kodekel='0404'");
						$jlhtotklg0404=pg_fetch_array($totklg0404); 
						$jumlahklg0404=$jlhtotklg0404[totjlhklg0404];
						$totjumlahklg0404=number_format($jumlahklg0404,0,",",".");
					echo "$totjumlahklg0404";
 } ?>