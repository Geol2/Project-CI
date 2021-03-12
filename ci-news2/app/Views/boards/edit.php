<section>
    <div class="write_class">
        <p> 게시물 수정 페이지 </p>
        <h1> <?= esc( $SNO, 'html') ?>번 글 수정하기 </h1>
        <form name="contentForm" id="contentForm" method="post" action="/Boards/update/<?= esc( $SNO, 'url') ?>">
            <div>
                <label for="sub"> 제목 </label>
                <input class="sub" type="text" id="sub" name="sub" value="<?= esc( $SUBJECT_NAME, 'html') ?>" maxlength='20'>
            </div>
            <div>
                <label for="content"> 내용 </label>
                <textarea class="content" id="content" name="content" cols="30" rows="10" placeholder="" maxlength='200'><?= esc( $CONTENT, 'html') ?></textarea>
            </div>
            <br>
            <div>
                <label for="writer"> 작성자 </label>
                <input class="writer" type="text" id="writer" name="writer" maxlength='20' value="<?= esc( $WRITER, 'html') ?>" readonly>
            </div>
            <div class="divide">
                <div class="divsubmit">
                    <input class="submit" type="submit" value="전송">
                </div>
                <div>
                    <a class="cancel" href="/Boards/<?= esc( $SNO, 'html') ?>"> 취소 </a>
                </div>
            </div>
        </form>
    </div>
</section>