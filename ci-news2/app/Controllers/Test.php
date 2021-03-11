<?php
namespace App\Controllers;


use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Exception as sheetException;
use PhpOffice\PhpSpreadsheet\Writer\Exception as writerException;

class Test extends Controller
{
  protected $file_name;
  public function __construct() {
    helper('date');

  }

  public function index() {
    $sheet = null;
    $spreadSheet = new Spreadsheet();
    $sheet =$spreadSheet->getActiveSheet();

    try {
      $sheetIndex = $spreadSheet->getIndex( $spreadSheet->getSheetByName('Worksheet') );
    } catch (sheetException $e) {
      die($e->getMessage());
    }

    try {
      $spreadSheet->removeSheetByIndex($sheetIndex);
    } catch (sheetException $e) {
      die($e->getMessage());
    }

    $sheet = $spreadSheet->createSheet();
    $sheet->setTitle("테스트 시트");

    $writer = new Xlsx($spreadSheet);
    if($this->file_name == '') {
      try {
        $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
      } catch (\Exception $e) {
        die($e->getMessage());
      }
      $this->file_name = "테스트파일_".date("Y_m_d", $unix);
    }

    echo view("test/test");

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $this->file_name .'.xlsx"');
    header('Cache-Control: max-age=0');
    try {
      $writer->save('php://output');
    } catch (writerException $e) {
      die($e->getMessage());
    }

  }
}