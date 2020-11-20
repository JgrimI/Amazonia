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
function printMessageWithRedirect($titulo,$desc,$tipo,$route){
    $r="<script>swal(
        '".$titulo."',
        '".$desc."',
        '".$tipo."'
      ).then(function(){
        window.location.href='".$route."'
      })</script>";
      return $r;
}
function strtotitle($title)
{
    $title=strtolower($title);
    $smallwordsarray = array(
        'of', 'a', 'the', 'and', 'an', 'or', 'nor', 'but', 'is', 'if', 'then', 'else', 'when',
        'at', 'from', 'by', 'on', 'off', 'for', 'in', 'out', 'over', 'to', 'into', 'with', 'en', 'y', 'de', 'e', 'el', 'a', 'para',
        'u', 'con', 'del', 'la'
    );
    $words = explode(' ', $title);
    foreach ($words as $key => $word) {
        if ($key == 0 or !in_array($word, $smallwordsarray))
            $words[$key] = ucwords($word);
    }
    $newtitle = implode(' ', $words);

    return $newtitle;
}
?>
