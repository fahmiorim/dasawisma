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
	  
		  
					$totagt0103 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0103 from keluarga where kodekel='0103'");
						$jlhtotagt0103=pg_fetch_array($totagt0103); 
						$jumlahagt0103=$jlhtotagt0103[totjlhagt0103];
						$totjumlahagt0103=number_format($jumlahagt0103,0,",",".");
					echo "$totjumlahagt0103";
 } ?>