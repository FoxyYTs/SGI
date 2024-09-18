<?php
    $clave = "Password123@";
    $validar = "7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93";
    $pass = "";
    $contrasena = md5($clave);
    $arr2 = str_split($contrasena);

    for ($i = 0; $i < strlen($contrasena); $i++) {
        $pass = $pass . $arr2[$i] . "y" . $i * 3;
    }
    echo $pass;
    if ($validar == $pass) {
        echo "Clave correcta";
    } else {
        echo "Clave incorrecta";
    }

?>