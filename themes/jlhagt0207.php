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
	  
		  
					$totagt0207 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0207 from keluarga where tahun='$_SESSION[thnaktif]' and kodekel='0207'");
						$jlhtotagt0207=pg_fetch_array($totagt0207); 
						$jumlahagt0207=$jlhtotagt0207[totjlhagt0207];
						$totjumlahagt0207=number_format($jumlahagt0207,0,",",".");
					echo "$totjumlahagt0207";
 } ?>