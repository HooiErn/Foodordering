<?php
/* Call this file 'hello-world.php' */
require __DIR__ . '/../../vendor/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
$connector = new WindowsPrintConnector("XP1");
$printer = new Printer($connector);
$printer -> text("Hello World!\n");
foreach ($items as $item) {
    $printer->addItem(
        $item['name'],
        $item['qty'],
        $item['price']
    );
}
$printer -> text($additem);
$printer -> cut();
$printer -> close();

