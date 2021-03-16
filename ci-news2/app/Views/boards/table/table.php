<section>
  <section class="board">
  <h1 class="chart_name"> 일반 토론장 </h1>
    <div class="chart">
      <table>
        <colgroup>
          <col width="5%"/>
          <col width="5%"/>
          <col width="20%"/>
          <col width="35%"/>
          <col width="10%"/>
          <col width="15%"/>
          <col width="5%"/>
          <col width="5%"/>
        </colgroup>
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
              <th> 조회수 </th>
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
                <td> <?= $list[$i]['HIT']; ?> </td>
              </tr>
            <?php } ?>
            </tbody>
      </table>
      <div class="paging">
<!--        --><?php
//          echo '$start_page : '.$start_page.'<br>';
//          echo '$end_page : '.$end_page.'<br>';
//          echo '$prev_page : '.$prev_page.'<br>';
//          echo '$next_page : '.$next_page.'<br>';
//          echo '$page : '.$page.'<br>';
//          echo '$count : '.$count.'<br>';
//        ?>

        <?php if( $start_page > 1 ) { ?>
          <a class='move_btn' href="/Boards?page=<?=$prev_page?>">« 이전</a>
          <a class='pagenum' href="/Boards?page=<?=1?>">1</a> ...
        <?php } else { ?>
<!--            <span class='move_btn disabled'>« 이전</span>-->
        <?php } ?>

        <?php for( $p = $start_page; $p <= $end_page; $p++ ) { ?>
            <a class='this' href="<?= "/Boards?page=$p" ?>">
              <?= $p ?>
            </a>
        <?php } ?>

        <?php if( $end_page < $count ) { ?>
            ... <a class='pagenum' href="<?= "/Boards?page=$count" ?>"><?= $count ?></a>
            <a class='move_btn' href="<?= "/Boards?page=$next_page" ?>">다음 »</a>
        <?php } else { ?>
<!--            <span class='move_btn disabled'>다음 »</span>-->
        <?php } ?>
      </div>

      <div id="test"> </div>
    </div>

  <script type="text/javascript">
      function hit(num) {

      }
  </script>