<section>
    <div class="write_class">
        <p> 게시물 수정 페이지 </p>
        <h1> <?= esc( $SNO, 'html') ?>번 글 수정하기 </h1>
<!--        <form name="contentForm" id="contentForm" method="post" action="/Boards/update/--><?//= esc( $SNO, 'url') ?><!--">-->
            <div>
                <label for="sub"> 제목 </label>
                <input class="sub" type="text" id="sub" name="sub" value="<?= esc( $SUBJECT_NAME, 'html') ?>" maxlength='20' placeholder="제목을 입력하세요. (20글자)">
            </div>
            <div>
                <label for="content"> 내용 </label>
                <textarea class="content" id="content" name="content" cols="30" rows="10" placeholder="내용을 입력하세요. (200글자)" maxlength='200'><?= esc( $CONTENT, 'html') ?></textarea>
            </div>
            <br>
            <div>
                <label for="writer"> 작성자 </label>
                <input class="writer" type="text" id="writer" name="writer" maxlength='20' value="<?= esc( $WRITER, 'html') ?>" readonly>
            </div>
            <div>
                <label for="hit"> 조회수 </label>
                <input class="hit" type="text" id="hit" name="hit" maxlength='20' value="<?= esc( $HIT, 'html') ?>" readonly>
            </div>
            <div class="divide">
                <div class="divsubmit">
                    <input class="submit" type="submit" onclick="submit()" value="전송">
                </div>
                <div>
                    <a class="cancel" href="/Boards/<?= $SNO ?>"> 취소 </a>
                </div>
            </div>
<!--        </form>-->
    </div>
</section>

<script type="text/javascript">
    function submit() {
        if(confirm("수정을 완료하시겠습니까?")) {
            let sub = document.getElementById("sub");
            let content = document.getElementById("content");
            let writer = document.getElementById("writer");
            let hit = document.getElementById("hit");

            let form = document.createElement("form");
            form.setAttribute("charset", "UTF-8");
            form.setAttribute("method", "post");
            form.setAttribute("action", "/Boards/update/<?=$SNO?>");

            let inputHiddenSub = document.createElement("input");
            let inputHiddenContent = document.createElement("input");
            let inputHiddenWriter = document.createElement("input");
            let inputHiddenHit = document.createElement("input");

            inputHiddenSub.setAttribute("type", "hidden");
            inputHiddenSub.setAttribute("name", "sub");
            inputHiddenSub.setAttribute("value", sub.value);

            inputHiddenContent.setAttribute("type", "hidden");
            inputHiddenContent.setAttribute("name", "content");
            inputHiddenContent.setAttribute("value", content.value);

            inputHiddenWriter.setAttribute("type", "hidden");
            inputHiddenWriter.setAttribute("name", "writer");
            inputHiddenWriter.setAttribute("value", writer.value);

            inputHiddenHit.setAttribute("type", "hidden");
            inputHiddenHit.setAttribute("name", "hit");
            inputHiddenHit.setAttribute("value", hit.value);

            form.appendChild(inputHiddenSub);
            form.appendChild(inputHiddenContent);
            form.appendChild(inputHiddenWriter);
            form.appendChild(inputHiddenHit);

            document.body.appendChild(form);
            form.submit();
        } else {
            alert("수정이 취소되었습니다.");
        }
    }
</script>