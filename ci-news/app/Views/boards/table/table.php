<?php
  /* @var object $pager
   * @var object $this
   * */
?>
<section>
  <section class="board">
  <h1 class="chart_name"> 일반 토론장 </h1>
    <div class="chart">
      <table>
        <colgroup>
          <col width="5%"/>
          <col width="5%"/>
          <col width="20%"/>
          <col width="30%"/>
          <col width="10%"/>
          <col width="15%"/>
          <col width="5%"/>
          <col width="10%"/>
        </colgroup>
          <thead>
            <tr>
              <th><label for="allCheck"></label><input id="allCheck" type="checkbox" value="ALL"> </th>
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
              <?php for($i = count($this->{'data'}['content']) - 1; $i >= 0; $i--) { ?>
                <tr>
                  <td><label><input type="checkbox" /></label></td>
                  <td> <?= $this->{'data'}['content'][$i]['SNO'] ?> </td>
                  <td> <?= $this->{'data'}['content'][$i]['SUBJECT_NAME'] ?> </td>
                  <td> <?= $this->{'data'}['content'][$i]['CONTENT'] ?> </td>
                  <td> <?= $this->{'data'}['content'][$i]['WRITER'] ?> </td>
                  <td> <?= $this->{'data'}['content'][$i]['created_at'] ?> </td>
                  <td > <a class="table show" href="/Boards/<?= $this->{'data'}['content'][$i]['SNO'] ?>"> 보기 </a>  </td>
                  <td> <?= $this->{'data'}['content'][$i]['HIT'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
      </table>
      <div class="paging">
        <nav aria-label="Page navigation">
          <?= $pager->links(); ?>
        </nav>
      </div>
    </div>