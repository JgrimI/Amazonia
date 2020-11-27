<?php
header('Content-type:application/vnd.ms-excel; charset=UTF-8"');
header('Content-Disposition: attachment; filename=reportExcel.xls');

require_once('../business/ManageBook.php');
require_once('../business/ManagePresentation.php');
require_once('../business/ManageScienceArticle.php');
require_once('../persistence/util/Connection.php');

header('Content-Type: text/html; charset=UTF-8');
?>

<?php

$con = new Connection();
$connection = $con->conectBD();
ManageBook::setConnectionBD($connection);
$books = ManageBook::listAll();

ManagePresentation::setConnectionBD($connection);
$papers = ManagePresentation::listAll();

ManageScienceArticle::setConnectionBD($connection);
$articles = ManageScienceArticle::listAll();

$results = count($books) + count($papers) + count($articles);

?>

<table>
    <caption style="background-color: #3C3C3C; color:white;">List of Books</caption>
    <tr>
        <th style="background-color: #46D900">ID</th>
        <th style="background-color: #46D900">Title</th>
        <th style="background-color: #46D900">Authors</th>
        <th style="background-color: #46D900">Description</th>
    </tr>
    <?php
    if ($results == 0) {
    } else {
        foreach ($books as $b) {
            echo "<tr>
                      <td>" . $b->getId() . "</td>
                      <td>" . $b->getTitle() . "</td>
                      <td>" . $b->getAuthors() . "</td>
                      <td>" . utf8_decode($b->getDescription()) . "</td>
                 </tr>";
    ?>


    <?php
        }
        echo '<tr><td colspan="4" style="text-align:right;border:7% solid;background-color: #46D900;">Total: '.count($books).'</td></tr>';
    }
    ?>
</table>
<br>
<?php
?>