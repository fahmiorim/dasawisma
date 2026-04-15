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
	  
		  
					$totagt0305 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0305 from keluarga where kodekel='0305'");
						$jlhtotagt0305=pg_fetch_array($totagt0305); 
						$jumlahagt0305=$jlhtotagt0305[totjlhagt0305];
						$totjumlahagt0305=number_format($jumlahagt0305,0,",",".");
					echo "$totjumlahagt0305";
 } ?>