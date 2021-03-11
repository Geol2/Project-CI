<section>
  <div class="write_class">
    <p> 게시물 작성 페이지 </p>
    <h1> 새 글 작성하기 </h1>

<!--    <form name="contentForm" id="contentForm" method="post" action="/Boards/create">-->
      <div>
        <label for="sub"> 제목 </label>
        <input class="sub" name="sub" type="text" id="sub" placeholder="제목을 입력하세요. (20글자)" maxlength='20'>
      </div>
      <div>
        <label for="content"> 내용 </label>
        <textarea class="content" name="content" id="content" cols="30" rows="10" placeholder="내용을 입력하세요. (200글자)" maxlength='200'></textarea>
      </div>
      <br>
      <div>
        <label for="writer"> 작성자 </label>
        <input class="writer" name="writer" type="text" id="writer" placeholder="작성자를 입력하세요. (10글자)" maxlength='10'>
      </div>
      <div>
        <button class="submit" type="button" onclick="transitionForm()"> 전송 </button>
<!--    <input class="submit" class="submit" type="submit" value="전송">-->
      </div>
<!--    </form>-->
    <div>
      <a class="cancel" href="/Boards"> 취소 </a>
    </div>
</div>
</section>

<script type="text/javascript">
  function transitionForm() {
    if(confirm("작성을 완료하시겠습니까?")) {
      let sub = document.getElementById("sub");
      let content = document.getElementById("content");
      let writer = document.getElementById("writer");

      let form = document.createElement("form");
      form.setAttribute("charset", "UTF-8");
      form.setAttribute("method", "post");
      form.setAttribute("action", "/Boards/create");

      form.append('sub', sub);
      form.append('content', content);
      form.append('writer', writer);

      document.body.appendChild(form);

      form.submit();
    } else {
      alert("작성에 에러가 있습니다. 잠시 후 다시 작성해주세요.");
    }
  }
</script>