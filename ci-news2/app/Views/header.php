<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xvet</title>
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
        .aclass{
            cursor: default;
            text-decoration: none;
            color: black;
            border-radius: 5px;
            border: none;
            transition: background 0.5s;
            margin: 5px;
            padding: 5px;
        }
        .aclass:hover {
            cursor: pointer;
            background: black;
            color : white;
            transition: border, background 0.5s;
        }
        .aclass:active {
            background: gray;
            border: solid gray;
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
        .paging {
            text-align: center;
            cursor: default;
        }

        .paging a:hover {
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
    </style>

    <div class="head">
        <div class="join"> <a href="#"> 로그인 </a> </div>
        <div class="signup"> <a href="#"> 회원가입 </a> </div>
    </div>