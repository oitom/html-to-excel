<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
libxml_disable_entity_loader(false);

require __DIR__ . '/src/Spout/Autoloader/autoload.php'; // Core Box Spout

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

// generate xlsx file
$filePath = "table-html.xlsx";
$writer = WriterEntityFactory::createXLSXWriter();
$writer->openToFile($filePath);

// cell style header
    $styleHeader = (new StyleBuilder())
                    ->setFontBold()
                    ->setFontSize(11)
                    ->setFontColor(Color::BLACK)
                    ->setBackgroundColor(Color::rgb(217, 217, 217))
                    ->setCellAlignment(CellAlignment::CENTER)
                    ->build();
// ------------------
// cell style body
    $styleBody   = (new StyleBuilder())
                    ->setFontSize(11)
                    ->setFontColor(Color::BLACK)
                    ->setCellAlignment(CellAlignment::CENTER)
                    ->build();
// ------------------


// write header
// ------------------
    $arrayHeader = ['Col A','Col B','Col C'];
    $row = WriterEntityFactory::createRowFromArray($arrayHeader, $styleHeader);
    $writer->addRow($row);
// ------------------

// write body
// ------------------

    for ($i = 1; $i < 4; $i++) { 
        $arrayBody = ["Cell A$i", "Cell B$i", "Cell C$i"];
        $row = WriterEntityFactory::createRowFromArray($arrayBody, $styleBody);
        $writer->addRow($row);
    }
// ------------------

$writer->close();