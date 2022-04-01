<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- <style>
            body {
                background-color: bisque;
                text-align: center;
            }
            form {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            #inputBox {
                width: 200px;
                height: 50px;
            }
        </style> -->

<style>
        body{
            background-color: bisque;
            display: inline-flex;
            text-align: center;
        }

            #inputBox {
                width: 200px;
                height: 50px;
            }

        form{
            position: absolute;
            display: flex;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        

        

        
    </style>

    </head>
    <body>
        <form method="post" action="/index.php/game/board_create">
            <div>방만들기</div><br/><br/>
            방이름
            <input type="text" name="title" class="inputBox"><br/><br/>
            <div>동 색
                <select name="color">
                    <option value="0">백돌</option>
                    <option value="1">흑돌</option>
                </select>
            </div>
            <br/><br/>
            <input type="submit" value="방 만들기" class="btn btn-warning active"><br/><br/>
            <a href="/index.php/game/game_list">뒤로가기</a>
        </form>
    </body>
</html>