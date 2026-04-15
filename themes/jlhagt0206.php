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
	  
		  
					$totagt0206 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0206 from keluarga where kodekel='0206'");
						$jlhtotagt0206=pg_fetch_array($totagt0206); 
						$jumlahagt0206=$jlhtotagt0206[totjlhagt0206];
						$totjumlahagt0206=number_format($jumlahagt0206,0,",",".");
					echo "$totjumlahagt0206";
 } ?>