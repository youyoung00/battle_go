<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            href="style.css" rel="stylesheet" type="test/css">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js">
        </script>
            <style>
        body{
            background-color: bisque;
            display: inline-flex;
            text-align: center;
        }

        form{
            position: absolute;
            display: flex;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        #inputBox{
            width: 200px;
            height: 50px;
        }
        .card{
            background-color: #fff;
            max-width: 400px;
            display: flex;
            flex-direction:column;
            overflow: hidden;
            border-radius: 2rem;
            box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
        }

        .banner{
         background-image: url("https://cdn.pixabay.com/photo/2017/04/20/10/11/questions-2245264__480.jpg"); 
         background-size: cover; 
         display: flex;
         justify-content: center;
        }

        .profile{
        width: 8rem;
        height: 8rem;
        background-image: url("https://cdn.pixabay.com/photo/2020/06/17/12/33/watermelon-5309310__480.png");
        background-size: cover;
        border-radius: 50%;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
        transform: translateY(50%);
        transition: transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
        }
        .profile:hover {
            transform: translateY(50%) scale(1.3);
        }
        .name {
            text-align: center;
            padding-top: 80px ;
        }
        .join_btn{
            padding: 0.2 rem;
            justify-content: center;
        }
        .w-btn {
        position: relative;
        border: none;
        display: inline-block;
        padding: 15px 30px;
        border-radius: 15px;
        font-family: "paybooc-Light", sans-serif;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        font-weight: 600;
        transition: 0.25s;
        transform: translateY(50%);
        transition: transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
        }
        .w-btn:hover {
            transform: translateY(50%) scale(1.3);
        }

         .w-btn-gray-outline:hover {
            background-color: #a3a1a1;
            color: #e3dede;
        }
        .w-btn-gra1 {
        background: linear-gradient(-45deg, #33ccff 0%, #ff99cc 100%);
        color: white;
        }

        .w-btn-gra2 {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            color: white;
        }

        .w-btn-gra3 {
            background: linear-gradient(
                45deg,
                #ff0000,
                #ff7300,
                #fffb00,
                #48ff00,
                #00ffd5,
                #002bff,
                #7a00ff,
                #ff00c8,
                #ff0000
            );
            color: white;
        }

        .w-btn-gra-anim {
            background-size: 400% 400%;
            animation: gradient1 5s ease infinite;
        }
        @keyframes gradient1 {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes gradient2 {
            0% {
                background-position: 100% 50%;
            }
            50% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }
        
    </style>
    </head>

    <body> 
    <br /><br />
        <form method="post" action="/index.php/member/insert">

           <div class="card">
                <div class="banner"> 
                     <div class="profile"></div>
                </div>  
                <h2 class="name">회원가입</h2>
                <div></div>
                <div class="row form-floating mt-3"> 아이디 <input type="text" name="email" class="inputBox"></div> <br /><br /> 
                <div class="row form-floating mb-3 mt-3">  패스워드 <input type="password" name="password" class="inputBox"></div> <br /><br />

                <div class="row form-floating mb-3 mt-3">  닉네임 <input type="text" name="nickname" class="inputBox"></div> <br /><br />
                <div class="row form-floating mb-3 mt-3"> 급수
                    <select name="grade">
                        <option value="0">선택해주세요</option>
                        <option value="1">18급</option>
                        <option value="2">17급</option>
                        <option value="3">16급</option>
                        <option value="4">15급</option>
                        <option value="5">14급</option>
                    </select><br /><br />
                </div>
                <div class="join_btn"> <input type="submit" value="회원가입하기" class="w-btn w-btn-gra3 w-btn-gra-anim"><br><br> </div><br /><br />
            </div>
        </form>
    </body>

</html>