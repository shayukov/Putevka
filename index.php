<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Путевой лист</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet icon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include_once "put3.php"?>

  <header class="header">
    <h1>Заполнение путевого листа</h1>
  </header>
  <section class="filling-form">
    <form action="index.php" method="POST" class="form">
      <label for="name">Введите километраж</label>
      <input type="number" placeholder="км" maxlength="3" name="km">
      <br>
      <br>    
      <label for="">Мойка</label>
      <select name="moika-adress" id="washing" class="adress">
        <option>Нет</option>
        <option>Московская 43</option>
        <option></option>
      </select>
<!--  -->
      <br>
      <br>    
      <label for="">Заправка</label>
      <select name="adress" id="refueling" class="adress">
        <option>Нет</option>
        <option>Девятаева 15а</option>
        <option>Сары Садыковой 65</option>
        <option>Отрадная 5а</option>
        <option>Спартаковская 8</option>
        <option>Марселя Салимжанова 29</option>
        <option>Тази Гиззата 29а</option>
        <option>Московская 1Б</option>
      </select>
      <br>
      <label>
        <input type="time" name="refillTime" id="refillTime" class="refTime">Время заправки
      </label>
      <br>
      <br>
      <label>
        <input type="checkbox" name="friday" id="friday" value="yes" class="refTime">Пятница
      </label>
      <br>
      <br>    
      <input class="Go" type="submit" value="Поехали" >    
      <br>
      <br>
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
    </form>
  </section>
</body>
</html>