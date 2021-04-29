<section>
  <div class="write_class">
    <h1> <?= esc($SNO, 'html') ?> 번 게시물</h1>
    <div class="sub">
      <div class="sub_divide">
        <div class="sub_content">
          <label> 제목 </label>
          <p> <?= esc($SUBJECT_NAME, 'html') ?> </p>
        </div>

        <div class="writer">
          <label> 작성자 </label>
          <p> <?= esc($WRITER, 'html') ?> </p>
        </div>
        <div class="writeDate">
          <label> 작성일 </label>
          <p> <?= esc($DATE_CHAR, 'html') ?> </p>
        </div>
        <div class="writeDate">
          <label> 조회 수 </label>
          <p> <?= esc($HIT, 'html') ?> </p>
        </div>
      </div>
    </div>

    <br>

    <div class="content">
      <div class="main_content">
        <label> 내용 </label>
        <p> <?= esc($CONTENT, 'html') ?> </p>
      </div>
    </div>

    <div>
      <h5> <a class="edit" href="/Boards/edit/<?= esc($SNO, 'html') ?>"> 수정 </a></h5>
      <h5> <a class="delete" onclick="removeContent()"> 삭제 </a></h5>
      <h5> <a class="goboard" href="/Boards"> 보드로 가기 </a></h5>
    </div>
  </div>
</section>

<script type="text/javascript">
    function removeContent() {
        if(confirm("<?=$SNO?>번 게시글을 삭제하시겠습니까?")) {
            location.href = "/Boards/remove/<?=$SNO?>";
        } else {
            alert("취소되었습니다.");
        }
    }
</script>