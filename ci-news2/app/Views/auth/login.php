<section>
  <div class="write_class">
    <h1> 로그인 (구현예정) </h1>

    <form name="loginForm" id="registerForm" method="post" action="/Auth/login">
      <div>
        <label for="id"> 아이디 </label>
        <input name="id" id="id" type="text"  placeholder="아이디" maxlength='20' class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" >
      </div>
      <div>
        <label for="password"> 비밀번호 </label>
        <input name="password" id="password" type="password" placeholder="비밀번호" maxlength='20'>
      </div>
      <br>
      <div>
        <input id="submitBtn" class="submit" type="submit" value="전송">
      </div>
    </form>
    <div>
      <a href="/Boards"> 취소 </a>
    </div>
  </div>
</section>
<?php
