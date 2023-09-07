<?php

class ParseCSV {

    public static $delemiter = ',';
    private $filename;
    private $header;
    private $data = [];
    private $row_count = 0;

    public function __construct($filename='')
    {
        if ('' != $filename) {
            $this->file($filename);
        }
    }

    public function parse(){
        if (!isset($this->filename)) {
            echo 'File is not set.';
            return false;
        }
        //clear previous contents
        $this->reset();
        $file = fopen($this->filename, 'r');

        while (!feof($file)) {
            $row = fgetcsv($file, 0, self::$delemiter);
            if ([null] == $row || FALSE === $row) { continue; }
            if (!$this->header) { 
                $this->header = $row;
            } else {
                $this->data[] = array_combine($this->header,$row);
                $this->row_count++;
            }
        }

        fclose($file);
        return $this->data;
    }

    public function row_count(){
        return $this->row_count;
    }

    private function reset(){
        $this->data = [];
        $this->header = null;
        $this->row_count = 0;
    }

    public function file($filename){
        if (!file_exists($filename)){
            echo 'File does not exist.';
            return false;
        } elseif (!is_readable($filename)) {
            echo 'File is not Readable.';
            return false;
        }

        $this->filename = $filename;
        return true;
    }

    public function last_results(){
        return $this->data;
    }
}
?>