<!-- STYLES -->
<style>
    @font-face {
        font-family: 'GmarketSansLight';
        src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansLight.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'GmarketSansBold';
        src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansBold.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    * {
        cursor: default;
    }

    h1 {
        font-family: 'GmarketSansBold';
    }
    a {
        text-decoration: none;
        color: black;
        transition: color, background 0.5s;
        border-radius: 2px;
        margin: 2px;
        padding: 2px;
        font-weight: 500;
        font-size: 18px;
        cursor: pointer;
    }
    a:hover {
        color: white;
        background: black;
        transition: color, background 0.5s;
    }
    table {
        width: 100%;
        border-top: 1px solid #444444;
        border-collapse: collapse;
        text-align: center;
    }

    td {
        font-size: 15px;
        font-weight: 600;
        border-bottom: 1px solid #444444;
        padding: 10px;
    }
    .board {
        font-family: 'GmarketSansLight';


        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        min-width: 800px;
        margin: 20px;
        padding: 20px;

        border: 4px solid #bcbcbc;
        border-radius: 10px;
    }
    .chart {
        position: relative;
    }
</style>
<div class="board">
    <h1 class="chart_name"> 보드 게시판 </h1>
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
            <?php for($i = count($SNO) - 1 ; $i >= 0 ; $i--) { ?>
            <?php // for($i = 0; $i < count($SNO); $i++) { ?>
            <tr>
                <td><input class="getCheck" type="checkbox" id=""> </td>
                <td> <?= $SNO[$i]; ?> </td>
                <td> <?= $SUBJECT_NAME[$i]; ?> </td>
                <td> <?= $CONTENT[$i]; ?> </td>
                <td> <?= $WRITER[$i]; ?> </td>
                <td> <?= $DATE_CHAR[$i]; ?> </td>
                <td> <a class='edit' href='/Boards/<?= esc( $SNO[$i], 'url' ); ?>'> 보기 </a> </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
