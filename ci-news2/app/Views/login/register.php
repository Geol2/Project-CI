<!DOCTYPE html>
<html lang="en">
    <head>
        <title>회원가입</title>
        <!-- Editor's Dependecy Style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css"/>
        <!-- Editor's Style -->
        <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css"/>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <style>
        @font-face {
            font-family: 'GmarketSansLight';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansLight.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        .write_class {
            font-family: 'GmarketSansLight';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        a {
            text-decoration: none;
            color: black;
            transition: color, background 0.5s;
            border-radius: 2px;
            margin: 2px;
            padding: 2px;
        }
        a:hover {
            color: white;
            background: black;
        }
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        #sub:focus, textarea:focus, #writer:focus {
            background-color: lightblue;
        }
        .submit {
            font-family: 'GmarketSansLight';
            text-decoration: none;
            color: black;
            background: white;
            border: none;
            border-radius: 2px;
            transition: color, background 0.5s;
            padding: 2px;
            margin: 2px;
            font-size: 20px;
        }
        .submit:hover {
            color: white;
            background: black;
        }
        .mail {
            display: flex;
            flex-direction: column;
        }
    </style>
    <body>
    <div class="write_class">
        <h1> 회원가입 </h1>

        <form name="registerForm" id="registerForm" method="post" action="/">
            <div>
                <label for="id"> 아이디 </label>
                <input name="id" id="id" type="text"  placeholder="아이디" maxlength='20'>
            </div>
            <div class="mail">
                <label for="mail"> 이메일 </label>
                <input name="mail" id="mail" type="text"  placeholder="아이디" maxlength='20'>
                <button> 이메일 인증 </button>
            </div>
            <div>
                <label for="password"> 비밀번호 </label>
                <input name="password" id="password" type="text" placeholder="비밀번호" maxlength='20'>
            </div>
            <div>
                <label for="password_re"> 비밀번호 재입력 </label>
                <input name="password_re" id="password_re" type="text" placeholder="비밀번호 재입력" maxlength='20'>
            </div>
            <br>
            <div>
                <label for="name"> 이름 </label>
                <input name="name" id="name" type="text"  placeholder="이름" maxlength='10'>
            </div>
            <div>
                <input id="submitBtn" class="submit" type="submit" value="전송">
            </div>
        </form>
        <div>
            <a href="/Boards"> 취소 </a>
        </div>
    </div>

</body>
</html>