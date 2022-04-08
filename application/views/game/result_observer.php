<html>
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
            
        div{
            display: inline-block;
        }
        html, body {
            width: 100%;  
            height: 100%;
            background: bisque;
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center;
            align-items: center;
        } 

        form{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        #waitpage{
            font-size: xx-large;
        }

        #inputBox{
            width: 200px;
            height: 50px;
        }
        .w-btn {
        position: relative;
        border: none;
        display: inline-block;
        padding: 10px 30px;
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
    <form method="post" action="/index.php/game/game_list">
        <div id="waitpage">대국 결과 : 
            <?php 
                if($win_color == 0){
                    echo "(흑)".$nick_name."님의 승리! ";
                    // echo $nick_name." ".$win_color;
                } else{
                    echo "(백)".$nick_name."님의 승리! ";
                    // echo $nick_name." ".$win_color;
                }
            ?>
    </div><br /><br /> 
        <div class="row col-15 mb-3 mt-3">
            <input type="submit" value="대기실로 이동" class="w-btn w-btn-gra3 w-btn-gra-anim">
        </div>
    </form>
    </body>
</html>