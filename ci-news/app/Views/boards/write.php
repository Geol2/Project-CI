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
        left: 50%;
        transform: translateX(-50%);
    }
    .sub {
        border: none;
        background-color: #f8585b;
        font-size: 15px;
    }
</style>

<div class="write_class">
    <form name="contentForm" id="contentForm" method="post" action="/boards/getDataContent">
        <div>
            <label for="sub"> 제목 </label>
            <input name="sub" type="text" id="sub">
        </div>
        <div>
            <label for="content"> 내용 </label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="writer"> 작성자 </label>
            <input name="writer" id="writer" cols="30" rows="10"></input>
        </div>
        <div>
            <input type="submit" value="전송">
        </div>
    </form>
    <div>
        <a href="/boards/board"> 취소 </a>
    </div>
</div>