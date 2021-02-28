
<style>
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


<div class="write_class">
    <p> 게시물 작성 페이지 </p>
    <h1> 새 글 작성하기 </h1>
    <form name="contentForm" id="contentForm" method="post" action="/Boards/create">
        <div>
            <label for="sub"> 제목 </label>
            <input name="sub" type="text" id="sub" placeholder="제목을 입력하세요. (20글자)">
        </div>
        <div>
            <label for="content"> 내용 </label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="내용을 입력하세요. (200글자)"></textarea>
        </div>
        <div>
            <label for="writer"> 작성자 </label>
            <input name="writer" type="text" id="writer" placeholder="작성자를 입력하세요. (10글자)">
        </div>
        <div>
            <input class="submit" type="submit" value="전송">
        </div>
    </form>
    <div>
        <a href="/Boards"> 취소 </a>
    </div>
</div>