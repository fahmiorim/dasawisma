<?php
// Paging untuk semua berita
class paging_berita{
  // Fungsi untuk mencek halaman dan posisi data
  function cariPosisi($batas){
    if(empty($_GET['halberita'])){
	     $posisi=0;
	     $_GET['halberita']=1;
    }
    else{
	     $posisi = ($_GET['halberita']-1) * $batas;
    }
    return $posisi;
  }

  // Fungsi untuk menghitung total halaman
  function jumlahHalaman($jmldata, $batas){
    $jmlhalaman = ceil($jmldata/$batas);
    return $jmlhalaman;
  }

  // Fungsi untuk link halaman 1,2,3, dst 
  function navHalaman($halaman_aktif, $jmlhalaman){
    $link_halaman = "";

    // Link ke halaman pertama (first) dan sebelumnya (prev)
    if($halaman_aktif > 1){
	    $prev = $halaman_aktif-1;
	    $link_halaman .= "<li><a href=\"halberita-1.html\">&laquo;</a></li>   
                        <li><a href=\"halberita-$prev.html\">&lsaquo;</a></li>";
    }

    // Link halaman 1,2,3, ...
    $angka = ($halaman_aktif > 3 ? " ... " : " "); 
    for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
      if ($i < 1) continue;
 	    $angka .= "<li><a href=\"halberita-$i.html\">$i</a></li>";
    }
	    $angka .= "<li class=\"active\"><a href=\"#\">$halaman_aktif</li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
      if($i > $jmlhalaman) break;
	    $angka .= "<li><a href=\"halberita-$i.html\">$i</a></li>";
    }
	    $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <li><a href=\"halberita-$jmlhalaman.html\">$jmlhalaman</a></li>" : " ");

    $link_halaman .= "<li>$angka</li>";

    // Link ke halaman berikutnya (Next) dan terakhir (Last) 
    if($halaman_aktif < $jmlhalaman){
	    $next = $halaman_aktif+1;
	    $link_halaman .= " <li><a href=\"halberita-$next.html\">&rsaquo;</a></li>  
                         <li><a href=\"halberita-$jmlhalaman.html\">&raquo;</a></li>";
    }
    return $link_halaman;
  }
}


// Paging untuk kategori (berita per kategori)
class paging_kategori{
  // Fungsi untuk mencek halaman dan posisi data
  function cariPosisi($batas){
    if(empty($_GET['halkategori'])){
	     $posisi=0;
	     $_GET['halkategori']=1;
    }
    else{
	     $posisi = ($_GET['halkategori']-1) * $batas;
    }
    return $posisi;
  }

  // Fungsi untuk menghitung total halaman
  function jumlahHalaman($jmldata, $batas){
    $jmlhalaman = ceil($jmldata/$batas);
    return $jmlhalaman;
  }

  // Fungsi untuk link halaman 1,2,3, dst 
  function navHalaman($halaman_aktif, $jmlhalaman){
    $link_halaman = "";

    // Link ke halaman pertama (first) dan sebelumnya (prev)
    if($halaman_aktif > 1){
	    $prev = $halaman_aktif-1;
	    $link_halaman .= "<li><a href=\"halkategori-$_GET[id]-1.html\">&laquo;</a></li>   
                        <li><a href=\"halkategori-$_GET[id]-$prev.html\">&lsaquo;</a></li>";
    }

    // Link halaman 1,2,3, ...
    $angka = ($halaman_aktif > 3 ? " ... " : " "); 
    for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
      if ($i < 1) continue;
	    $angka .= "<li><a href=\"halkategori-$_GET[id]-$i.html\">$i</a></li>";
    }
	    $angka .= "<li class=\"active\"><a href=\"#\">$halaman_aktif</a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
      if($i > $jmlhalaman) break;
	    $angka .= "<li><a href=\"halkategori-$_GET[id]-$i.html\">$i</a></li>";
    }
	    $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <li><a href=\"halkategori-$_GET[id]-$jmlhalaman.html\">$jmlhalaman</a></li>" : " ");

    $link_halaman .= "$angka";

    // Link ke halaman berikutnya (Next) dan terakhir (Last) 
    if($halaman_aktif < $jmlhalaman){
	    $next = $halaman_aktif+1;
	    $link_halaman .= "<li><a href=\"halkategori-$_GET[id]-$next.html\">&rsaquo;</a></li>  
                         <li><a href=\"halkategori-$_GET[id]-$jmlhalaman.html\">&raquo;</a></li>";
    }
    return $link_halaman;
  }
}
?>