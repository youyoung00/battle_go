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
        .w-btn-outline:active {
            transform: scale(1.5);
        }
        .w-btn:hover {
            letter-spacing: 2px;
            transform: scale(1.2);
            cursor: pointer;
        }

        .w-btn-outline:hover {
            letter-spacing: 2px;
            transform: scale(1.2);
            cursor: pointer;
        }

        .w-btn:active {
            transform: scale(1.5);
        }
        .w-btn-red-outline:hover {
            background-color: #ff5f2e;
            color: #e1eef6;
        }
        .w-btn-red-outline {
            border: 3px solid #ff5f2e;
            color: #6e6e6e;
        }
        .w-btn-red {
            background-color: #ff5f2e;
            color: #e1eef6;
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
        }
        </style>
    </head>
    <body>
    <form method="post" action="">
        <div id="waitpage">왜 그랬어요.. 
            <?php 
                
                if($win_color == 0){
                    echo " (흑)".$nick_name."님의 패배! ";
                    
                } else{
                    echo " (백)".$nick_name."님의 패배! ";
                    
                }
                
            ?>
        </div><br /><br /> 
        <div class="row col-15 mb-3 mt-3">
            <input type="submit" value="대기실로 이동" class="w-btn-outline w-btn-red-outline">
        </div>
    </form>
    </body>
</html>