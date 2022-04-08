<html>
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
            background-size: cover;
            display: flex;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        #inputBox {
            width: 200px;
            height: 50px;
        }
        .card{
            background-color: #fff;
            max-width: 100%;
            display: flex;
            background-size: cover;
            flex-direction:column;
            overflow: hidden;
            border-radius: 2rem;
            box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
        }

        .banner{
         background-image: url("https://media.istockphoto.com/photos/go-the-extra-mile-on-wooden-blocks-picture-id1076408078?b=1&k=20&m=1076408078&s=170667a&w=0&h=snLy3RypJtZ48BYVZkcM7uWttofqvNMM64oDc1zmG1Y="); 
         background-size: cover; 
         display: flex;
         justify-content: center;
        }

        .profile{
        width: 8rem;
        height: 8rem;
        background-image: url("https://cdn.pixabay.com/photo/2015/07/10/11/11/luck-839037__480.jpg");
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
        }

        .w-btn-outline {
        position: relative;
        padding: 15px 30px;
        border-radius: 15px;
        font-family: "paybooc-Light", sans-serif;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        font-weight: 600;
        transition: 0.25s;
        background-color: black;
        color: white;
        }
        .w-btn-yellow-outline:hover {
        background-color: #fce205;
        color: black;
         }



    </style>

    </head>
    <body>
        <form method="post" action="/index.php/game/board_create">
            <div class="card">
                <div class="banner">
                    <div class="profile"></div>
                </div>
                <h2 class="name">방 만들기</h2>
                <div class="row form-floating mt-3">방이름 <input type="text" name="title" class="inputBox"><br /><br /></div>
                <div class="row form-floating mb-3 mt-3">동색
                    <select name="color">
                        <option value="0">흑돌</option>
                        <option value="1">백돌</option>
                    </select><br /><br />
                </div>
                <div> <input type="submit" value="방 만들기" class="w-btn-outline w-btn-yellow-outline"><br /><br /></div> 
                <a href="/index.php/game/game_list">뒤로가기</a>
            </div>
        </form>

    </body>
</html>
