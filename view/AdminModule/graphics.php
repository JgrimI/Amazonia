<?php
require_once('../business/ManageBook.php');
require_once('../business/ManagePresentation.php');
require_once('../business/ManageScienceArticle.php');
require_once('../persistence/util/Connection.php');

$con = new Connection();
$connection = $con->conectBD();

ManageBook::setConnectionBD($connection);
$books = ManageBook::listAll();

ManagePresentation::setConnectionBD($connection);
$papers = ManagePresentation::listAll();

ManageScienceArticle::setConnectionBD($connection);
$articles = ManageScienceArticle::listAll();

?>
<script>
function graf() {
  if ($("#bar-graphic1").length) {
    <?php
    $numBooksN= 0;
    $numBooksY= 0;
    $numPapersY= 0;
    $numPapersN= 0;
    $numArticlesY= 0;
    $numArticlesN= 0;
    foreach($books as $book){
      if ($book->getAvailable()=='Y') {
        $numBooksY += 1;
      } else {
        $numBooksN += 1;
      }
    }
    foreach($papers as $paper){
      if ($paper->getAvailable()=='Y') {
        $numPapersY += 1;
      } else {
        $numPapersN += 1;
      }
    }
    foreach($articles as $article){
      if ($article->getAvailable()=='Y') {
        $numArticlesY += 1;
      } else {
        $numArticlesN += 1;
      }
    }
    
    ?> 
    var BarData = {
      labels: ["Books", "Papers", "Articles"],
      datasets: [{
          label: 'Aviable',
          data: [<?php $numBooksY?>, <?php $numPapersY?>, <?php $numArticlesY?>],
          backgroundColor: chartColors[0],
          borderColor: chartColors[0],
          borderWidth: 0
        },
        {
          label: 'Not Aviable',
          data: [<?php $numBooksN?>, <?php $numPapersN?>, <?php $numArticlesN?>],
          backgroundColor: chartColors[1],
          borderColor: chartColors[1],
          borderWidth: 0
        }
      ]
    };
    var barChartCanvas = $("#bar-graphic1").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: BarData,
      options: {
        tooltips: {
          mode: 'index',
          intersect: false
        },
        responsive: true,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        },
        legend: false
      }
    });
  }
}

</script>