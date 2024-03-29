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
        <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

        <style>

        body{
        background-color: bisque;
        display: inline-flex;
        text-align: center;
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

        h2 {
        height: 100px;
        }

        h2 span {
                position: relative;
                top: 10px;
                display: inline-block;
                animation: bounce .3s ease infinite alternate;
                font-family: 'Titan One', cursive;
                font-size: 40px;
                color: #FFF;
                text-shadow: 0 1px 0 #CCC,
                    0 2px 0 #CCC,
                    0 3px 0 #CCC,
                    0 4px 0 #CCC,
                    0 5px 0 #CCC,
                    0 6px 0 transparent,
                    0 7px 0 transparent,
                    0 8px 0 transparent,
                    0 9px 0 transparent,
                    0 10px 10px rgba(0, 0, 0, .4);
            }

                h2 span:nth-child(2) { animation-delay: .1s; }
                h2 span:nth-child(3) { animation-delay: .2s; }
                h2 span:nth-child(4) { animation-delay: .3s; }
                h2 span:nth-child(5) { animation-delay: .4s; }
                h2 span:nth-child(6) { animation-delay: .5s; }
                h2 span:nth-child(7) { animation-delay: .6s; }
                h2 span:nth-child(8) { animation-delay: .7s; }

            @keyframes bounce {
            100% {
                top: -20px;
                text-shadow: 0 1px 0 #CCC,
                    0 2px 0 #CCC,
                    0 3px 0 #CCC,
                    0 4px 0 #CCC,
                    0 5px 0 #CCC,
                    0 6px 0 #CCC,
                    0 7px 0 #CCC,
                    0 8px 0 #CCC,
                    0 9px 0 #CCC,
                    0 50px 25px rgba(0, 0, 0, .2);
                }
            }

            .wait_font{
            transform: translate(3%, 50%);
            margin-bottom: 80%;
            }
        </style>
    </head>
    <body>
    <form method="post" action="/index.php/game/play">
        <div id="waitpage">상대방 기다리는 중</div><br /><br /> 
        <div class="row col-15 mb-3 mt-3">
            <input type="button" value="방폭파" onClick="location.href='/index.php/game/game_delete?board_id=<?php echo $board_id?>';" class="btn btn-warning active" ><br /><br />
            <input type="submit" value="게임화면 이동하기" class="btn btn-warning active">
        </div>
    </form>

    </body>

    <script>
        let timerId = setInterval(() => set_wait(), 500);

        function set_wait(){
            // var formData = $("#chat-form").serialize();

        $.ajax({
            cache : false,
            url : "/index.php/game/wait_check?board_id=<?php echo $board_id?>", // 
            type : 'GET', 
            // data : formData, 
            // settimeout : 500,
            success : function(data) {
                // console.log(data);
                
                const obj = JSON.parse(data);

                // let status = obj["board_data"]["status"];
                console.log(obj);

            if(obj["status"] == 1){
                $(location).attr("href", "/index.php/game/matching?board_id=<?php echo $board_id?>");
            } 
            
                
            }, // success 
    
            error : function(xhr, status) {
                console.log(xhr + " : " + status);
            }
        }); 
        }


    </script>
</html>