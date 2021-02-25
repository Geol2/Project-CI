<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>게시판!</title>
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

            .home {
                font-family: 'GmarketSansLight';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .aclass{
                cursor: default;
                text-decoration: none;
                color: black;
                border-radius: 10px;
                border: solid;
                transition: border, background 0.5s;
                margin: 5px;
                padding: 5px;
            }
            .aclass:hover {
                cursor: pointer;
                border: solid black;
                background: black;
                color : white;
            }
            .aclass:active {
                background: gray;
                border: solid gray;
            }
        </style>
        <div class = "home">
            <h1> Home </h1>
            <a class="aclass" href="/boards/board"> 게시판 가기 </a>
        </div>
    </body>
</html>

<?php
