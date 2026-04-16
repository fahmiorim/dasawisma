<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:404.php');
} else {

  // Home (Beranda)
  if ($_GET['module'] == 'beranda') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/beranda/beranda.php";
    }
  } elseif ($_GET['module'] == 'grapinput') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/grafik/input.php";
    }
  } elseif ($_GET['module'] == 'grapkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/grafik/inputdatakec.php";
    }
  } elseif ($_GET['module'] == 'graprumah') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/grafik/kriteriarumah.php";
      }
  }
      // Penambahan grafik desa
      elseif ($_GET['module'] == 'grapdesa') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/grafik/inputdatadesa.php";
    }
  }
  elseif ($_GET['module'] == 'grapdesa2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/grafik/inputdatadesa2.php";
    }
  }
  elseif ($_GET['module'] == 'graphbantuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/grafik/databantuan.php";
    }
  }
  elseif ($_GET['module'] == 'graphbantuan1') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/grafik/databantuandesa.php";
    }
  }
  elseif ($_GET['module'] == 'graphbantuan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/grafik/databantuandesa2.php";
    }
  }

//=======================================

  elseif ($_GET['module'] == 'akseptorkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/akseptorkb/akseptorkb.php";
    }
  } elseif ($_GET['module'] == 'hapuskb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/akseptorkb/hapusakseptorkb.php";
    }
  } elseif ($_GET['module'] == 'editkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/akseptorkb/editakseptorkb.php";
    }
  } elseif ($_GET['module'] == 'lihatkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/akseptorkb/lihatakseptorkb.php";
    }
  } elseif ($_GET['module'] == 'catkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/catkeluarga/catkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lapkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/catkeluarga/lapkeluarga.php";
    }
  }

  // Pembaharuan
  elseif ($_GET['module'] == 'catkeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/catkeluarga2/catkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lapkeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/catkeluarga2/lapkeluarga.php";
    }
  } elseif ($_GET['module'] == 'catkeluargakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/catkeluargakec/catkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lapkeluargakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/catkeluargakec/lapkeluarga.php";
    }
  } elseif ($_GET['module'] == 'catkeluargads') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/catkeluargads/catkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lapkeluargads') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/catkeluargads/lapkeluargads.php";
    }
  } elseif ($_GET['module'] == 'rptwarungkel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/rptwarungkel/rptwarungkel.php";
    }
  } elseif ($_GET['module'] == 'lapwarungkel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/rptwarungkel/lapwarungkel.php";
    }
  }
  //Pembaharuan
  elseif ($_GET['module'] == 'rptrekapsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/rptrekapsipkunjungan/rptrekapsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'rptwarungkota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptwarungkota/rptwarungkota.php";
    }
  } elseif ($_GET['module'] == 'lapwarungkota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptwarungkota/lapwarungkota.php";
    }
  } elseif ($_GET['module'] == 'rptwarungkec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptwarungkec/rptwarungkec.php";
    }
  } elseif ($_GET['module'] == 'lapwarungkec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptwarungkec/lapwarungkec.php";
    }
  } elseif ($_GET['module'] == 'rptkoperasikec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptkoperasikec/rptkoperasikec.php";
    }
  } elseif ($_GET['module'] == 'lapkoperasikec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptkoperasikec/lapkoperasikec.php";
    }
  } elseif ($_GET['module'] == 'rptkoperasikota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptkoperasikota/rptkoperasikota.php";
    }
  } elseif ($_GET['module'] == 'lapkoperasikota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptkoperasikota/lapkoperasikota.php";
    }
  }
  //

  elseif ($_GET['module'] == 'rptkoperasikel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptkoperasikel/rptkoperasikel.php";
    }
  } elseif ($_GET['module'] == 'lapkoperasikel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptkoperasikel/lapkoperasikel.php";
    }
  } elseif ($_GET['module'] == 'rpttamanbacakel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/rpttamanbacakel/rpttamanbacakel.php";
    }
  } elseif ($_GET['module'] == 'laptamanbacakel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/rpttamanbacakel/laptamanbacakel.php";
    }
  }
  //Pembaharuan

  elseif ($_GET['module'] == 'rpttamanbacakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rpttamanbacakec/rpttamanbacakec.php";
    }
  } elseif ($_GET['module'] == 'laptamanbacakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rpttamanbacakec/laptamanbacakec.php";
    }
  } elseif ($_GET['module'] == 'rpttamanbacakota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rpttamanbacakota/rpttamanbacakota.php";
    }
  } elseif ($_GET['module'] == 'laptamanbacakota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rpttamanbacakota/laptamanbacakota.php";
    }
  } elseif ($_GET['module'] == 'jlhposyandu0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhposyandu0307list/jlhposyandu0307list.php";
    }
  } elseif ($_GET['module'] == 'lihat_jlhposyandu0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhposyandu0307list/lihat_jlhposyandu0307list.php";
    }
  } elseif ($_GET['module'] == 'rptsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptsipkunjungan/rptsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'sipkunjunganthn') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptsipkunjungan/rptsipkunjunganthn.php";
    }
  } elseif ($_GET['module'] == 'rptsipkunjungankec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptsipkunjungankec/rptsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'sipkunjunganthnkec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptsipkunjungankec/rptsipkunjunganthn.php";
    }
  } elseif ($_GET['module'] == 'rptsipkunjungankota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptsipkunjungankota/rptsipkunjungankota.php";
    }
  } elseif ($_GET['module'] == 'sipkunjungankotathn') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptsipkunjungankota/rptsipkunjungankotathn.php";
    }
  }
  //Pembaharuan

  elseif ($_GET['module'] == 'rptdasawismakota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptdasawismakota/rptdasawismakota.php";
    }
  } elseif ($_GET['module'] == 'lapdasawismakota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptdasawismakota/lapdasawismakota.php";
    }
  }

  //

  elseif ($_GET['module'] == 'hakakses') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/hakakses/hakakses.php";
    }
  } elseif ($_GET['module'] == 'hapusakses') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/hakakses/hapushakakses.php";
    }
  } elseif ($_GET['module'] == 'editakses') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/hakakses/edithakakses.php";
    }
  } elseif ($_GET['module'] == 'tahunaktif') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/tahunaktif/tahunaktif.php";
    }
  } elseif ($_GET['module'] == 'hapustahunaktif') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/tahunaktif/hapustahunaktif.php";
    }
  } elseif ($_GET['module'] == 'edittahunaktif') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/tahunaktif/edittahunaktif.php";
    }
  } elseif ($_GET['module'] == 'resetpassword') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/resetpassword/resetpassword.php";
    }
  } elseif ($_GET['module'] == 'editpassword') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/resetpassword/editpassword.php";
    }
  } elseif ($_GET['module'] == 'userkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/userkec/userkec.php";
    }
  } elseif ($_GET['module'] == 'edituserkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/userkec/edituserkec.php";
    }
  } elseif ($_GET['module'] == 'hapususerkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/userkec/hapususerkec.php";
    }
  } elseif ($_GET['module'] == 'useradmin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/useradmin/useradmin.php";
    }
  } elseif ($_GET['module'] == 'edituseradmin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/useradmin/edituseradmin.php";
    }
  } elseif ($_GET['module'] == 'hapususeradmin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/useradmin/hapususeradmin.php";
    }
  } elseif ($_GET['module'] == 'user') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/user/user.php";
    }
  } elseif ($_GET['module'] == 'edituser') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/user/edituser.php";
    }
  } elseif ($_GET['module'] == 'hapususer') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/user/hapususer.php";
    }
  } elseif ($_GET['module'] == 'kecamatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kecamatan/kec.php";
    }
  } elseif ($_GET['module'] == 'editkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kecamatan/editkec.php";
    }
  } elseif ($_GET['module'] == 'hapuskec') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/kecamatan/hapuskec.php";
    }
  } elseif ($_GET['module'] == 'kelurahan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kelurahan/kel.php";
    }
  } elseif ($_GET['module'] == 'editkel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kelurahan/editkel.php";
    }
  } elseif ($_GET['module'] == 'hapuskel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kelurahan/hapuskel.php";
    }
  } elseif ($_GET['module'] == 'lingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/lingkungan/lingkungan.php";
    }
  } elseif ($_GET['module'] == 'editlingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/lingkungan/editlingkungan.php";
    }
  } elseif ($_GET['module'] == 'hapuslingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/lingkungan/hapuslingkungan.php";
    }
  } elseif ($_GET['module'] == 'lihatlingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/lingkungan/lihatlingkungan.php";
    }
  } elseif ($_GET['module'] == 'dasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/dasawisma.php";
    }
  } elseif ($_GET['module'] == 'editdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/editdasawisma.php";
    }
  } elseif ($_GET['module'] == 'hapusdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/hapusdasawisma.php";
    }
  } elseif ($_GET['module'] == 'lihatdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/lihatdasawisma.php";
    }
  } elseif ($_GET['module'] == 'dasawisma2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/dasawisma.php";
    }
  } elseif ($_GET['module'] == 'editdasawisma2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/editdasawisma.php";
    }
  } elseif ($_GET['module'] == 'hapusdasawisma2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/hapusdasawisma.php";
    }
  } elseif ($_GET['module'] == 'lihatdasawisma2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/dasawisma/lihatdasawisma.php";
    }
  } elseif ($_GET['module'] == 'datarw') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datarw/datarw.php";
    }
  } elseif ($_GET['module'] == 'editdatarw') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datarw/editdatarw.php";
    }
  } elseif ($_GET['module'] == 'hapusdatarw') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datarw/hapusdatarw.php";
    }
  } elseif ($_GET['module'] == 'lihatdatarw') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datarw/lihatdatarw.php";
    }
  } elseif ($_GET['module'] == 'datart') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datart/datart.php";
    }
  } elseif ($_GET['module'] == 'editdatart') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datart/editdatart.php";
    }
  } elseif ($_GET['module'] == 'hapusdatart') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datart/hapusdatart.php";
    }
  } elseif ($_GET['module'] == 'lihatdatart') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datart/lihatdatart.php";
    }
  } elseif ($_GET['module'] == 'kriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kriteria/kriteria.php";
    }
  } elseif ($_GET['module'] == 'editkriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kriteria/editkriteria.php";
    }
  } elseif ($_GET['module'] == 'hapuskriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kriteria/hapuskriteria.php";
    }
  } elseif ($_GET['module'] == 'lihatkriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kriteria/lihatkriteria.php";
    }
  } elseif ($_GET['module'] == 'datawarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datawarga/datawarga.php";
    }
  } elseif ($_GET['module'] == 'editdatawarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datawarga/edit_datawarga.php";
    }
  } elseif ($_GET['module'] == 'editdatawarga2') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datawarga/edit_datawarga2.php";
    }
  } elseif ($_GET['module'] == 'hapusdatawarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datawarga/hapus_datawarga.php";
    }
  } elseif ($_GET['module'] == 'lihatdatawarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datawarga/lihat_datawarga.php";
    }
  } elseif ($_GET['module'] == 'datawarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datawarga2/datawarga2.php";
    }
  } elseif ($_GET['module'] == 'editdatawarga23') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datawarga2/edit_datawarga23.php";
    }
  } elseif ($_GET['module'] == 'editdatawarga22') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datawarga2/edit_datawarga22.php";
    }
  } elseif ($_GET['module'] == 'hapusdatawarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datawarga2/hapus_datawarga2.php";
    }
  } elseif ($_GET['module'] == 'lihatdatawarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datawarga2/lihat_datawarga2.php";
    }
  } elseif ($_GET['module'] == 'keluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/keluarga/keluarga.php";
    }
  } elseif ($_GET['module'] == 'editkeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/keluarga/editkeluarga.php";
    }
  } elseif ($_GET['module'] == 'hapuskeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/keluarga/hapuskeluarga.php";
    }
  } elseif ($_GET['module'] == 'lihatkeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/keluarga/lihatkeluarga.php";
    }
  } elseif ($_GET['module'] == 'keluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/keluarga2/keluarga2.php";
    }
  } elseif ($_GET['module'] == 'editkeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/keluarga2/editkeluarga2.php";
    }
  } elseif ($_GET['module'] == 'hapuskeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/keluarga2/hapuskeluarga2.php";
    }
  } elseif ($_GET['module'] == 'lihatkeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/keluarga2/lihatkeluarga2.php";
    }
  } elseif ($_GET['module'] == 'pekarangan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pekarangan/pekarangan.php";
    }
  } elseif ($_GET['module'] == 'editpekarangan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pekarangan/editpekarangan.php";
    }
  } elseif ($_GET['module'] == 'hapuspekarangan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pekarangan/hapuspekarangan.php";
    }
  } elseif ($_GET['module'] == 'lihatpekarangan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pekarangan/lihatpekarangan.php";
    }
  } elseif ($_GET['module'] == 'pekarangan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekarangan2/pekarangan2.php";
    }
  } elseif ($_GET['module'] == 'editpekarangan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekarangan2/editpekarangan2.php";
    }
  } elseif ($_GET['module'] == 'hapuspekarangan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekarangan2/hapuspekarangan2.php";
    }
  } elseif ($_GET['module'] == 'lihatpekarangan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekarangan2/lihatpekarangan2.php";
    }
  } elseif ($_GET['module'] == 'industri') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/industri/industri.php";
    }
  } elseif ($_GET['module'] == 'editindustri') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/industri/editindustri.php";
    }
  } elseif ($_GET['module'] == 'hapusindustri') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/industri/hapusindustri.php";
    }
  } elseif ($_GET['module'] == 'lihatindustri') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/industri/lihatindustri.php";
    }
  } elseif ($_GET['module'] == 'industri2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/industri2/industri2.php";
    }
  } elseif ($_GET['module'] == 'editindustri2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/industri2/editindustri2.php";
    }
  } elseif ($_GET['module'] == 'hapusindustri2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/industri2/hapusindustri2.php";
    }
  } elseif ($_GET['module'] == 'lihatindustri2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/industri2/lihatindustri2.php";
    }
  } elseif ($_GET['module'] == 'bumil') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumil/bumil.php";
    }
  } elseif ($_GET['module'] == 'editbumil') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumil/editbumil.php";
    }
  } elseif ($_GET['module'] == 'hapusbumil') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumil/hapusbumil.php";
    }
  } elseif ($_GET['module'] == 'lihatbumil') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumil/lihatbumil.php";
    }
  }
  //=============== 6-5-2021 =============
  elseif ($_GET['module'] == 'ibubayi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/ibubayi/ibubayi.php";
    }
  } elseif ($_GET['module'] == 'editibubayi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/ibubayi/editibubayi.php";
    }
  } elseif ($_GET['module'] == 'hapusibubayi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/ibubayi/hapusibubayi.php";
    }
  } elseif ($_GET['module'] == 'lihatibubayi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/ibubayi/lihatibubayi.php";
    }
  }
  //==================== 02-08-2021 ===========
 //Bantuan

