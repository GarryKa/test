<?php
use  \PhpOffice\PhpWord\IOFactory;

class OpenFile  {

    public $file ='resources/test.txt' ;
    public $xml = 'resources/test.xml' ;
    public $doc = 'resources/test.doc' ;

    //text file
    public function OpenTex () {
      $this->file = file_get_contents($this->file);
      return  $this->file;
    }

     //xml file
    public function OpenXml (){
        if (file_exists('test.xml')) {
            $parse = simplexml_load_file($this->xml);
            return $parse;
            //echo $parse->title;
        } else {
            exit('Не удалось открыть файл ' . $this->xml);
        }
    }

    //doc file
    public function OpenDoc (){
       $phpWord = \PhpOffice\PhpWord\IOFactory::load($source, 'MsDoc');
       return  $phpWord;
    }
}

?>