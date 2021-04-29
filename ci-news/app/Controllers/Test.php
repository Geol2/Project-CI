<?php
namespace App\Controllers;


use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Exception as sheetException;
use PhpOffice\PhpSpreadsheet\Writer\Exception as writerException;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Test extends Controller
{
  protected $file_name;

  public function __construct() {
    helper('date');
  }

  public function index() {
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'big9401@gmail.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('big9401@gmail.com', 'Mailer');
    $mail->addAddress('big9401@naver.com', 'Joe User');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';

    echo view('test/test');
  }

  public function test() {
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