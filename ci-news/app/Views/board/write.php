
<div class="write_class">
    <form name="contentForm" id="contentForm" method="post" action="/board/getDataContent">
        <div>
            <label for="sub"> 제목 </label>
            <input name="sub" type="text" id="sub">
        </div>
        <div>
            <label for="content"> 내용 </label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="content"> 작성자 </label>
            <input name="writer" id="writer" cols="30" rows="10"></input>
        </div>
        <div>
            <input type="submit" value="전송">
        </div>
    </form>
    <div>
        <a href="/"> 취소 </a>
    </div>
</div>