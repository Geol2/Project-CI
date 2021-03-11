<?php
namespace App\Controllers;


use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Test extends Controller
{
  protected $file_name;
  public function __construct() {
    helper('date');
}
  public function index() {
    $spreadSheet = new Spreadsheet();
    $sheet =$spreadSheet->getActiveSheet();

    $sheetIndex = $spreadSheet->getIndex(
      $spreadSheet->getSheetByName('Worksheet')
    );
    $spreadSheet->removeSheetByIndex($sheetIndex);

    $sheet = $spreadSheet->createSheet();
    $sheet->setTitle("테스트 시트");

    $writer = new Xlsx($spreadSheet);
    if($this->file_name == '') {
      $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프

      $this->file_name = "테스트파일_".date("Y_m_d", $unix);;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $this->file_name .'.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    return view("test/test");
  }
}