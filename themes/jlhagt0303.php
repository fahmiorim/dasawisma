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
	  
		  
					$totagt0303 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0303 from keluarga where kodekel='0303'");
						$jlhtotagt0303=pg_fetch_array($totagt0303); 
						$jumlahagt0303=$jlhtotagt0303[totjlhagt0303];
						$totjumlahagt0303=number_format($jumlahagt0303,0,",",".");
					echo "$totjumlahagt0303";
 } ?>