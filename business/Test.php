<?php
require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/business/Book.php';
$id = new Book('lol2','pepe','lol2','pepe','lol2','pepe','lol2','pepe','lol2','pepe','lol2','pepe');
echo $id->getTitle();
?>

