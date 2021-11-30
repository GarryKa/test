<?php
//text file
 $url =  urlencode($url);
 $file = file_get_contents($url);
 echo $file;

 //xml file
 if (file_exists('test.xml')) {
    $xml = simplexml_load_file('test.xml');
    print_r($xml);
    //echo $xml->title;
} else {
    exit('Не удалось открыть файл test.xml.');
}

//doc file
//composer require phpoffice/phpword

// Read contents
$name = basename(__FILE__, '.php');
$source = "resources/{$name}.doc";
echo date('H:i:s'), " Reading contents from `{$source}`", EOL;
$phpWord = \PhpOffice\PhpWord\IOFactory::load($source, 'MsDoc');

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);

?>