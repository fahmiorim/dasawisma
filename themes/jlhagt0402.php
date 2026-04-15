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
	  
		  
					$totagt0402 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0402 from keluarga where kodekel='0402'");
						$jlhtotagt0402=pg_fetch_array($totagt0402); 
						$jumlahagt0402=$jlhtotagt0402[totjlhagt0402];
						$totjumlahagt0402=number_format($jumlahagt0402,0,",",".");
					echo "$totjumlahagt0402";
 } ?>