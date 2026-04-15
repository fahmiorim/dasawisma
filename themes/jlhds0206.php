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
	  
		  
					$totds0206 =pg_query($koneksi, "select count(kode) as totjlhds0206 from dasawisma where kodekel='0206'");
						$jlhtotds0206=pg_fetch_array($totds0206); 
						$jumlahds0206=$jlhtotds0206[totjlhds0206];
						$totjumlahds0206=number_format($jumlahds0206,0,",",".");
					echo "$totjumlahds0206";
 } ?>