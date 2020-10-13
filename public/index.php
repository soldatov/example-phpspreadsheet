<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World!');

$sheet->setCellValue('A2', 'Formula 1+1:');
$sheet->setCellValue('B2', '=(1+1)');

$sheet->getCell('B2')->getStyle()->getFont()->setColor(new Color(Color::COLOR_RED));
$sheet->getCell('B2')->getStyle()->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color(Color::COLOR_BLUE));

$writer = new Xlsx($spreadsheet);
$writer->save('../tmp/hello_world.xlsx');