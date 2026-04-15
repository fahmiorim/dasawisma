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
	  
		  
					$totagt0201 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0201 from keluarga where kodekel='0201'");
						$jlhtotagt0201=pg_fetch_array($totagt0201); 
						$jumlahagt0201=$jlhtotagt0201[totjlhagt0201];
						$totjumlahagt0201=number_format($jumlahagt0201,0,",",".");
					echo "$totjumlahagt0201";
 } ?>