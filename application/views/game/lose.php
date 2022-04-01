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
        </style>
    </head>
    <body>
    <form method="post" action="game_list.php">
        <div id="waitpage">왜 그랬어요..</div><br /><br /> 
        <div class="row col-15 mb-3 mt-3">
            <input type="submit" value="대기실로 이동" class="btn btn-primary active">
        </div>
    </form>
    </body>
</html>