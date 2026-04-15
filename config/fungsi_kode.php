 <?php
 function randpass($length){
//    karakter yang bisa dipakai sebagai password
    $string = "1234567890";
    $len = strlen($string);
    
//    mengenerate password
    for($i=1;$i<=$length; $i++){
        $start = rand(0, $len);
        $pass .= substr($string, $start, 1);
    }
    
    return $pass;
}
 
$rand= randpass(3);

function randpass2( $length = 2 ) {
    $chars = "1234567890";
    $angka = substr( str_shuffle( $chars ), 0, $length );
    return $angka;
}

function randpass4( $length = 3 ) {
    $chars2 = "1234567890";
    $angka2 = substr( str_shuffle( $chars2 ), 0, $length );
    return $angka2;
}

function randpass5( $length = 4 ) {
    $chars5 = "1234567890";
    $angka5 = substr( str_shuffle( $chars5 ), 0, $length );
    return $angka5;
}

function randpass3($length){
//    karakter yang bisa dipakai sebagai password
    $string = "1234567890";
    $len = strlen($string);
    
//    mengenerate password
    for($i=1;$i<=$length; $i++){
        $start = rand(0, $len);
        $pass .= substr($string, $start, 1);
    }
    
    return $pass;
}
 
$rand3= randpass3(1);

?>