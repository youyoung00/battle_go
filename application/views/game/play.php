<!DOCTYPE html>

<html lang="en">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <style>

        /* form{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        } */
        /* * {
            margin: 0;
            padding: 0;
        } */
        table {
            left: 86%;
            top: 50%;
            /* width: 300px;
            height: 700px; */
            border: 1px solid #444444;
            border-collapse: collapse;
        }

        #chat {
            width: 300px;
            height: 700px;
            position: absolute;
            left: 80%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        body {
            margin: 0;
            padding: 0;
            margin-left: 0;
            margin-top: 10px;
            background-color: bisque;
            text-align: center;
        }

        .container {
            display: grid;
            position: relative;
            /* border : 4px solid red; */
            grid-template-columns: 200px 200px 300px;
            grid-template-areas: "message message button" "canvas canvas canvas";
        }

        canvas {
            grid-area: canvas;
            margin-left: 5vw;
            top: 5vh;
            z-index: 1;
            position: relative;
            left: 40%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .buttons {
            grid-area: button;
            height: 30px;
            align-self: center;
            /* border : 2px solid purple; */
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-areas: "withdraw restart";
        }

        #withdraw {
            grid-area: withdraw;
            top: 0;
            left: 20px;
            width: 90px;
            font: 18px bold;
            /* border : 1px solid red; */
        }

        #reload {
            grid-area: restart;
            top: 0;
            left: 150px;
            width: 90px;
            font: 18px bold;
        }

        .trophy {
            width: 600px;
            height: 600px;
        }

        #trophyImg {
            /* border : 1px solid red; */
            /* animation-name: trophy; */
            animation-timing-function: linear;
            animation-duration: 2s;
            /* animation-iteration-count: infinite; */
        }
        #trophyImg2 {
            /* border : 1px solid red; */
            /* animation-name: trophy; */
            animation-timing-function: linear;
            animation-duration: 2s;
            /* animation-iteration-count: infinite; */
        }

        .winShow1 {
            position: absolute;
            /* z-index: -1; */
            visibility: hidden;
            left: 30px;
            top: 60px;
            width: 630px;
            height: 570px;
            background-color: white;
            text-align: center;
            padding-top: 50px;
            display: inline-block;
            vertical-align: middle;
            font-size: 70px;
            font-weight: bolder;

            animation-name: blink;
            animation-timing-function: linear;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }
        .winShow2 {
            position: absolute;
            /* z-index: -1; */
            visibility: hidden;
            left: 30px;
            top: 60px;
            width: 630px;
            height: 570px;
            background-color: black;
            text-align: center;
            padding-top: 50px;
            display: inline-block;
            vertical-align: middle;
            font-size: 70px;
            color: white;
            font-weight: bolder;

            animation-name: blink;
            animation-timing-function: linear;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        @keyframes blink {
            0% {
                opacity: 0.6;
            }
            20% {
                opacity: 0.8;
            }
            40% {
                opacity: 0.6;
            }
            60% {
                opacity: 0.8;
            }
            80% {
                opacity: 0.6;
            }
            100% {
                opacity: 0.8;
            }
        }
        @keyframes trophy {
            0% {
                width: 30px;
                height: 30px;
            }
            80% {
                width: 300px;
                height: 300px;
            }
            100% {
                width: 30px;
                height: 30px;
            }
        }

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */

        form {
            padding: 3px;
            position: fixed;
            bottom: 10px;
            right: 30px;
            width: 50%;
        }
        form input {
            border: 0;
            border-radius: 5px;
            padding: 10px;
            width: 90%;
            margin-right: 0.5%;
        }
        form button {
            width: 9%;
            border-radius: 5px;
            border: none;
            padding: 10px;
        }
        #message {
            display: inline-block;
            list-style-type: none;
            margin: 0;
            padding: 0;
            font-size: x-large;
        }

        /* #chat-form{
            position: absolute;
            right:0px;
            bottom: 0px;
            display: inline-block;
            z-index: 1;
        } */
        #chat-form {
            position: absolute;
            right: 0;
            top: 0;
            display: inline-block;
        }
        tbody {
            position: absolute;
            display: inline-block;
            right: 400px;
            top: 30px;
        }
    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Battle GoGo</title>
        <script src="script.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <body>
        <div class="container">
            <div
                class="message"
                style="font-size:large; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Battle GoGo</div>

            <div class="buttons">
                <input type="button" id="reload" value="한 판 더 !" class="btn btn-warning" onclick="">
                <input type="button" value="기권" class="btn btn-warning" onClick="location.href='result_lose.php'">
                <!-- <input type="button" value="기권" class="btn btn-warning" onClick="location.href='index.php/game/result_lose.php'"> -->
            </div>

            <!-- <form method="post" action="/index.php/stone/stone_insert">
            <input type="hidden" name='board_id'>
            <input type="hidden" name='position_x'>
            <input type="hidden" name='position_y'>
            <input type="hidden" name='board_id'> -->
            <canvas id='canvas'></canvas>
            <!-- </form> -->

            <div>
                <table id="comment">
                    <tbody>
                
                    </tbody>
                </table>
            </div>

        </div>

        <div>
            <?php
            if($board_data->host_id != $member_id and $board_data->guest_id != $member_id){
        ?>

            <ul id="messages"></ul>
            <form action="/index.php/comment/comment_insert" id="chat-form" method="post">
                <input id="m" name="content" autocomplete="off"/>
                <input type="hidden" name='board_id' value= <?php echo $board_data->_id?> >
                <!-- <input type="hidden" name='board_id' value= <?php echo $board_data->_id?> > -->
                
                <input type="button" value="SEND" class="btn btn-warning" onclick="test1(); return false;">
            </form>
            <?php }?>
        </div>

        <!-- <table id="chat" border='3'> <tr> <td></td> <td></td> </tr> <tr> <td></td>
        <td></td> </tr> </table> <input type="text" class="msg" placeholder="내용 입력"> <br
        /><br /> <button type="button" onclick="myFunction()">SEND</button> -->

    </body>

    <!-- <script>

        function comment_delete(str) {
            if (confirm('진짜지우실?')) {
                // alert(str);
                $.ajax({
            cache : false,
            url : "/index.php/comment/comment_delete", // 요기에
            type : 'GET', 
            data : str, 
            success : function(data) {
                console.log(data);
                location.reload();
            }, // success 
    
            error : function(xhr, status) {
                console.log(xhr + " : " + status);
            }
        }); 
                location.reload();
            }
        }
    </script> -->

    <script>
    function test1(){
        var formData = $("#chat-form").serialize();

        $.ajax({
            cache : false,
            url : "/index.php/comment/comment_insert", // 요기에
            type : 'POST', 
            data : formData, 
            // settimeout : 500,
            success : function(data) {
                console.log(data);
                JSON.parse(data);
            }, // success 
    
            error : function(xhr, status) {
                console.log(xhr + " : " + status);
            }


        }); // $.ajax */
    }


    function getList(){
        var number = 0;
        console.log('list'+number);
        number++;

        $.ajax({
            cache : false,
            url : "/index.php/comment/comment_list?board_id=1", // 요기에
            type : 'GET', 
            // data : formData, 
            // settimeout : 500,
            success : function(data) {
                // console.log(data);
                
                const obj = JSON.parse(data);
                let comments;
                let nicks;

                
                for (let index = 0; index < obj.length; index++) {
                    comments += "<tr><td>"+obj[index]['nick']+ " : " +obj[index]['content']+"</tr></td>";
                    
                }
                console.log(obj+'리스트 체크 합니다.');

                $("#comment>tbody").html(comments,nicks);
            }, // success 
    
            error : function(xhr, status) {
                console.log(xhr + " : " + status);
            }
        }); // $.ajax */
    }

    
    </script>

    <script>
        window.onload = function () {

            // 2초 간격으로 메시지를 보여줌
            let comment_timerId = setInterval(() => getList(), 500);
             let timerId = setInterval(() => set_board(), 500);





            canvas = document.getElementById('canvas');
            ctx = canvas.getContext('2d');
            const margin = 30;
            const cw = (ch = canvas.width = canvas.height = 600 + margin * 2);
            const row = 18; // 바둑판 선 개수
            const rowSize = 600 / row; // 바둑판 한 칸의 너비
            const dolSize = 16; // 바둑돌 크기
            let count = 0;
            // let msg = document.querySelector('.message');
            let btn1 = document.querySelector('#reload');
            // let btn2 = document.querySelector('#withdraw');
            let board = new Array(Math.pow(row + 1, 2)).fill(-1); // 144개의 배열을 생성해서 -1로 채움
            let history = new Array();
            // let checkDirection = [   [1, -1],   [1, 0],   [1, 1],   [0, 1],   [-1, 1],
            // [-1, 0],   [-1, -1],   [0, -1], ];

            btn1.addEventListener('mouseup', () => {
                location.reload();
            });

            draw(); //바둑판 그리는거 없으면 안됨

            // indexView(m); 바둑판 그리기 함수
            function draw() {
                ctx.fillStyle = '#dcbe75';
                ctx.fillRect(0, 0, cw, ch);
                for (let x = 0; x < row; x++) {
                    for (let y = 0; y < row; y++) {
                        let w = (cw - margin * 2) / row;
                        ctx.strokeStyle = 'black';
                        ctx.lineWidth = 1;
                        ctx.strokeRect(w * x + margin, w * y + margin, w, w);
                    }
                }

                // 화점에 점 찍기
                for (let a = 0; a < 3; a++) {
                    for (let b = 0; b < 3; b++) {
                        ctx.fillStyle = 'black';
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.arc(
                            (3 + a) * rowSize + margin + a * 5 * rowSize,
                            (3 + b) * rowSize + margin + b * 5 * rowSize,
                            dolSize / 3,
                            0,
                            Math.PI * 2
                        );
                        ctx.fill();
                    }
                }
            }

            // x,y 좌표를 배열의 index값으로 변환

            let xyToIndex = (x, y) => {
                return x + y * (row + 1);
            };

            // 배열 index값을 x,y좌표로 변환
            let indexToXy = (i) => {
                w = Math.sqrt(board.length);
                x = i % w;
                y = Math.floor(i / w);
                return [x, y];
            };

        drawRect = (x, y) => {
        let w = rowSize/2;
        ctx.strokeStyle = 'red';
        ctx.lineWidth = 3;
        ctx.strokeRect(
            x * rowSize + margin - w,
            y * rowSize + margin - w,
            w + rowSize/2,
            w + rowSize/2
        );
    };

function set_board()
{
    
        $.ajax({
        cache : false,
        url : "/index.php/game/game_data?board_id=1", // 요기에
        type : 'GET', 
        // data : formData, 
        // settimeout : 500,
        success : function(data) {
            // console.log(data);
            
            const obj = JSON.parse(data);
            let stone_list = obj['stone_list'];
            let winner_info = obj['board_data']['winner_id'];

            if(winner_info){
                // alert('승부결정남');
                // console.log('승부결정남');

            }
    
            for (let index = 0; index < stone_list.length; index++) { 
                console.log(obj);
            let stonex = stone_list[index]['positionx'];
            let stoney = stone_list[index]['positiony'];
            let stone_color = stone_list[index]['color'];

            if(stone_color == "0")
            {
                setcolor = "black"; 
            }
            else
            {
                setcolor = "white";

            }
            
            set_stone(setcolor,stonex,stoney);
                
            }

        }, // success 

        error : function(xhr, status) {
            console.log(xhr + " : " + status);
        }
    }); 

}

function set_stone(color,x,y)
{
    a = x;
    b = y;
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.arc(a * rowSize + margin, b * rowSize + margin, dolSize, 0, Math.PI * 2);
    ctx.fill();
}


            //바둑알 그리기. 실제로는 바둑판까지 매번 통째로 그려줌
            drawCircle = (x, y) => { 
                draw();

                /*
                for (i = 0; i < board.length; i++) {
                    // 모든 눈금의 돌의 유무,색깔 알아내기
                    let a = indexToXy(i)[0];
                    let b = indexToXy(i)[1];
 
                        ctx.fillStyle = 'white';
                        ctx.beginPath();
                        ctx.arc(a * rowSize + margin, b * rowSize + margin, dolSize, 0, Math.PI * 2);
                        ctx.fill();
                }
                */

                let boardCopy = Object.assign([], board);
                history.push(boardCopy); //무르기를 위해서 판 전체 모양을 배열에 입력
            };

    //         document.addEventListener('mouseup', (e) => {
    //     if (e.target.id == 'canvas') {
    //         let x = Math.round(Math.abs(e.offsetX - margin) / rowSize);
    //         let y = Math.round(Math.abs(e.offsetY - margin) / rowSize);
    //         console.log(e.offsetX, e.offsetY, x, y);
    //         if (e.offsetX > 10 && e.offsetX < 640 && e.offsetY > 10 && e.offsetY < 640) {
                
    //             if (board[xyToIndex(x, y)] != -1) {
    //                 console.log('돌이 놓여있는 곳에 둠');
    //             } else {
    //                 // 비어있는 자리이면, 순서에 따라서 흑,백 구분해서 그리는 함수 실행
    //                 count % 2 == 0
    //                     ? (board[xyToIndex(x, y)] = 1)
    //                     : (board[xyToIndex(x, y)] = 2);
    //                 count++;
    //                 drawCircle(x, y);
    //             }
    //         }
    //     }
    // });
    // 마우스 클릭한 위치를 정확한 눈금 위치로 보정
            document.addEventListener('mouseup', (e) => {
                if (e.target.id == 'canvas') {
                    let x = Math.round(Math.abs(e.offsetX - margin) / rowSize);
                    let y = Math.round(Math.abs(e.offsetY - margin) / rowSize);
            
                    console.log(x, y);
                    
                    $.ajax({
                        cache : false,
                        url : "/index.php/stone/stone_insert", // 요기에
                        type : 'POST', 
                        data : {"board_id": '<?php echo $board_data->_id?>', "position_x":x , "position_y":y}, 
                        success : function(data) {
                            console.log(data);
                        
                        }, // success 
                
                        error : function(xhr, status) {
                            console.log(xhr + " : " + status);
                        }
                    }); // $.ajax */
                }
            
            });
        }


        
    </script>

</html>