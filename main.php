<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Путевой лист</title>
</head>
<body>

<div class="conteiner">
    <div id="put" class="put">
      <?php 
        for($p=0; $p<count($arr_file); $p++) {
          echo $arr_file[$p] . '<br><br>';
        }
      ?>Всего пройдено километров: <? echo $sumkm ?>

    </div>
    <div id="time-put" class="put">
      <?php 
        for($p=0; $p<count($begin_time_arr); $p+=4) {
          $t = date('H:i',$begin_time_arr[$p]);
          $t2 = date('H:i',$begin_time_arr[$p+1]);
          $t3 = date('H:i',$begin_time_arr[$p+2]);
          $t4 = date('H:i',$begin_time_arr[$p+3]);
          echo $t . '--' . $t2 . '<br>'; 
          echo $t3 . '--' . $t4 . '<br><br>'; 
        }            
      ?>
    </div>
  </div>

</body>
</html>