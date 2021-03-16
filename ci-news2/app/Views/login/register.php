<section>
    <div class="write_class">
        <h1> 회원가입 (구현예정) </h1>

        <form name="registerForm" id="registerForm" method="post" action="/sign/register">
            <div>
                <label for="id"> 아이디 </label>
                <input name="id" id="id" type="text"  placeholder="아이디" maxlength='20'>
            </div>
            <div class="mail">
                <label for="mail"> 이메일 </label>
                <input name="mail" id="mail" type="text"  placeholder="아이디" maxlength='20'>
<!--                <button> 이메일 인증 </button>-->
            </div>
            <div>
                <label for="password"> 비밀번호 </label>
                <input name="password" id="password" type="text" placeholder="비밀번호" maxlength='20'>
            </div>
            <div>
                <label for="password_re"> 비밀번호 재입력 </label>
                <input name="password_re" id="password_re" type="text" placeholder="비밀번호 재입력" maxlength='20'>
            </div>
            <br>
            <div>
                <label for="name"> 이름 </label>
                <input name="name" id="name" type="text"  placeholder="이름" maxlength='10'>
            </div>
            <div>
                <input id="submitBtn" class="submit" type="submit" value="전송">
            </div>
        </form>
        <div>
            <a href="/Boards"> 취소 </a>
        </div>
    </div>
</section>