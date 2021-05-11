
<section>
  <div class="write_class">
    <h1> 로그인 </h1>

<!--    <form name="loginForm" id="registerForm" method="post" action="/Auth/loginProc">-->
      <div>
        <label for="id"> 아이디 </label>
        <input name="id" id="id" type="text"  placeholder="아이디" maxlength='20' >
      </div>
      <div>
        <label for="password"> 비밀번호 </label>
        <input name="password" id="password" type="password" placeholder="비밀번호" maxlength='20'>
      </div>
      <br>
      <div>
        <button id="submitBtn" class="submit" onclick="loginProc()" > 전송 </button>
      </div>
<!--    </form>-->
    <div>
      <a href="/Boards"> 취소 </a>
    </div>
  </div>
</section>

<script type="text/javascript">
  function loginProc() {
    // let id = document.getElementById("id").value;
    // let password = document.getElementById("password").value;
    //
    // const loginData = {
    //   id : id,
    //   password: password
    // };
    // let jsonData = JSON.stringify(loginData);
    //
    // debugger;
    //
    // let xhr = new XMLHttpRequest();
    // xhr.open('post', '/Auth/loginProc');
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // xhr.onreadystatechange = function () {
    //   console.log(this);
    //   if(this.readyState === 4 && this.status === 200) {
    //     console.log(this);
    //   }
    // };
    // xhr.send(jsonData);

    // $.ajax({
    //   url: '/Auth/loginProc',
    //   // headers: {'X-Requested-with' : 'XMLHttpRequest'},
    //   data: loginData,
    //   type: 'post',
    //   dataType: 'json',
    //   success: function(res) {
    //     console.log(res);
    //     if( res.code === 200 ) {
    //       alert("로그인 되었습니다.");
    //     } else {
    //       alert("아이디와 패스워드를 다시 확인해주세요.");
    //     }
    //   },
    //   error: function(res) {
    //     console.log(res);
    //     alert("시스템에 문제가 발생하였습니다.");
    //   },
    //   complete: function(res) {
    //     // console.log(res.responseJSON);
    //     if( res.responseJSON.code === 200 ) {
    //       location.href = '/';
    //     }
    //   }
    // });
  }
</script>