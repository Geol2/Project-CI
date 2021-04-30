<section>
  <div class="write_class">
    <h1> 회원가입 </h1>

<!--    <form name="registerForm" id="registerForm" method="post" action="/Auth/register">-->
      <div>
        <label for="id"> 아이디 </label>
        <input name="id" id="id" type="text" placeholder="아이디" maxlength='20'>
      </div>
      <div class="mail">
        <label for="mail"> 이메일 </label>
        <input name="mail" id="mail" type="text" placeholder="아이디" maxlength='20'>
        <!--                <button> 이메일 인증 </button>-->
      </div>
      <div>
        <label for="name"> 이름 </label>
        <input name="name" id="name" type="text" placeholder="이름" maxlength='10'>
      </div>
      <div>
        <label for="password"> 비밀번호 </label>
        <input name="password" id="password" type="password" placeholder="비밀번호" value="" maxlength='20' >
      </div>
      <div>
        <label for="password_re"> 비밀번호 재입력 </label>
        <input name="password_re" id="password_re" type="password" placeholder="비밀번호 재입력" value="" maxlength='20'>
        <button onclick="dupPassword()" class="check password"> 비밀번호 확인 </button>
      </div>
      <br>
      <div>
        <input onclick="submit()" id="submitBtn" class="submit" type="submit" value="전송">
      </div>
<!--    </form>-->
    <div>
      <a href="/Boards"> 취소 </a>
    </div>
  </div>
</section>

<script type="text/javascript">
  let checkPassword = false;

  function dupPassword() {
    let password = document.getElementById("password").value;
    let password_re = document.getElementById("password_re").value;

    if(password === password_re) {
      alert("비밀번호가 일치합니다.");
      checkPassword = true;
    } else {
      alert("비밀번호가 일치하지 않습니다.");
    }
  }

  function submit() {
    debugger;

    if(checkPassword === false) {
      alert("비밀번호 확인이 필요합니다.");
    } else {
      let id = document.getElementById("id").value;
      let mail = document.getElementById("mail").value;
      let password = document.getElementById("password").value;
      let name = document.getElementById("name").value;

      let inputHiddenId = document.createElement("input");
      let inputHiddenMail = document.createElement("input");
      let inputHiddenPassword = document.createElement("input");
      let inputHiddenName = document.createElement("input");

      let form = document.createElement("form");
      form.setAttribute("charset", "UTF-8");
      form.setAttribute("method", "post");
      form.setAttribute("action", "/Auth/register");

      inputHiddenId.setAttribute("type", "hidden");
      inputHiddenId.setAttribute("name", "id");
      inputHiddenId.setAttribute("value", id);

      inputHiddenPassword.setAttribute("type", "hidden");
      inputHiddenPassword.setAttribute("name", "password");
      inputHiddenPassword.setAttribute("value", password);

      inputHiddenMail.setAttribute("type", "hidden");
      inputHiddenMail.setAttribute("name", "mail");
      inputHiddenMail.setAttribute("value", mail);

      inputHiddenName.setAttribute("type", "hidden");
      inputHiddenName.setAttribute("name", "name");
      inputHiddenName.setAttribute("value", name);

      form.append(inputHiddenId);
      form.appendChild(inputHiddenPassword);
      form.appendChild(inputHiddenMail);
      form.appendChild(inputHiddenName);
      
      alert("회원가입이 완료되었습니다.");

      document.body.appendChild(form);
      form.submit();
    }
  }
</script>