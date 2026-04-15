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
	  
		  
					$totagt0502 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0502 from keluarga where kodekel='0502'");
						$jlhtotagt0502=pg_fetch_array($totagt0502); 
						$jumlahagt0502=$jlhtotagt0502[totjlhagt0502];
						$totjumlahagt0502=number_format($jumlahagt0502,0,",",".");
					echo "$totjumlahagt0502";
 } ?>