<!DOCTYPE html>
<html lang="en">
    <head>
        <title>새 글 작성하기</title>
        <!-- Editor's Dependecy Style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css"/>
        <!-- Editor's Style -->
        <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css"/>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <style>
        .write_class {
            font-family: "Gmarket Sans";
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
    </style>
    <body>
        <div class="write_class">
            <p> 게시물 작성 페이지 </p>
            <h1> 새 글 작성하기 </h1>


            <form name="contentForm" id="contentForm" method="post" action="/Boards/create">
                <div>
                    <label for="sub"> 제목 </label>
                    <input name="sub" type="text" id="sub" placeholder="제목을 입력하세요. (20글자)" maxlength='20'>
                </div>
                <div>
                    <label for="content"> 내용 </label>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="내용을 입력하세요. (200글자)" maxlength='200'></textarea>
<!--                    <div class="editor"> </div>-->
<!--                    <textarea name="content" style="display:none"></textarea>-->
                </div>
                <br>
                <div>
                    <label for="writer"> 작성자 </label>
                    <input name="writer" type="text" id="writer" placeholder="작성자를 입력하세요. (10글자)" maxlength='10'>
                </div>
                <div>
                    <input id="submitBtn" class="submit" type="submit" value="전송">
                </div>
            </form>
            <div>
                <a href="/Boards"> 취소 </a>
            </div>
        </div>

<!--        <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>-->
<!--        <script>-->
<!--            const content = [].join('\n');-->
<!--            const editor = new toastui.Editor({-->
<!--                el: document.querySelector('.editor'),-->
<!--                initialEditType: 'markdown',/* markdown | wysiwyg */-->
<!--                previewStyle: 'vertical',-->
<!--                height: '300px',-->
<!--                initialValue: content-->
<!--            });-->
<!---->
<!--            $('form').submit(function(e){-->
<!--                e.preventDefault();-->
<!--                $('textarea').val(editor.getMarkdown());-->
<!--                this.submit();-->
<!--            });-->
<!--        </script>-->

    </body>
</html>