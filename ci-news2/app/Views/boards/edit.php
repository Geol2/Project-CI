<!DOCTYE html>
<html lang="en">
    <head>
        <title> <?= esc( $SNO, 'html') ?>번 글 수정하기 </title>
    </head>
    <style>
        * {
            cursor: default;
        }
        body {
            font-family: 'GmarketSansLight';
        }
        .write_class {
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
        input[type=text], textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid black;
        }
        #sub:focus, textarea:focus {
            background-color: lightblue;
        }
        #sno, #writer, #date_char {
            border: none;
            outline: none;
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
        #sub:hover, #content:hover {
            cursor: text;
        }
        .divide {
            display: table;
            margin: 5px;
        }
    </style>

    <body>
        <div class="write_class">
            <p> 게시물 수정 페이지 </p>
            <h1> <?= esc( $SNO, 'html') ?>번 글 수정하기 </h1>
            <form name="contentForm" id="contentForm" method="post" action="/Boards/update/<?= esc( $SNO, 'url') ?>">
                <div>
                    <label for="sno"> 번호 </label>
                    <input name="sno" type="text" id="sno" value="<?= esc( $SNO, 'html') ?>" readonly>
                </div>

                <div>
                    <label for="sub"> 제목 </label>
                    <input name="sub" type="text" id="sub" value="<?= esc( $SUBJECT_NAME, 'html') ?>" maxlength='20'>
                </div>
                <div>
                    <label for="content"> 내용 </label>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="" maxlength='200'><?= esc( $CONTENT, 'html') ?></textarea>
                    <!-- <div class="editor">--><?//= esc( $CONTENT, 'html' ) ?><!--</div>-->
                    <!-- <textarea name="content" style="display:none"></textarea>-->
                </div>
                <br>
                <div>
                    <label for="writer"> 작성자 </label>
                    <input name="writer" type="text" id="writer" maxlength='20' value="<?= esc( $WRITER, 'html') ?>" readonly>
                </div>

                <div>
                    <label for="date_char"> 작성일 </label>
                    <input name="date_char" type="text" id="date_char" value="<?= esc( $DATE_CHAR, 'html') ?>" readonly>
                </div>
                <div class="divide">
                    <div>
                        <input class="submit" type="submit" value="전송">
                    </div>
                    <div>
                        <a href="/Boards/<?= esc( $SNO, 'html') ?>"> 취소 </a>
                    </div>
                </div>
            </form>

        </div>
    </body>
</html>
