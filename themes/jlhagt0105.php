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
	  
		  
					$totagt0105 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0105 from keluarga where kodekel='0105'");
						$jlhtotagt0105=pg_fetch_array($totagt0105); 
						$jumlahagt0105=$jlhtotagt0105[totjlhagt0105];
						$totjumlahagt0105=number_format($jumlahagt0105,0,",",".");
					echo "$totjumlahagt0105";
 } ?>