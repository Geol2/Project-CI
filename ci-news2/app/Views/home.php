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
  @font-face {
    font-family: 'GmarketSansBold';
    src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansBold.woff') format('woff');
    font-weight: normal;
    font-style: normal;
  }

  * {
    cursor: default;
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
    transition: border, background 0.5s;
  }
  .aclass:active {
    background: gray;
    border: solid gray;
  }
</style>
<div class="home">
  <h1 class="home_name"> Homework </h1>
  <h3> - 숙제 - </h3>
  </br>
  <a class="aclass" href="/Boards"> 게시판으로 </a>
</div>
</body>
</html>