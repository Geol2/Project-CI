<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>게시판!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
	<style>
        @font-face {
            font-family: 'GmarketSansLight';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2001@1.1/GmarketSansLight.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        .board {
            font-family: 'GmarketSansLight';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .content {
            margin: 10px;
        }
        .button_class {
            display: flex;
        }
        .write, .delete, .edit {
            margin: 10px;
        }
        .chart {
            position: relative;
        }

        /*table td, table th, table tr { border: 1px solid black; }*/
	</style>
</head>

<body>
<div class="board">
    <a href="/"> 홈으로 </a>
    <!-- HEADER: MENU + HEROE SECTION -->
    <div class="log">
        <a href="#"> 로그인 </a>
    </div>

    <div class="chart">
        <table>
            <tr>
                <th> <input type="checkbox" value="ALL"> </th>
                <!-- 위에 체크박스 클릭 시 아래의 체크박스 전체 선택/해제 토글 -->
                <th> 번호 </th>
                <th> 제목 </th>
                <th> 내용 </th>
                <th> 작성자 </th>
                <th> 작성 날짜 </th>
                <th> 좋아요 </th>
            </tr>

            <?php for($i = 0; $i < count($SNO); $i++) {
                echo "<tr>";
                    echo '<td> <input type="checkbox" value="'.$i.'"> </td>';
                    echo "<td>" . $SNO[$i] . "</td>";
                    echo "<td>" . $SUBJECT_NAME[$i] . "</td>";
                    echo "<td>" . $CONTENT[$i] . "</td>";
                    echo "<td>" . $WRITER[$i] . "</td>";
                    echo "<td>" . $DATE_CHAR[$i] . "</td>";
                echo "</tr>";
                }
            ?>
        </table>
    </div>

    <div class="button_class">
        <div class="write">
            <a href="/boards/write"> 글 작성 </a>
        </div>
        <div class="edit">
            <a href="#"> 글 수정 </a>
        </div>
        <div class="delete">
            <a href="/home"> 글 삭제 </a>
        </div>
    </div>
</body>
</html>
