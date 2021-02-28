<style>
    * {
        font-family: 'GmarketSansLight';
    }
    .write_class {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        min-width: 400px;
    }
    a {
        text-decoration: none;
        color: black;
        cursor: pointer;
        transition: color, background 0.5s;
        border-radius: 2px;
        margin: 2px;
        padding: 2px;
    }
    a:hover {
        color: white;
        background: black;
    }
    .sub_divide{
        display: flex;
        border-radius: 5px;
    }
    .sub_content, .write, .writer {
        margin-left: auto;
        margin-right: auto;
    }
    .main_content {
        border-radius: 5px;
        padding: 30px;
    }
    label {
        font-weight: 900;
    }
</style>
<div class="write_class">
    <h1> <?= esc($SNO, 'html') ?> 번 게시물</h1>
    <div class="sub">
        <div class="sub_divide">
            <div class="sub_content">
                <label> 제목 </label>
                <p><?= esc($SUBJECT_NAME, 'html') ?> </p>
            </div>

            <div class="writer">
                <label> 작성자 </label>
                <p> <?= esc($WRITER, 'html') ?> </p>
            </div>
            <div class="write">
                <label> 작성일 </label>
                <p><?= esc($DATE_CHAR, 'html') ?> </p>
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
        <h5> <a href="/Boards/edit/<?= esc($SNO, 'html') ?>"> 수정 </a></h5>
        <h5> <a href="/Boards/remove/<?= esc($SNO, 'html') ?>"> 삭제 </a></h5>
        <h5> <a href="/Boards"> 보드로 가기 </a></h5>
    </div>
</div>

