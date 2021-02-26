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

            min-width: 600px;
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
        .home {

        }
        a {
            text-decoration: none;
            color: black;
            transition: color, background 0.5s;
            border-radius: 2px;
            margin: 2px;
            padding: 2px;
        }
        a:hover {
            color: white;
            background: black;
        }
        /*table td, table th, table tr { border: 1px solid black; }*/
	</style>
</head>

<body>
<div class="board">
    <a class="home" href="/"> 홈으로 </a>
    <!-- HEADER: MENU + HEROE SECTION -->
    <div class="log">
        <a href="#"> 로그인 </a>
    </div>

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
                    <th> 작성 날짜 </th>
                    <th> 수정 </th>
                    <th> 삭제 </th>
                </tr>
            </thead>
            <tbody>
            <?php for($i = 0; $i < count($SNO); $i++) { ?>
            <tr>
                <td><input class="getCheck" type="checkbox" id=""> </td>
                <td> <?= $SNO[$i]; ?> </td>
                <td> <?= $SUBJECT_NAME[$i]; ?> </td>
                <td> <?= $CONTENT[$i]; ?> </td>
                <td> <?= $WRITER[$i]; ?> </td>
                <td> <?= $DATE_CHAR[$i]; ?> </td>
                <td> <a class='edit' href='/boards/1/post/<?= $SNO[$i]; ?>'> 수정 </a> </td>
                <td> <a class='delete' href='/boards/1'> 삭제 </a> </td>
            </tr>
            <?php } ?>
            <?php //for($i = 0; $i < count($SNO); $i++) {
//                echo "<tr>";
//                echo "<td>" . "<input class='getCheck' type='checkbox' id='" . $i . "'/>" . "</td>";
//                echo "<td>" . $SNO[$i] . "</td>";
//                echo "<td>" . $SUBJECT_NAME[$i]."</td>";
//                echo "<td>" . $CONTENT[$i] ."</td>";
//                echo "<td>" . $WRITER[$i] . "</td>";
//                echo "<td>" . $DATE_CHAR[$i] . "</td>";
//                echo "<td>" . "<a class='edit' href='/boards/'".$i.">" . "수정" . "</a>" . "</td>";
//                echo "<td>" . "<a class='delete' href='/boards/delete'" . ">" . "삭제" . "</a>" . "</td>";
//                echo "</tr>";
//                }
//            ?>
            </tbody>
        </table>
    </div>

    <div class="button_class">
        <div class="write">
            <a class="write_add" href="/boards/1/post"> 글 작성 </a>
        </div>
    </div>

    <!-- script -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        var i = 0;
        $(".getCheck").on("click", function(e) {
            console.log( $('input:checkbox[id="0"]').val() );
        });
    </script>
</body>
</html>