elseif ($_GET['module'] == 'bantuan') {
  if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
    include "modul/bantuan/bantuan.php";
  }
}
elseif ($_GET['module'] == 'editbantuan') {
  if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
    include "modul/bantuan/editbantuan.php";
  }
} elseif ($_GET['module'] == 'lihatbantuan') {
  if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
    include "modul/bantuan/lihatbantuan.php";
  }
}
  elseif ($_GET['module'] == 'hapusbantuan') {
    if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
      include "modul/bantuan/hapusbantuan.php";
    }
  }

  //==========================================
  elseif ($_GET['module'] == 'bumil2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumil2/bumil2.php";
    }
  } elseif ($_GET['module'] == 'editbumil2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumil2/editbumil2.php";
    }
  } elseif ($_GET['module'] == 'hapusbumil2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumil2/hapusbumil2.php";
    }
  } elseif ($_GET['module'] == 'lihatbumil2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumil2/lihatbumil2.php";
    }
  } elseif ($_GET['module'] == 'melahirkan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/melahirkan/melahirkan.php";
    }
  } elseif ($_GET['module'] == 'editmelahirkan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/melahirkan/editmelahirkan.php";
    }
  } elseif ($_GET['module'] == 'hapusmelahirkan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/melahirkan/hapusmelahirkan.php";
    }
  } elseif ($_GET['module'] == 'lihatmelahirkan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/melahirkan/lihatmelahirkan.php";
    }
  } elseif ($_GET['module'] == 'melahirkan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/melahirkan2/melahirkan2.php";
    }
  } elseif ($_GET['module'] == 'editmelahirkan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/melahirkan2/editmelahirkan2.php";
    }
  } elseif ($_GET['module'] == 'hapusmelahirkan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/melahirkan2/hapusmelahirkan2.php";
    }
  } elseif ($_GET['module'] == 'lihatmelahirkan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/melahirkan2/lihatmelahirkan2.php";
    }
  } elseif ($_GET['module'] == 'bumilmeninggal') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumilmeninggal/bumilmeninggal.php";
    }
  } elseif ($_GET['module'] == 'editbumilmeninggal') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumilmeninggal/editbumilmeninggal.php";
    }
  } elseif ($_GET['module'] == 'hapusbumilmeninggal') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumilmeninggal/hapusbumilmeninggal.php";
    }
  } elseif ($_GET['module'] == 'lihatbumilmeninggal') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bumilmeninggal/lihatbumilmeninggal.php";
    }
  } elseif ($_GET['module'] == 'bumilmeninggal2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumilmeninggal2/bumilmeninggal2.php";
    }
  } elseif ($_GET['module'] == 'editbumilmeninggal2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumilmeninggal2/editbumilmeninggal2.php";
    }
  } elseif ($_GET['module'] == 'hapusbumilmeninggal2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumilmeninggal2/hapusbumilmeninggal2.php";
    }
  } elseif ($_GET['module'] == 'lihatbumilmeninggal2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/bumilmeninggal2/lihatbumilmeninggal2.php";
    }
  } elseif ($_GET['module'] == 'warung') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/warung/warung.php";
    }
  } elseif ($_GET['module'] == 'editwarung') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/warung/editwarung.php";
    }
  } elseif ($_GET['module'] == 'hapuswarung') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/warung/hapuswarung.php";
    }
  } elseif ($_GET['module'] == 'lihatwarung') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/warung/lihatwarung.php";
    }
  } elseif ($_GET['module'] == 'warung2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/warung2/warung2.php";
    }
  } elseif ($_GET['module'] == 'editwarung2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/warung2/editwarung2.php";
    }
  } elseif ($_GET['module'] == 'hapuswarung2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/warung2/hapuswarung2.php";
    }
  } elseif ($_GET['module'] == 'lihatwarung2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/warung2/lihatwarung2.php";
    }
  } elseif ($_GET['module'] == 'koperasi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/koperasi/koperasi.php";
    }
  } elseif ($_GET['module'] == 'editkoperasi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/koperasi/editkoperasi.php";
    }
  } elseif ($_GET['module'] == 'hapuskoperasi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/koperasi/hapuskoperasi.php";
    }
  } elseif ($_GET['module'] == 'lihatkoperasi') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/koperasi/lihatkoperasi.php";
    }
  } elseif ($_GET['module'] == 'koperasi2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/koperasi2/koperasi2.php";
    }
  } elseif ($_GET['module'] == 'editkoperasi2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/koperasi2/editkoperasi2.php";
    }
  } elseif ($_GET['module'] == 'hapuskoperasi2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/koperasi2/hapuskoperasi2.php";
    }
  } elseif ($_GET['module'] == 'lihatkoperasi2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/koperasi2/lihatkoperasi2.php";
    }
  } elseif ($_GET['module'] == 'tamanbaca') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/tamanbaca/tamanbaca.php";
    }
  } elseif ($_GET['module'] == 'edittamanbaca') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/tamanbaca/edittamanbaca.php";
    }
  } elseif ($_GET['module'] == 'hapustamanbaca') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/tamanbaca/hapustamanbaca.php";
    }
  } elseif ($_GET['module'] == 'lihattamanbaca') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/tamanbaca/lihattamanbaca.php";
    }
  }
  //==============Pembaharuan 5-5-2021 ===========
  elseif ($_GET['module'] == 'bangunan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bangunan/bangunan.php";
    }
  } elseif ($_GET['module'] == 'editbangunan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bangunan/editbangunan.php";
    }
  } elseif ($_GET['module'] == 'hapusbangunan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bangunan/hapusbangunan.php";
    }
  } elseif ($_GET['module'] == 'lihatbangunan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/bangunan/lihatbangunan.php";
    }
  }
  //==============Pembaharuan 6-5-2021 ===========
  elseif ($_GET['module'] == 'mobiler') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mobiler/mobiler.php";
    }
  } elseif ($_GET['module'] == 'editmobiler') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mobiler/editmobiler.php";
    }
  } elseif ($_GET['module'] == 'hapusmobiler') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mobiler/hapusmobiler.php";
    }
  } elseif ($_GET['module'] == 'lihatmobiler') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mobiler/lihatmobiler.php";
    }
    //===========================================
  } elseif ($_GET['module'] == 'mesin') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mesin/mesin.php";
    }
  } elseif ($_GET['module'] == 'editmesin') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mesin/editmesin.php";
    }
  } elseif ($_GET['module'] == 'hapusmesin') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mesin/hapusmesin.php";
    }
  } elseif ($_GET['module'] == 'lihatmesin') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/mesin/lihatmesin.php";
    }
    //=============================================
  } elseif ($_GET['module'] == 'tamanbaca2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/tamanbaca2/tamanbaca2.php";
    }
  } elseif ($_GET['module'] == 'edittamanbaca2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/tamanbaca2/edittamanbaca2.php";
    }
  } elseif ($_GET['module'] == 'hapustamanbaca2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/tamanbaca2/hapustamanbaca2.php";
    }
  } elseif ($_GET['module'] == 'lihattamanbaca2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/tamanbaca2/lihattamanbaca2.php";
    }
  } elseif ($_GET['module'] == 'kejarpaket') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kejarpaket/kejarpaket.php";
    }
  } elseif ($_GET['module'] == 'editkejarpaket') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kejarpaket/editkejarpaket.php";
    }
  } elseif ($_GET['module'] == 'hapuskejarpaket') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kejarpaket/hapuskejarpaket.php";
    }
  } elseif ($_GET['module'] == 'lihatkejarpaket') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kejarpaket/lihatkejarpaket.php";
    }
  } elseif ($_GET['module'] == 'kejarpaket2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kejarpaket2/kejarpaket2.php";
    }
  } elseif ($_GET['module'] == 'editkejarpaket2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kejarpaket2/editkejarpaket2.php";
    }
  } elseif ($_GET['module'] == 'hapuskejarpaket2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kejarpaket2/hapuskejarpaket2.php";
    }
  } elseif ($_GET['module'] == 'lihatkejarpaket2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kejarpaket2/lihatkejarpaket2.php";
    }
  } elseif ($_GET['module'] == 'saranamck') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/saranamck/saranamck.php";
    }
  } elseif ($_GET['module'] == 'editsaranamck') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/saranamck/editsaranamck.php";
    }
  } elseif ($_GET['module'] == 'hapussaranamck') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/saranamck/hapussaranamck.php";
    }
  } elseif ($_GET['module'] == 'lihatsaranamck') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/saranamck/lihatsaranamck.php";
    }
  } elseif ($_GET['module'] == 'saranamck2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/saranamck2/saranamck2.php";
    }
  } elseif ($_GET['module'] == 'editsaranamck2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/saranamck2/editsaranamck2.php";
    }
  } elseif ($_GET['module'] == 'hapussaranamck2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/saranamck2/hapussaranamck2.php";
    }
  } elseif ($_GET['module'] == 'lihatsaranamck2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/saranamck2/lihatsaranamck2.php";
    }
  } elseif ($_GET['module'] == 'penyuluhan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/penyuluhan/penyuluhan.php";
    }
  } elseif ($_GET['module'] == 'editpenyuluhan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/penyuluhan/editpenyuluhan.php";
    }
  } elseif ($_GET['module'] == 'hapuspenyuluhan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/penyuluhan/hapuspenyuluhan.php";
    }
  } elseif ($_GET['module'] == 'lihatpenyuluhan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/penyuluhan/lihatpenyuluhan.php";
    }
  } elseif ($_GET['module'] == 'penyuluhan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/penyuluhan2/penyuluhan2.php";
    }
  } elseif ($_GET['module'] == 'editpenyuluhan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/penyuluhan2/editpenyuluhan2.php";
    }
  } elseif ($_GET['module'] == 'hapuspenyuluhan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/penyuluhan2/hapuspenyuluhan2.php";
    }
  } elseif ($_GET['module'] == 'lihatpenyuluhan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/penyuluhan2/lihatpenyuluhan2.php";
    }
  } elseif ($_GET['module'] == 'binakeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/binakeluarga/binakeluarga.php";
    }
  } elseif ($_GET['module'] == 'editbinakeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/binakeluarga/editbinakeluarga.php";
    }
  } elseif ($_GET['module'] == 'hapusbinakeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/binakeluarga/hapusbinakeluarga.php";
    }
  } elseif ($_GET['module'] == 'lihatbinakeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/binakeluarga/lihatbinakeluarga.php";
    }
  } elseif ($_GET['module'] == 'binakeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/binakeluarga2/binakeluarga2.php";
    }
  } elseif ($_GET['module'] == 'editbinakeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/binakeluarga2/editbinakeluarga2.php";
    }
  } elseif ($_GET['module'] == 'hapusbinakeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/binakeluarga2/hapusbinakeluarga2.php";
    }
  } elseif ($_GET['module'] == 'lihatbinakeluarga2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/binakeluarga2/lihatbinakeluarga2.php";
    }
  } elseif ($_GET['module'] == 'gotongroyong') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/gotongroyong/gotongroyong.php";
    }
  } elseif ($_GET['module'] == 'editgotongroyong') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/gotongroyong/editgotongroyong.php";
    }
  } elseif ($_GET['module'] == 'hapusgotongroyong') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/gotongroyong/hapusgotongroyong.php";
    }
  } elseif ($_GET['module'] == 'lihatgotongroyong') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/gotongroyong/lihatgotongroyong.php";
    }
  } elseif ($_GET['module'] == 'gotongroyong2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/gotongroyong2/gotongroyong2.php";
    }
  } elseif ($_GET['module'] == 'editgotongroyong2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/gotongroyong2/editgotongroyong2.php";
    }
  } elseif ($_GET['module'] == 'hapusgotongroyong2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/gotongroyong2/hapusgotongroyong2.php";
    }
  } elseif ($_GET['module'] == 'lihatgotongroyong2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/gotongroyong2/lihatgotongroyong2.php";
    }
  } elseif ($_GET['module'] == 'posyandu') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/posyandu/posyandu.php";
    }
  } elseif ($_GET['module'] == 'editposyandu') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/posyandu/editposyandu.php";
    }
  } elseif ($_GET['module'] == 'hapusposyandu') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/posyandu/hapusposyandu.php";
    }
  } elseif ($_GET['module'] == 'lihatposyandu') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/posyandu/lihatposyandu.php";
    }
  } elseif ($_GET['module'] == 'posyandu2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/posyandu2/posyandu2.php";
    }
  } elseif ($_GET['module'] == 'editposyandu2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/posyandu2/editposyandu2.php";
    }
  } elseif ($_GET['module'] == 'hapusposyandu2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/posyandu2/hapusposyandu2.php";
    }
  } elseif ($_GET['module'] == 'lihatposyandu2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/posyandu2/lihatposyandu2.php";
    }
  } elseif ($_GET['module'] == 'rptposyandukota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/rptposyandukota/rptposyandukota.php";
    }
  } elseif ($_GET['module'] == 'laprptposyandukota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/rptposyandukota/laprptposyandukota.php";
    }
  } elseif ($_GET['module'] == 'rptposyandukel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptposyandukel/rptposyandukel.php";
    }
  } elseif ($_GET['module'] == 'lapposyandukel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptposyandukel/lapposyandukel.php";
    }
  } elseif ($_GET['module'] == 'rptposyandukec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptposyandukec/rptposyandukec.php";
    }
  } elseif ($_GET['module'] == 'lapposyandukec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptposyandukec/lapposyandukec.php";
    }
  } elseif ($_GET['module'] == 'pelatihan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pelatihan/pelatihan.php";
    }
  } elseif ($_GET['module'] == 'editpelatihan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pelatihan/editpelatihan.php";
    }
  } elseif ($_GET['module'] == 'hapuspelatihan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pelatihan/hapuspelatihan.php";
    }
  } elseif ($_GET['module'] == 'lihatpelatihan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/pelatihan/lihatpelatihan.php";
    }
  } elseif ($_GET['module'] == 'pelatihan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pelatihan2/pelatihan2.php";
    }
  } elseif ($_GET['module'] == 'editpelatihan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pelatihan2/editpelatihan2.php";
    }
  } elseif ($_GET['module'] == 'hapuspelatihan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pelatihan2/hapuspelatihan2.php";
    }
  } elseif ($_GET['module'] == 'lihatpelatihan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pelatihan2/lihatpelatihan2.php";
    }
  } elseif ($_GET['module'] == 'satuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/satuan/satuan.php";
    }
  } elseif ($_GET['module'] == 'editsatuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/satuan/editsatuan.php";
    }
  } elseif ($_GET['module'] == 'hapussatuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/satuan/hapussatuan.php";
    }
  } elseif ($_GET['module'] == 'lihatsatuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/satuan/lihatsatuan.php";
    }
  } elseif ($_GET['module'] == 'kategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kategori/kategori.php";
    }
  } elseif ($_GET['module'] == 'editkategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kategori/editkategori.php";
    }
  } elseif ($_GET['module'] == 'hapuskategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kategori/hapuskategori.php";
    }
  } elseif ($_GET['module'] == 'lihatkategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/kategori/lihatkategori.php";
    }
  } elseif ($_GET['module'] == 'pekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekerjaan/pekerjaan.php";
    }
  } elseif ($_GET['module'] == 'editpekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekerjaan/editpekerjaan.php";
    }
  } elseif ($_GET['module'] == 'hapuspekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekerjaan/hapuspekerjaan.php";
    }
  } elseif ($_GET['module'] == 'lihatpekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/pekerjaan/lihatpekerjaan.php";
    }
  } elseif ($_GET['module'] == 'mstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstkeluarga/mstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'editmstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstkeluarga/editmstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'hapusmstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstkeluarga/hapusmstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lihatmstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstkeluarga/lihatmstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'mstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstjabatan/mstjabatan.php";
    }
  } elseif ($_GET['module'] == 'editmstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstjabatan/editmstjabatan.php";
    }
  } elseif ($_GET['module'] == 'hapusmstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstjabatan/hapusmstjabatan.php";
    }
  } elseif ($_GET['module'] == 'lihatmstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstjabatan/lihatmstjabatan.php";
    }
  } elseif ($_GET['module'] == 'mstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstanggota/mstanggota.php";
    }
  } elseif ($_GET['module'] == 'editmstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstanggota/editmstanggota.php";
    }
  } elseif ($_GET['module'] == 'hapusmstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstanggota/hapusmstanggota.php";
    }
  } elseif ($_GET['module'] == 'lihatmstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "modul/mstanggota/lihatmstanggota.php";
    }
  } elseif ($_GET['module'] == 'rptdasawismakel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptdasawismakel/rptdasawismakel.php";
    }
  } elseif ($_GET['module'] == 'lapdasawismakel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptdasawismakel/lapdasawismakel.php";
    }
  }

  //Pembaharuan
  elseif ($_GET['module'] == 'rptdasawismakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptdasawismakec/rptdasawismakec.php";
    }
  } elseif ($_GET['module'] == 'lapdasawismakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptdasawismakec/lapdasawismakec.php";
    }
  } elseif ($_GET['module'] == 'rptdatawargakel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptdatawargakel/rptdatawargakel.php";
    }
  } elseif ($_GET['module'] == 'lapdatawargakel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptdatawargakel/lapdatawargakel.php";
    }
  } elseif ($_GET['module'] == 'rptdatawargakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptdatawargakec/rptdatawargakec.php";
    }
  } elseif ($_GET['module'] == 'lapdatawargakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptdatawargakec/lapdatawargakec.php";
    }
  }

  //Pembaharuan
  elseif ($_GET['module'] == 'rptdatawargakota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptdatawargakota/rptdatawargakota.php";
    }
  } elseif ($_GET['module'] == 'lapdatawargakota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptdatawargakota/lapdatawargakota.php";
    }
  } elseif ($_GET['module'] == 'rptposyandu') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptposyandu/rptposyandu.php";
    }
  } elseif ($_GET['module'] == 'lapposyandu') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptposyandu/lapposyandu.php";
    }
  } elseif ($_GET['module'] == 'rptpelatihankel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptpelatihankel/rptpelatihankel.php";
    }
  } elseif ($_GET['module'] == 'lappelatihankel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptpelatihankel/lappelatihankel.php";
    }
  }
  //Pembaharuan
  elseif ($_GET['module'] == 'rptpelatihankota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptpelatihankota/rptpelatihankota.php";
    }
  } elseif ($_GET['module'] == 'lappelatihankota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/rptpelatihankota/lappelatihankota.php";
    }
  } elseif ($_GET['module'] == 'rptpelatihankec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptpelatihankec/rptpelatihankec.php";
    }
  } elseif ($_GET['module'] == 'lappelatihankec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptpelatihankec/lappelatihankec.php";
    }
  } elseif ($_GET['module'] == 'rptkeluargakelds') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptkeluargakelds/rptkeluargakelds.php";
    }
  } elseif ($_GET['module'] == 'lapkeluargakelds') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptkeluargakelds/lapkeluargakelds.php";
    }
  } elseif ($_GET['module'] == 'rptkeluargakel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptkeluargakel/rptkeluargakel.php";
    }
  } elseif ($_GET['module'] == 'lapkeluargakel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptkeluargakel/lapkeluargakel.php";
    }
  } elseif ($_GET['module'] == 'rekap18a') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rekap18a/rekapitulasikel.php";
    }
  } elseif ($_GET['module'] == 'laprekapitulasikel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rekap18a/laprekapitulasikel.php";
    }
  }
  elseif ($_GET['module'] == 'rekap18ads') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rekap18ads/rekapitulasids.php";
    }
  } elseif ($_GET['module'] == 'laprekapitulasids') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rekap18ads/laprekapitulasids.php";
    }
  }

  //Pembaharuan
  elseif ($_GET['module'] == 'rptkeluargakecds') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptkeluargakecds/rptkeluargakecds.php";
    }
  } elseif ($_GET['module'] == 'lapkeluargakecds') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptkeluargakecds/lapkeluargakecds.php";
    }
  } elseif ($_GET['module'] == 'rptkeluargakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptkeluargakec/rptkeluargakec.php";
    }
  } elseif ($_GET['module'] == 'lapokeluargakec') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rptkeluargakec/lapokeluargakec.php";
    }
  } elseif ($_GET['module'] == 'jlhds0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0101list/jlhds0101list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0101list/lihat_jlhds0101list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0102list/jlhds0102list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0102list/lihat_jlhds0102list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0103list/jlhds0103list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0103list/lihat_jlhds0103list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0104list/jlhds0104list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0104list/lihat_jlhds0104list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0105list/jlhds0105list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0105list/lihat_jlhds0105list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0106list/jlhds0106list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0106list/lihat_jlhds0106list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0201list/jlhds0201list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0201list/lihat_jlhds0201list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0202list/jlhds0202list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0202list/lihat_jlhds0202list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0203list/jlhds0203list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0203list/lihat_jlhds0203list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0204list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0204list/jlhds0204list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0204list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0204list/lihat_jlhds0204list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0205list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0205list/jlhds0205list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0205list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0205list/lihat_jlhds0205list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0206list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0206list/jlhds0206list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0206list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0206list/lihat_jlhds0206list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0207list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0207list/jlhds0207list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0207list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0207list/lihat_jlhds0207list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0301list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0301list/jlhds0301list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0301list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0301list/lihat_jlhds0301list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0302list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0302list/jlhds0302list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0302list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0302list/lihat_jlhds0302list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0303list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0303list/jlhds0303list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0303list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0303list/lihat_jlhds0303list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0304list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0304list/jlhds0304list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0304list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0304list/lihat_jlhds0304list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0305list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0305list/jlhds0305list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0305list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0305list/lihat_jlhds0305list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0306list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0306list/jlhds0306list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0306list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0306list/lihat_jlhds0306list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0307list/jlhds0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0307list/lihat_jlhds0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhwr0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhwr0307list/jlhwr0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhwr0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhwr0307list/lihat_jlhwr0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhtb0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhtb0307list/jlhtb0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhtb0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhtb0307list/lihat_jlhtb0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhkop0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhkop0307list/jlhkop0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhkop0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhkop0307list/lihat_jlhkop0307list.php";
    }
  } elseif ($_GET['module'] == 'rptdatakrtkel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptdatakrtkel/rptdatakrtkel.php";
    }
  } elseif ($_GET['module'] == 'lapdatakrtkel') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/rptdatakrtkel/lapdatakrtkel.php";
    }
  } elseif ($_GET['module'] == 'datakrt') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datakrt/datakrt.php";
    }
  } elseif ($_GET['module'] == 'editdatakrt') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datakrt/editdatakrt.php";
    }
  } elseif ($_GET['module'] == 'lihatdatakrt') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datakrt/lihatdatakrt.php";
    }
  } elseif ($_GET['module'] == 'hapusdatakrt') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/datakrt/hapusdatakrt.php";
    }
  } elseif ($_GET['module'] == 'datakrt2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datakrt2/datakrt2.php";
    }
  } elseif ($_GET['module'] == 'editdatakrt2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datakrt2/editdatakrt2.php";
    }
  } elseif ($_GET['module'] == 'lihatdatakrt2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datakrt2/lihatdatakrt2.php";
    }
  } elseif ($_GET['module'] == 'hapusdatakrt2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/datakrt2/hapusdatakrt2.php";
    }
  } elseif ($_GET['module'] == 'mstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstkomoditi/mstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'editmstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstkomoditi/editmstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'lihatmstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstkomoditi/lihatmstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'hapusmstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstkomoditi/hapusmstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'mstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstpekarangan/mstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'editmstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstpekarangan/editmstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'lihatmstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstpekarangan/lihatmstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'hapusmstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/mstpekarangan/hapusmstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'sipkunjungan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkunjungan/sipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'editsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkunjungan/editsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'lihatsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkunjungan/lihatsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'hapussipkunjungan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkunjungan/hapussipkunjungan.php";
    }
  }

  //Pembaharuan
  elseif ($_GET['module'] == 'sipkunjungan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkunjungan2/sipkunjungan2.php";
    }
  } elseif ($_GET['module'] == 'editsipkunjungan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkunjungan2/editsipkunjungan2.php";
    }
  } elseif ($_GET['module'] == 'lihatsipkunjungan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkunjungan2/lihatsipkunjungan2.php";
    }
  } elseif ($_GET['module'] == 'hapussipkunjungan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkunjungan2/hapussipkunjungan2.php";
    }
  } elseif ($_GET['module'] == 'sipkegiatan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkegiatan/sipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'editsipkegiatan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkegiatan/editsipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'lihatsipkegiatan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkegiatan/lihatsipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'hapussipkegiatan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/sipkegiatan/hapussipkegiatan.php";
    }
  }

  //Pembaharuan

  elseif ($_GET['module'] == 'sipkegiatan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkegiatan2/sipkegiatan2.php";
    }
  } elseif ($_GET['module'] == 'editsipkegiatan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkegiatan2/editsipkegiatan2.php";
    }
  } elseif ($_GET['module'] == 'lihatsipkegiatan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkegiatan2/lihatsipkegiatan2.php";
    }
  } elseif ($_GET['module'] == 'hapussipkegiatan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/sipkegiatan2/hapussipkegiatan2.php";
    }
  } elseif ($_GET['module'] == 'rekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rekapiva/rekapiva.php";
    }
  } elseif ($_GET['module'] == 'editrekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rekapiva/editrekapiva.php";
    }
  } elseif ($_GET['module'] == 'lihatrekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rekapiva/lihatrekapiva.php";
    }
  } elseif ($_GET['module'] == 'hapusrekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/rekapiva/hapusrekapiva.php";
    }
  } elseif ($_GET['module'] == 'evaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/evaluasiiva/evaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'editevaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/evaluasiiva/editevaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'lihatevaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/evaluasiiva/lihatevaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'hapusevaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "modul/evaluasiiva/hapusevaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'jlhds0401list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0401list/jlhds0401list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0401list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0401list/lihat_jlhds0401list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0402list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0402list/jlhds0402list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0402list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0402list/lihat_jlhds0402list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0403list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0403list/jlhds0403list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0403list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0403list/lihat_jlhds0403list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0404list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0404list/jlhds0404list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0404list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0404list/lihat_jlhds0404list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0405list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0405list/jlhds0405list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0405list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0405list/lihat_jlhds0405list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0406list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0406list/jlhds0406list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0406list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0406list/lihat_jlhds0406list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0407list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0407list/jlhds0407list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0407list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0407list/lihat_jlhds0407list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0408list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0408list/jlhds0408list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0408list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0408list/lihat_jlhds0408list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0409list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0409list/jlhds0409list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0409list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0409list/lihat_jlhds0409list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0501list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0501list/jlhds0501list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0501list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0501list/lihat_jlhds0501list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0502list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0502list/jlhds0502list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0502list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0502list/lihat_jlhds0502list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0503list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0503list/jlhds0503list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0503list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0503list/lihat_jlhds0503list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0504list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0504list/jlhds0504list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0504list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0504list/lihat_jlhds0504list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0505list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0505list/jlhds0505list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0505list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0505list/lihat_jlhds0505list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0506list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0506list/jlhds0506list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0506list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0506list/lihat_jlhds0506list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0507list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0507list/jlhds0507list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0507list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0507list/lihat_jlhds0507list.php";
    }
  } elseif ($_GET['module'] == 'jlhds0508list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0508list/jlhds0508list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhds0508list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhds0508list/lihat_jlhds0508list.php";
    }
  } elseif ($_GET['module'] == 'jlhkk0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhkk0101list/jlhkk0101list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhkk0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhkk0101list/lihat_jlhkk0101list.php";
    }
  } elseif ($_GET['module'] == 'jlhkk0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhkk0307list/jlhkk0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhkk0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhkk0307list/lihat_jlhkk0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0101list/jlhagt0101list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0101list/lihat_jlhagt0101list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0102list/jlhagt0102list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0102list/lihat_jlhagt0102list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0103list/jlhagt0103list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0103list/lihat_jlhagt0103list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0104list/jlhagt0104list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0104list/lihat_jlhagt0104list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0105list/jlhagt0105list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0105list/lihat_jlhagt0105list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0106list/jlhagt0106list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0106list/lihat_jlhagt0106list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0201list/jlhagt0201list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0201list/lihat_jlhagt0201list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0202list/jlhagt0202list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0202list/lihat_jlhagt0202list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0203list/jlhagt0203list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0203list/lihat_jlhagt0203list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0204list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0204list/jlhagt0204list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0204list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0204list/lihat_jlhagt0204list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0205list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0205list/jlhagt0205list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0205list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0205list/lihat_jlhagt0205list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0206list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0206list/jlhagt0206list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0206list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0206list/lihat_jlhagt0206list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0207list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0207list/jlhagt0207list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0207list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0207list/lihat_jlhagt0207list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0301list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0301list/jlhagt0301list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0301list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0301list/lihat_jlhagt0301list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0302list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0302list/jlhagt0302list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0302list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0302list/lihat_jlhagt0302list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0303list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0303list/jlhagt0303list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0303list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0303list/lihat_jlhagt0303list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0304list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0304list/jlhagt0304list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0304list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0304list/lihat_jlhagt0304list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0305list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0305list/jlhagt0305list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0305list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0305list/lihat_jlhagt0305list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0306list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0306list/jlhagt0306list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0306list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0306list/lihat_jlhagt0306list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0307list/jlhagt0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0307list/lihat_jlhagt0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0401list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0401list/jlhagt0401list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0401list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0401list/lihat_jlhagt0401list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0402list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0402list/jlhagt0402list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0402list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0402list/lihat_jlhagt0402list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0403list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0403list/jlhagt0403list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0403list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0403list/lihat_jlhagt0403list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0404list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0404list/jlhagt0404list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0404list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0404list/lihat_jlhagt0404list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0405list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0405list/jlhagt0405list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0405list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0405list/lihat_jlhagt0405list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0406list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0406list/jlhagt0406list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0406list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0406list/lihat_jlhagt0406list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0407list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0407list/jlhagt0407list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0407list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0407list/lihat_jlhagt0407list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0408list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0408list/jlhagt0408list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0408list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0408list/lihat_jlhagt0408list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0409list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0409list/jlhagt0409list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0409list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0409list/lihat_jlhagt0409list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0501list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0501list/jlhagt0501list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0501list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0501list/lihat_jlhagt0501list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0502list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0502list/jlhagt0502list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0502list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0502list/lihat_jlhagt0502list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0503list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0503list/jlhagt0503list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0503list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0503list/lihat_jlhagt0503list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0504list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0504list/jlhagt0504list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0504list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0504list/lihat_jlhagt0504list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0505list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0505list/jlhagt0505list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0505list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0505list/lihat_jlhagt0505list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0506list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0506list/jlhagt0506list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0506list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0506list/lihat_jlhagt0506list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0507list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0507list/jlhagt0507list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0507list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0507list/lihat_jlhagt0507list.php";
    }
  } elseif ($_GET['module'] == 'jlhagt0508list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0508list/jlhagt0508list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhagt0508list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhagt0508list/lihat_jlhagt0508list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0101list/jlhklg0101list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0101list/lihat_jlhklg0101list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0102list/jlhklg0102list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0102list/lihat_jlhklg0102list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0103list/jlhklg0103list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0103list/lihat_jlhklg0103list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0104list/jlhklg0104list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0104list/lihat_jlhklg0104list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0105list/jlhklg0105list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0105list/lihat_jlhklg0105list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0106list/jlhklg0106list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0106list/lihat_jlhklg0106list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0201list/jlhklg0201list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0201list/lihat_jlhklg0201list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0202list/jlhklg0202list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0202list/lihat_jlhklg0202list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0203list/jlhklg0203list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0203list/lihat_jlhklg0203list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0204list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0204list/jlhklg0204list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0204list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0204list/lihat_jlhklg0204list.php";
    }
  } elseif ($_GET['module'] == 'jlhklg0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0307list/jlhklg0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhklg0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhklg0307list/lihat_jlhklg0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0101list/jlhbalita0101list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0101list/lihat_jlhbalita0101list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0102list/jlhbalita0102list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0102list/lihat_jlhbalita0102list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0103list/jlhbalita0103list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0103list/lihat_jlhbalita0103list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0104list/jlhbalita0104list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0104list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0104list/lihat_jlhbalita0104list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0105list/jlhbalita0105list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0105list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0105list/lihat_jlhbalita0105list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0106list/jlhbalita0106list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0106list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0106list/lihat_jlhbalita0106list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0201list/jlhbalita0201list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0201list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0201list/lihat_jlhbalita0201list.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0202list/jlhbalita0202list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0202list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0202list/lihat_jlhbalita0202ist.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0203list/jlhbalita0203list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0203list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0203list/lihat_jlhbalita0203ist.php";
    }
  } elseif ($_GET['module'] == 'jlhbalita0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0307list/jlhbalita0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbalita0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbalita0307list/lihat_jlhbalita0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhpus0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0101list/jlhpus0101list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhpus0101list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0101list/lihat_jlhpus0101list.php";
    }
  } elseif ($_GET['module'] == 'jlhpus0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0102list/jlhpus0102list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhpus0102list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0102list/lihat_jlhpus0102list.php";
    }
  } elseif ($_GET['module'] == 'jlhpus0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0103list/jlhpus0103list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhpus0103list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0103list/lihat_jlhpus0103list.php";
    }
  } elseif ($_GET['module'] == 'jlhpus0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0307list/jlhpus0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhpus0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhpus0307list/lihat_jlhpus0307list.php";
    }
  } elseif ($_GET['module'] == 'jlh3buta0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlh3buta0307list/jlh3buta0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlh3buta0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlh3buta0307list/lihat_jlh3buta0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhwus0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhwus0307list/jlhwus0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhwus0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhwus0307list/lihat_jlhwus0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhbumil0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbumil0307list/jlhbumil0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhbumil0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhbumil0307list/lihat_jlhbumil0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhlansia0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhlansia0307list/jlhlansia0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhlansia0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhlansia0307list/lihat_jlhlansia0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhsusu0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhsusu0307list/jlhsusu0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhsusu0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhsusu0307list/lihat_jlhsusu0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhjamban0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhjamban0307list/jlhjamban0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhjamban0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhjamban0307list/lihat_jlhjamban0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhsehat0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhsehat0307list/jlhsehat0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhsehat0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhsehat0307list/lihat_jlhsehat0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhnosehat0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhnosehat0307list/jlhnosehat0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhnosehat0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhnosehat0307list/lihat_jlhnosehat0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhmelahirkan0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhmelahirkan0307list/jlhmelahirkan0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhmelahirkan0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhmelahirkan0307list/lihat_jlhmelahirkan0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhnifas0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhnifas0307list/jlhnifas0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhnifas0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhnifas0307list/lihat_jlhnifas0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhmeninggal0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhmeninggal0307list/jlhmeninggal0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhmeninggal0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhmeninggal0307list/lihat_jlhmeninggal0307list.php";
    }
  } elseif ($_GET['module'] == 'jlhlahirlk0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhlahirlk0307list/jlhlahirlk0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhlahirlk0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhlahirlk0307list/lihat_jlhlahirlk0307list.php";
    }
  } elseif ($_GET['module'] == 'kehamilan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kehamilan/kehamilan.php";
    }
  } elseif ($_GET['module'] == 'editkehamilan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kehamilan/editkehamilan.php";
    }
  } elseif ($_GET['module'] == 'hapuskehamilan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kehamilan/hapuskehamilan.php";
    }
  } elseif ($_GET['module'] == 'lihatkehamilan') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "modul/kehamilan/lihatkehamilan.php";
    }
  } elseif ($_GET['module'] == 'kehamilan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kehamilan2/kehamilan2.php";
    }
  } elseif ($_GET['module'] == 'editkehamilan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kehamilan2/editkehamilan2.php";
    }
  } elseif ($_GET['module'] == 'hapuskehamilan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kehamilan2/hapuskehamilan2.php";
    }
  } elseif ($_GET['module'] == 'lihatkehamilan2') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/kehamilan2/lihatkehamilan2.php";
    }
  } elseif ($_GET['module'] == 'pendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/pendidikan/pendidikan.php";
    }
  } elseif ($_GET['module'] == 'editpendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/pendidikan/editpendidikan.php";
    }
  } elseif ($_GET['module'] == 'hapuspendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/pendidikan/hapuspendidikan.php";
    }
  } elseif ($_GET['module'] == 'lihatpendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "modul/pendidikan/lihatpendidikan.php";
    }
  } elseif ($_GET['module'] == 'jlhibuhamil0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhibuhamil0307list/jlhibuhamil0307list.php";
    }
  } elseif ($_GET['module'] == 'lihatjlhibuhamil0307list') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "modul/jlhibuhamil0307list/lihat_jlhibuhamil0307list.php";
    }
  } else {
?>

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Fitur ini masih tahap pengembangan.</h3>
          <!--<h3><i class="fa fa-warning text-yellow"></i> Oops! Alamat Website tidak ketemu.</h3>-->
          <p>
            Coba Cek Penulisan Link Website
            Lakukan Refresh <a href="?module=beranda">Kembali ke dashboard</a> atau coba kembali cek penulisan link.
          </p>
          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search" />
              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
              </div>
            </div><!-- /.input-group -->
          </form>
        </div><!-- /.error-content -->
      </div><!-- /.error-page -->
    </section><!-- /.content -->
<?php
  }
}
?>