<html>
    <!-- 매칭되는 페이지 3초 정도만 나올예정: 시간은 3초로 맞춰놓았으니 백엔드에서 요청하시는대로 변경하기 -->
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
    .text {
    text-align: center;
    }

    #progress {
    margin: 20px auto;
    width: 80%;
    height: 40px;
    position: relative;
    background-color: #ddd;
    }

    #bar {
    background-color: #4267b2;
    width: 10px;
    height: 40px;
    position: absolute;
    }

    #loading {
    font-size: 1.4rem;
    }
    #waitpage{
            font-size: xx-large;
            }

    h2 {
    height: 100px;
    }

    h2 span {
            position: relative;
            top: 30px;
            display: inline-block;
            animation: bounce .3s ease infinite alternate;
            font-family: 'Titan One', cursive;
            font-size: 40px;
            color: #FFF;
            text-shadow: 0 1px 0 #CCC,
                0 2px 0 rgb(187, 81, 81),
                0 3px 0 rgb(34, 180, 185),
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
                    0 3px 0 rgb(187, 81, 81),
                    0 4px 0 rgb(34, 180, 185),
                    0 5px 0 rgb(226, 236, 80),
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
    <form>   

        <div> 
        <h2 class="text" id="waitpage">
            <span>상</span>
            <span>대</span>
            <span>방</span>
            <span>매</span>
            <span>칭</span>  
            <span>중</span>                   
        </h2>
            <div id="progress">
            <div id="bar"></div>
            </div>
            <p class="text" id="loading"></p>
        </div>
    </form>
</body>

<script>
    setTimeout(() => {
        $.ajax({
            cache : false,
            url : "/index.php/game/match_check?board_id=<?php echo $board_id?>", // 
            type : 'GET', 
            // data : formData, 
            // settimeout : 500,
            success : function(data) {
                // console.log(data);
                
                const obj = JSON.parse(data);

                // let status = obj["board_data"]["status"];
                console.log(obj);
                if(obj["status"] == 1){
                $(location).attr("href", "/index.php/game/play?board_id=<?php echo $board_id?>");
            } 
                
            }, // success 
    
            error : function(xhr, status) {
                console.log(xhr + " : " + status);
            }
        }); 
    }, 3000);



const progressBar = document.getElementById("bar");
const loadingMsg = document.getElementById("loading");

let barWidth = 0;

// barWidth 진행중인 width 보여주기
const animate = () => {
  barWidth++;
  progressBar.style.width = `${barWidth}%`;
  setTimeout(() => {
    loadingMsg.innerHTML = `상대방 매칭까지 ${barWidth}%`;
  }, 0);
};

// 지정한 시간 이후에 시작
setTimeout(() => {
  let intervalID = setInterval(() => {
    if (barWidth === 100) {
      clearInterval(intervalID);
    } else {
      animate();
    }
  }, 25); // 여기서 시간 조절하기
}, 500);

</script>