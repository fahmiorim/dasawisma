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
	  
		  
					$totbuta30106 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30106 from keluarga where tahun='$_SESSION[thnaktif]' and kodekel='0106'");
						$jlhtotbuta30106=pg_fetch_array($totbuta30106); 
						$jumlahbuta30106=$jlhtotbuta30106[totjlhbuta30106];
						$totjumlahbuta30106=number_format($jumlahbuta30106,0,",",".");
					echo "$totjumlahbuta30106";
 } ?>