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
        .content {
            margin: 10px;
        }
        .button_class {
            display: flex;
        }
        .write, .delete {
            margin: 10px;
        }
        .chart {
            position:center;
        }

        /*table td, table th, table tr { border: 1px solid black; }*/
	</style>
</head>

<body>
    <a href="/"> 홈으로 </a>
    <!-- HEADER: MENU + HEROE SECTION -->
    <div class="log">
        <a href="#"> 로그인 </a>
    </div>

    <div class="chart">
        <table>
            <tr>
                <th> <input type="checkbox"> </th>
                <!-- 위에 체크박스 클릭 시 아래의 체크박스 전체 선택/해제 토글 -->
                <th> 인덱스 </th>
                <th> 제목 </th>
                <th> 내용 </th>
                <th> 날짜 </th>
                <th> 작성자 </th>
                <th> 좋아요 </th>
            </tr>
            <tr> <!-- 인덱스 열 -->
                <td> <input type="checkbox"> </td>
                <td> 1 </td>
                <td> 1</td>
            </tr>
            <tr> <!-- 제목 -->
                <td> <input type="checkbox"> </td>
                <td> 2 </td>
            </tr>
            <tr> <!-- 내용 -->
                <td> <input type="checkbox"> </td>
                <td> 3 </td>
            </tr>
            <tr> <!-- 날짜 -->
                <td> <input type="checkbox"> </td>
                <td> 4 </td>
            </tr>
            <tr> <!-- 작성자 -->
                <td> <input type="checkbox"> </td>
                <td> 5 </td>
            </tr>
            <tr> <!-- 좋아요 -->
                <td> <input type="checkbox"> </td>
                <td> 6 </td>
            </tr>
            <tr>
                <td> <input type="checkbox"> </td>
                <td> 7 </td>
            </tr>
        </table>
    </div>

    <div class="button_class">
        <div class="content">
            <a href="/"> 목록 </a>
        </div>

        <div class="write">
            <a href="/board/write"> 글 작성 </a>
        </div>

        <div class="delete">
            <a href="/"> 글 삭제 </a>
        </div>
    </div>
</body>
</html>
