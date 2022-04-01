<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js">
        </script>
            <style>
        body{
            background-color: bisque;
            text-align: center;
        }

        form{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        
    </style>
    </head>

<br />
<br />
<form method="post" action="/index.php/member/insert">
        회원가입 <br><br/>
    아이디  <input type="text" name="email"> <br /><br />
    패스워드  <input type="password" name="password"> <br /><br />
    닉네임  <input type="text" name="nickname"> <br /><br />
    급수
    <select name="grade">
        <option value="0">선택해주세요</option>
        <option value="1">18급</option>
        <option value="2">17급</option>
        <option value="3">16급</option>
        <option value="4">15급</option>
        <option value="5">14급</option>
    </select><br><br />
    <input type="submit" value="회원가입하기" class="btn btn-warning">
</form>

</html>