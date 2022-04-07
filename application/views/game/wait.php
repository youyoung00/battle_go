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

        form{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        #waitpage{
            font-size: xx-large;
        }
        </style>
    </head>
    <body>
    <form method="post" action="/index.php/game/play">
        <div id="waitpage">상대방 기다리는 중</div><br /><br /> 
        <div class="row col-15 mb-3 mt-3">
            <input type="button" value="방폭파" onClick="location.href='이동할페이지'; class="btn btn-warning active" ><br /><br />
            <input type="submit" value="게임화면 이동하기" class="btn btn-warning active">
        </div>
    </form>

    </body>

    <script>
        let timerId = setInterval(() => set_wait(), 500);

        function set_wait(){
            var formData = $("#chat-form").serialize();

        $.ajax({
            cache : false,
            url : "/index.php/game/wait_check?board_id=1", // 요기에
            type : 'POST', 
            data : formData, 
            // settimeout : 500,
            success : function(data) {
                // console.log(data);
                
                const obj = JSON.parse(data);

                let status = obj["board_data"]["status"];
        

                
            }, // success 
    
            error : function(xhr, status) {
                console.log(xhr + " : " + status);
            }
        }); 
        }

    </script>
</html>