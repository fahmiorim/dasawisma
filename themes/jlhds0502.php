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
	  
		  
					$totds0502 =pg_query($koneksi, "select count(kode) as totjlhds0502 from dasawisma where kodekel='0502'");
						$jlhtotds0502=pg_fetch_array($totds0502); 
						$jumlahds0502=$jlhtotds0502[totjlhds0502];
						$totjumlahds0502=number_format($jumlahds0502,0,",",".");
					echo "$totjumlahds0502";
 } ?>