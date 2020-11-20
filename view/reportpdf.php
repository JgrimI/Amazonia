<?php
require_once('../business/ManageBook.php');
require_once('../business/ManagePresentation.php');
require_once('../business/ManageScienceArticle.php');
require_once('../business/ManageUser.php');
require_once('../business/ManageBooking.php');
require_once('../business/ManageAudit.php');

require('fpdf/diag.php');


$con = new Connection();
$connection = $con->conectBD();

ManageBook::setConnectionBD($connection);
$books = ManageBook::listAll();

ManagePresentation::setConnectionBD($connection);
$papers = ManagePresentation::listAll();

ManageScienceArticle::setConnectionBD($connection);
$articles = ManageScienceArticle::listAll();

ManageUser::setConnectionBD($connection);
$users = ManageUser::listAll();

ManageBooking::setConnectionBD($connection);
$bookings = ManageBooking::listAll();

ManageAudit::setConnectionBD($connection);
$audits = ManageAudit::listAll();

$numBooksN = 0;
$numBooksY = 0;
$numPapersY = 0;
$numPapersN = 0;
$numArticlesY = 0;
$numArticlesN = 0;

foreach ($books as $book) {
    if ($book->getAvailable() == 'Y') {
        $numBooksY += 1;
    } else {
        $numBooksN += 1;
    }
}
foreach ($papers as $paper) {
    if ($paper->getAvailable() == 'Y') {
        $numPapersY += 1;
    } else {
        $numPapersN += 1;
    }
}
foreach ($articles as $article) {
    if ($article->getAvailable() == 'Y') {
        $numArticlesY += 1;
    } else {
        $numArticlesN += 1;
    }
}

$numUsersA = 0;
$numUsersD = 0;

foreach ($users as $user) {
    if ($user->getStatus() == 'activo') {
        $numUsersA += 1;
    } else {
        $numUsersD += 1;
    }
}


$pdf = new PDF_Diag();
$pdf->AddPage();

$data = array('N. A. Books' => $numBooksN, 'A. Books' => $numBooksY, 'N. A. Articles' => $numArticlesN, 'A. Articles' => $numArticlesY, 'N. A. Presentations' => $numPapersN, 'A. Presentations' => $numPapersY);

//Pie chart
$pdf->SetFont('Arial', 'BI', 12);
$pdf->Cell(0, 5, 'Documents Availability - Pie Chart', 0, 1);
$pdf->Ln(8);
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 10);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->Cell(30, 5, 'Not Available Books:');
$pdf->Cell(15, 5, $data['N. A. Books'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Available Books:');
$pdf->Cell(15, 5, $data['A. Books'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Not Available Articles:');
$pdf->Cell(15, 5, $data['N. A. Articles'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Available Books:');
$pdf->Cell(15, 5, $data['A. Articles'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Not Available Presentations:');
$pdf->Cell(25, 5, $data['N. A. Presentations'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Available Presentations:');
$pdf->Cell(18, 5, $data['A. Presentations'], 0, 0, 'R');
$pdf->Ln();
$pdf->Ln(8);

$pdf->SetXY(90, $valY);
$col1 = array(59, 167, 47);
$col2 = array(65, 205, 50);
$col3 = array(167, 47, 59);
$col4 = array(255, 40, 40);
$col5 = array(200, 200, 200);
$col6 = array(235, 235, 235);
$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1, $col2, $col3, $col4, $col5, $col6));
$pdf->SetXY($valX, $valY + 40);

//Bar diagram
$pdf->SetFont('Arial', 'BI', 12);
$pdf->Cell(0, 5, 'Documents Availability - Bar Diagram', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(25, 175, 100));
$pdf->SetXY($valX, $valY + 80);



$data = array('A. Users' => $numUsersA, 'I. Users' => $numUsersD);

//Pie chart
$pdf->SetFont('Arial', 'BI', 12);
$pdf->Cell(0, 5, 'Active/InActive Users - Pie Chart', 0, 1);
$pdf->Ln(8);
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 10);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->Cell(30, 5, 'Active Users:');
$pdf->Cell(15, 5, $data['A. Users'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'InActive Users:');
$pdf->Cell(15, 5, $data['I. Users'], 0, 0, 'R');
$pdf->Ln();
$pdf->Ln(8);

$pdf->SetXY(90, $valY);
$col2 = array(167, 47, 59);
$col1 = array(255, 40, 40);
$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1, $col2));
$pdf->SetXY($valX, $valY + 40);

//Bar diagram
$pdf->SetFont('Arial', 'BI', 12);
$pdf->Cell(0, 5, 'Active/InActive Users - Bar Diagram', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(135, 135, 135));
$pdf->SetXY($valX, $valY + 80);


$pdf->Output();
