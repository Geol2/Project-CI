<section>
  <div class="write_class">
    <h1> <?= esc($SNO, 'html') ?> 번 게시물</h1>
    <div class="sub">
      <div class="sub_divide">
        <div class="sub_content">
          <label style="font-weight: bold"> 제목 </label>
          <p><?= esc($SUBJECT_NAME, 'html') ?> </p>
        </div>

        <div class="writer">
            <label style="font-weight: bold"> 작성자 </label>
            <p> <?= esc($WRITER, 'html') ?> </p>
        </div>
        <div class="write">
            <label style="font-weight: bold"> 작성일 </label>
            <p><?= esc($DATE_CHAR, 'html') ?> </p>
        </div>
      </div>
    </div>

    <br>

    <div class="content">
      <div class="main_content">
        <label style="font-weight: bolder"> 내용 </label>
        <p> <?= esc($CONTENT, 'html') ?> </p>
<!--                    <div id="viewer"><p>--><?//= esc($CONTENT, 'html') ?><!--</p></div>-->
      </div>
    </div>

    <div>
      <h5> <a class="edit" href="/Boards/edit/<?= esc($SNO, 'html') ?>"> 수정 </a></h5>
      <h5> <a class="delete" href="/Boards/remove/<?= esc($SNO, 'html') ?>"> 삭제 </a></h5>
      <h5> <a class="goboard" href="/Boards"> 보드로 가기 </a></h5>
    </div>
  </div>
</section>