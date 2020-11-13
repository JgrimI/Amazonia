<?php
function removeAccents($input){
    $output = "";
    $output = str_replace("á", "a", $input);
    $output = str_replace("é", "e", $output);
    $output = str_replace("í", "i", $output);
    $output = str_replace("ï", "i", $output);
    $output = str_replace("ì", "i", $output);
    $output = str_replace("ó", "o", $output);
    $output = str_replace("ú", "u", $output);
    $output = str_replace("ñ", "n", $output);
    $output = str_replace("Á", "a", $output);
    $output = str_replace("É", "e", $output);
    $output = str_replace("Í", "i", $output);
    $output = str_replace("Ó", "o", $output);
    $output = str_replace("Ú", "u", $output);
    $output = str_replace("Ñ", "n", $output);
    $output = str_replace("ü", "u", $output);
    $output = str_replace(":", "", $output);
    $output = str_replace(".", "", $output);
    return $output;
}
function saveImage($name,$temporalName){
    $url=removeAccents(str_replace(' ', '', $name)) . ".png";
    $img = "images/photosDocuments/" . $url;
    file_put_contents($img, file_get_contents($temporalName));
    return $img;
}
function printMessage($titulo,$desc,$tipo){
    $r="<script>swal(
        '".$titulo."',
        '".$desc."',
        '".$tipo."'
      )</script>";
      return $r;
}
?>