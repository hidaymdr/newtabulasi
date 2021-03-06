<?php
defined('BASEPATH') OR exit('AKSES DITOLAK');
require_once APPPATH ."third_party/vendor/autoload.php";
class Excel
{
    public function read_excel($path){
        $filetype = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($filetype);
        $xls = $reader->load($path);
        $sheet = $xls->getActiveSheet();
        $last_row = $sheet->getHighestRow();
        $last_col = $sheet->getHighestColumn();
        $data = $sheet->rangeToArray('A1:'.$last_col.$last_row,NULL, TRUE,TRUE,TRUE);
        $output = array('judul'=>$data[1]);
        for ($i=2; $i < $last_row; ++$i) {
            $output['data'][] = $data[$i];
        }
        return $output;
    }
    public function write_excel(){
        $xls = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $xls->getSheet(0);

        /* $xls->disconnectWorksheets();
        unset($xls); */
    }
}
