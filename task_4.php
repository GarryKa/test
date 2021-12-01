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

function getMax( $array ){
    $max = 0;
    foreach( $array as $k => $v )
    {
        $max = max( array( $max, $v['key1'] ) );
    }
    return $max;
}

$presidents =  readCSV($file);
//массив дней рождения
foreach ($presidents as $item)  {
    $born_arr[] = $item[2] ;  //в массив
}

$start_year = min($born_arr);  //определяем минимальную дату
$end_year =  date('Y', time());
//перебирам годы от первого дня рождения до наст временени
for($i = $start_year; $i <= $end_year; $i++)  {
     reset($presidents);
     foreach ($presidents as $item)  {
        if ($item[2] > $i && empty($item[4])) //если уже рожден и жив
         $count[$i] ++; //заносим в счетчик
     }
}
//выбираем элемент с макс значением  счетчика
$value = max($count);
//выводим ключ (год) из счетчика
$year = array_search($value, $count);
?>