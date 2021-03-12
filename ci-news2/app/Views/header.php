<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
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

            display: flex;
            flex-direction: row;

            justify-content: flex-end ;
            align-items: center;
        }
        .join, .signup {
            padding: 10px;
        }
        .join a, .signup a{
            font-family: 'GmarketSansLight';
        }
        .chart {
            text-align: center;
        }
        .board {
            font-family: 'GmarketSansLight';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            background: white;
            border-radius: 10px;
            padding: 50px;
            min-width: 500px;
            min-height: 100px;
        }
        .board a {
            color: black;
        }
        .paging, .newwrite, .gohome, .show{
            text-align: center;
            cursor: default;
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
        .write_class{
            font-family: 'GmarketSansLight';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            background: white;
            padding: 20px;
            border-radius: 5px;

            overflow-y: scroll;
        }
        .writer {
            text-decoration: none;
            color: black;
            transition: color, background 0.5s;
            border-radius: 2px;
            margin: 2px;
            padding: 2px;
        }
        #sub:focus, textarea:focus, .writer:focus {
            background-color: lightblue;
        }
        .submit {
            border: none;
            background: #ecf0f1;
            font-family: "Gmarket Sans";
            margin: 5px;
            border-radius: 5px;
            padding: 5px;
            transition: background, color 0.5s;
        }
        .submit:hover{
            background: #7f8c8d;
            color: white;
        }
        input[type=text], textarea {
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
        .cancel:hover, .edit:hover, .delete:hover, .goboard:hover {
            background: #7f8c8d;
            color: white;
        }
    </style>

    <div class="head">
        <div class="join"> <a href="#"> 로그인 </a> </div>
        <div class="signup"> <a href="#"> 회원가입 </a> </div>
    </div>