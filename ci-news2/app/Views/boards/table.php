<section>
    <section class="board">
    <h1 class="chart_name"> 게시판 </h1>
    <div class="chart">
        <table>
            <thead>
            <tr>
                <th> <input id="allCheck" type="checkbox" value="ALL"> </th>
                <!-- 위에 체크박스 클릭 시 아래의 체크박스 전체 선택/해제 토글 -->
                <th> 번호 </th>
                <th> 제목 </th>
                <th> 내용 </th>
                <th> 작성자 </th>
                <th> 작성일 </th>
                <th> 보기 </th>
            </tr>
            </thead>
            <tbody>
            <?php for($i = count($list) - 1 ; $i >= 0 ; $i--) { ?>
                <tr>
                    <td><input class="getCheck" type="checkbox" id=""> </td>
                    <td> <?= $list[$i]['SNO']; ?> </td>
                    <td> <?= $list[$i]['SUBJECT_NAME']; ?> </td>
                    <td> <?= $list[$i]['CONTENT']; ?> </td>
                    <td> <?= $list[$i]['WRITER']; ?> </td>
                    <td> <?= $list[$i]['DATE_CHAR']; ?> </td>
                    <td> <a class='show' href='/Boards/<?= esc( $list[$i]['SNO'], 'url' ); ?>'> 보기 </a> </td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
        <div class="paging">
            <?php for($i = 1; $i <= $count; $i++) { ?>
            <a href="/Boards?page=<?= $i ?>"> <?= $i ?> </a>
            <?php } ?>
        </div>

        <div id="test"> </div>
    </div>