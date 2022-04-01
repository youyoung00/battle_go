<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
                rel="stylesheet">
                <script
                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
                <style>
                    body {
                        background-color: bisque;
                        display: flex;
                        text-align: center;
                        max-width: 400px;
                        display: flex;
                        flex-direction:column;
                        /* overflow: hidden; */
                        border-radius: 2rem;
                        box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
                        
                    }
                    .hc{
                        left: 0;
                        right: 0;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .vc{
                        top: 0;
                        bottom: 0;
                        margin-top: auto;
                        margin-bottom: auto;
                    }

                    form {
                        position: absolute;
                        display: flex;
                        left: 50%;
                        top: 50%;
                        transform: translate(-50%, -50%);
                    }

                </style>
            </head>
            <body class="hc vc"> 
            <table class="table table-bordered" id="hc vc">  
             
            <br/>
            <br/>
            <form >
            <h1>대기실</h1>  <br /><br />
            <h2><?php echo $profile['nick'].'님'.' '.$profile['win'].'승 '.$profile['lose']?>패</h2>
            
            
  
    <thead>
        <tr>
        <th>게임형식</th>
        <th>방제목</th>
        <th>입장하기</th>
      </tr>
    </thead>

    <tbody>

<?php
foreach($board_list as $row)
{ 

  if ($row['status'] == 0) {
    $row['status'] = '대기';
    $row['button_label'] = '게임시작';
  }
  else if($row['status'] == 1) {
    $row['status'] = '관전';
    $row['button_label'] = '관전입장';
  }
  else if($row['status'] == 2) {
    $row['status'] = '완료';
    $row['button_label'] = '기보보기';
  }
?>

      <tr>
        <td><?php echo $row['status']?></td>
        <td><?php echo $row['title']?></td>
        <td><a href="/index.php/game/play"><?php echo $row['button_label']?></a></td>
      </tr>

<?php
}
?>

                </tbody>

              </table>
           <a href="/index.php/game/create">방만들기</a>
           
            </form>
          </table>
       </body>
        
</html>