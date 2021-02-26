<style>
    @font-face {
        font-family: 'GmarketSansLight';
        src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansLight.woff') format('woff');
        font-weight: normal;
        font-style: normal;
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
    .submit {
        text-decoration: none;
        color: black;
        background: white;
        border: none;
        transition: color, background 0.5s;
        border-radius: 2px;
        margin: 2px;
        padding: 2px;
    }
    .submit:hover {
        color: white;
        background: black;
    }
</style>

<div class="write_class">
    <form name="contentForm" id="contentForm" method="post">
        <div>
            <label for="sub"> 제목 </label>
            <input name="sub" type="text" id="sub">
        </div>
        
        <div>
            <label for="content"> 수정 </label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="내용을 입력하세요."> </textarea>
        </div>

        <div>
            <input class="submit" type="submit" value="전송">
        </div>
    </form>
    <div>
        <a href="/boards/1"> 취소 </a>
    </div>
</div>