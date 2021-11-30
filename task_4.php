<?php
 /**
   * Read a CSV file.
   */
$file = "./presidents.csv";

function readCSV($file) {
    $data = array();
    if (file_exists($file)) {
      $file_handle = fopen($file, 'r');
      while (!feof($file_handle)) {
        $data[] = fgetcsv($file_handle);
      }
      fclose($file_handle);
      // Sometimes the last row of the CSV is empty. If so, remove it.
      if (!end($data)) {
        array_pop($data);
      }
      return $data;
    }
}

$presidents =  readCSV($file);
$live = [];
foreach ($presidents as $item)  {
    if (empty($item[4]))
        $live[] = $item;
}
print_r($live);
?>