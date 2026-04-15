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
	  
		  
					$totpos0307 =pg_query($koneksi, "select count(kodekel) as totjlhpos0307 from posyandu where kodekel='0307'");
						$jlhtotpos0307=pg_fetch_array($totpos0307); 
						$jumlahpos0307=$jlhtotpos0307[totjlhpos0307];
						$totjumlahpos0307=number_format($jumlahpos0307,0,",",".");
					echo "$totjumlahpos0307";
 } ?>