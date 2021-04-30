<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>검사관리시스템</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<style>
  @font-face {
    font-family: 'GmarketSansLight';
    src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansLight.woff') format('woff');
    font-weight: normal;
    font-style: normal;
  }

  @font-face {
    font-family: 'GmarketSansBold';
    src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansBold.woff') format('woff');
    font-weight: normal;
    font-style: normal;
  }

  * {
    cursor: default;
  }

  body {
    background: #ecf0f1;
    margin: 0;
  }

  a {
    text-decoration: none;
    color: white;
  }

  table {
    width: 100%;
    border-top: 1px solid #444444;
    border-collapse: collapse;
    font-size: 11px;
  }

  th, td {

    border-bottom: 1px solid #444444;
    padding: 5px;
    S
  }

  label {
    font-weight: bolder;
  }

  .home {
    font-family: 'GmarketSansLight';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .home_name {
    font-family: 'GmarketSansBold';
    font-size: 60px;
  }

  .head {
    background: #34495e;
    width: 100vw;
    height: 70px;
  }

  .head .head_log {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: center;
    height: 70px;
  }

  .head_name {
    font-family: 'GmarketSansLight';
    margin-left: 10px;
    margin-right: auto;
    color: white;
  }

  .head_name a:hover {
    cursor: pointer;
  }

  .head_content {
    font-family: 'GmarketSansLight';
    cursor: pointer;
    align-items: center;
    justify-content: center;
  }

  .join, .signup {
    padding: 10px;
  }

  .join a, .signup a {
    font-family: 'GmarketSansLight';
  }

  .join a:hover, .signup a:hover, .head_content a:hover {
    cursor: pointer;
  }

  .chart {
    text-align: center;
  }

  .chart_name {
    font-family: 'GmarketSansBold';
  }

  .board {
    font-family: 'GmarketSansLight';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /*display: flex;*/
    /*flex-direction: column;*/
    /*justify-content: center;*/
    /*align-items: center;*/

    background: white;
    border-radius: 10px;
    padding: 20px;
    min-width: 500px;
    min-height: 100px;
  }

  .board a {
    color: black;
  }

  .paging, .newwrite, .gohome, .show {
    text-align: center;
    cursor: default;
    margin: 3px;
  }

  .pagination li {
    list-style: none;
    display: inline;
  }

  .main_content p {
    border-style: inset;
    border-radius: 5px;
    padding: 20px;
  }

  .paging a:hover, .newwrite:hover, .gohome:hover, .show:hover {
    cursor: pointer;
    animation-duration: 0.5s;
    animation-name: fadeout;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
  }

  @keyframes fadeout {
    from {
      opacity: 1;
    }
    to {
      opacity: 0.3;
    }
  }

  .write_class, .new {
    font-family: 'GmarketSansLight';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    background: white;
    padding: 20px;
    border-radius: 5px;

    width: 600px;
  }

  .write_class a {
    color: black;
    border-radius: 5px;
    font-size: 12px;
    padding: 5px;
    margin: 2px;
  }

  .write_class a:hover {
    background: #7f8c8d;
    color: white;
  }

  .writer {
    text-decoration: none;
    color: black;
    transition: color, background 0.5s;
    border-radius: 2px;
  }

  #sub:focus, textarea:focus, .writer:focus {
    background-color: lightblue;
  }

  .sub, .content, .writer {
    font-family: 'GmarketSansLight';
  }

  .sub_divide {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .sub_content, .writer, .writeDate {
    margin: auto;
  }

  .check {
    border: none;
  }

  .submit, .password, .btn {
    border: none;
    background: #ecf0f1;
    font-family: "Gmarket Sans";
    margin: 5px;
    border-radius: 5px;
    padding: 5px;
    transition: background, color 0.5s;
  }

  input[type=text], input[type=password], textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid black;
  }

  .cancel, .edit, .delete, .goboard {
    color: black;
    margin: 5px;
    border-radius: 5px;
    padding: 5px;
    font-size: 13px;
  }

  .cancel:hover, .edit:hover, .delete:hover,
  .goboard:hover, .submit:hover, .password:hover,
  .btn:hover {
    background: #7f8c8d;
    color: white;
  }
</style>

<div class="head">

  <div class="head_log">
    <div class="head_name">
      <a href="/Home"> 검사관리시스템 </a>
    </div>

    <?php $session = session(); ?>
    <?php if (!isset($session->name)) { ?>
      <div class="join"><a href="/Auth/login"> 로그인 </a></div>
      <div class="signup"><a href="/sign"> 회원가입 </a></div>
    <?php } else { ?>
      <div class="head_content">
        <a href="#"> 접수 </a>
        <a href="/Boards"> 커뮤니티 </a>
      </div>
      <div class="join"><a href="/Auth/logout"> 로그아웃 </a></div>
    <?php } ?>
  </div>
</div>

<?php var_dump($session->name); ?>
<?php var_dump($session->city); ?>
