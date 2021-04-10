<?php
use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
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

            </tbody>
      </table>
      <div class="paging">
        <nav aria-label="Page navigation">
        </nav>
        <?= $pager->links() ?>
      </div>

      <div id="test"> </div>
    </div>

  <script type="text/javascript">
      function hit(num) {

      }
  </script>