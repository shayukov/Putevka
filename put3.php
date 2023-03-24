<?php
  if( isset($_POST['fss']) && 
  $_POST['fss'] == 'yes') {
    $file2 = "fss_putevka2.txt";
    $file = file("fss_putevka.txt");
    $file2_arr = file($file2);
    $file_plus = file("fss_putevka_kmplus.txt");
    $file_km = [18, 22, 14, 20, 16, 14, 34, 16, 22, 40, 24, 14, 16, 28, 30, 20, 32, 20, 32, 24, 32, 20, 18, 14, 34, 30, 66, 12, 12, 14, 18, 12, 14, 20, 12, 14, 28, 18, 34, 18, 20, 12, 18, 14, 12, 18, 14, 18, 16, 18, 16, 18, 12, 16, 44, 24, 38, 14, 20, 22, 14, 16, 48, 16, 22, 20, 22, 44, 18, 24, 32, 20, 12, 10, 6, 10, 8, 6, 8, 8, 10, 8, 10, 2, 10, 4, 10, 6, 10, 6, 8, 10, 2];
    $file_km_plus = [19, 23, 15, 21, 17, 15, 35, 17, 23, 41, 25, 15, 17, 29, 31, 21, 33, 21, 33, 25, 33, 21, 19, 15, 35, 31, 67, 13, 13, 15, 19, 13, 15, 21, 13, 15, 29, 19, 35, 19, 21, 13, 19, 15, 13, 19, 15, 19, 17, 19, 17, 19, 13, 17, 45, 25, 39, 15, 21, 23, 15, 17, 49, 17, 23, 21, 23, 45, 19, 25, 33, 21, 13, 11, 7, 11, 9, 7, 9, 9, 11, 9, 11, 3, 11, 5, 11, 7, 11, 7, 9, 11, 3]; 
  }else {
    $file2 = "putevka2.txt";
    $file = file("putevka.txt");
    $file2_arr = file($file2);
    $file_plus = file("putevka_kmplus.txt");
    $file_km = [18, 20, 14, 24, 18, 20, 12, 18, 14, 20, 16, 28, 16, 26, 18, 20, 12, 16, 20, 30, 14, 20, 22, 28, 20, 16, 46, 8, 8, 6, 4, 2, 10, 4, 6, 8, 8, 10];
    $file_km_plus = [19, 21, 15, 25, 19, 21, 13, 19, 15, 21, 17, 29, 17, 27, 19, 21, 13, 17, 21, 31, 15, 21, 23, 29, 21, 17, 47, 9, 9, 7, 5, 3, 11, 5, 7, 9, 9, 11];  
  }

  //создаем массив для хранения адресов, с последующим их удалением
  $arr_file = [];

  $i = 0;
  $sumkm = 0;
  $km = (int)$_POST['km'];

  function filePutContents($i) {
    global $file2, $file, $file2_arr;
    file_put_contents($file2, $file[$i], FILE_APPEND);
    $file2_arr = file($file2);
  }
  if(isset($_POST['friday'])) {
    $fri = $_POST['friday'];
  }
  $begin = "08:40";
  $begin_time = strtotime($begin);
  if($fri == 'yes') {
    $end = "16:10";
  } else $end = "17:20";
  $end_time = strtotime($end);
  $lunch = "12:00";
  $lunch_time = strtotime($lunch);
  $lunch_end = "12:45";
  $lunch_end_time = strtotime($lunch_end);

  $begin_time_arr = [];
  $km_arr = [];//массив для хранения километров пройденных в пути
  $minute = [];//массив для хранения времени потраченных в пути


  //выставляем значение мойка
  if($_POST['moika-adress'] == "Московская 43"){
    $sumkm += 6;
  }
  //выставляем значение заправка
  if($_POST['adress'] == "Девятаева 15а") {
    $sumkm += 8;
    $arr_file[] = 'Пушкина8-Девятаева15А=4<br>Девятаева15А-Пушкина8=4';
    $km_arr[] = 8;
  } elseif($_POST['adress'] == "Сары Садыковой 65") {
    $sumkm += 8;
    $arr_file[] = 'Пушкина8-СарыСадыковой65=4<br>СарыСадыковой65-Пушкина8=4';
    $km_arr[] = 8;
  } elseif($_POST['adress'] == "Отрадная 5а") {
    $sumkm += 14;
    $arr_file[] = 'Пушкина8-Отрадная5а=7<br>Отрадная5а-Пушкина8=7';
    $km_arr[] = 14;
  } elseif($_POST['adress'] == "Спартаковская 8") {
    $sumkm += 6;
    $arr_file[] = 'Пушкина8-Спартаковская8=3<br>Спартаковская8-Пушкина8=3';
    $km_arr[] = 6;
  } elseif($_POST['adress'] == "Марселя Салимжанова 29") {
    $sumkm += 8;
    $arr_file[] = 'Пушкина8-МарселяСалимжанова29=4<br>МарселяСалимжанова29-Пушкина8=4';
    $km_arr[] = 8;
  } elseif($_POST['adress'] == "Тази Гиззата 29а") {
    $sumkm += 8;
    $arr_file[] = 'Пушкина8-ТазиГиззата29а=4<br>ТазиГиззата29а-Пушкина8=4';
    $km_arr[] = 8;
  } elseif($_POST['adress'] == "Московская 1Б") {
    $sumkm += 10;
    $arr_file[] = 'Пушкина8-Московская1Б=5<br>Московская1Б-Пушкина8=5';
    $km_arr[] = 10;
  }
  //проверяем значение километраж на чётность
  if($km % 2 != 0) {
    for($i; $i<count($file_km_plus); $i++) {
      if(in_array($file[$i], $file2_arr)) {
        continue;
      }else {
        $kmplus = $file_km_plus[$i];
        if ($kmplus > $km) {
          continue;
        } else {
          $arr_file[] = $file_plus[$i];
          $km_arr[] = $file_km[$i];
          $sumkm += $kmplus;
          filePutContents($i);

          break;
        }  
      }
    }
  }

  while($sumkm < $km) {
    if($_POST['fss'] == 'yes') {
      if($i==74) {
        $i = 0;
        file_put_contents($file2, '');
        $file2_arr = file($file2);
        continue;
      }
    }else {
      if($i==27) {
        $i = 0;
        file_put_contents($file2, '');
        $file2_arr = file($file2);
        continue;
      }
    }
    if(in_array($file[$i], $file2_arr)) {
      $i++;
      continue;
    }
    $sumkm += $file_km[$i];
    if($sumkm < $km) {
      filePutContents($i);
      $arr_file[] = $file[$i];
      $km_arr[] = $file_km[$i];
    } elseif($sumkm == $km) {
      filePutContents($i);
      $arr_file[] = $file[$i];
      $km_arr[] = $file_km[$i];
      break;
    } 
    else {
      $sumkm -= $file_km[$i];
      $raz = $km - $sumkm;
      for($a=0; $a < count($file_km); $a++) {
        if($file_km[$a] == $raz) {
          $sumkm += $raz;
          $arr_file[] = $file[$a];
          $km_arr[] = $file_km[$a];
          break;
        }
      } 
      break;         
    }
    $i++;
  }
  if($_POST['moika-adress'] == 'Московская 43') {
    $arr_file[] = 'Пушкина8-Московская43=3<br>Московская43-Пушкина8=3';
    $km_arr[] = 6;
  }


  //формирование времени потраченного на поездку
if($sumkm>0) {
  for($r=0;$r<count($km_arr);$r++) {
    if($km_arr[$r]>=2 && $km_arr[$r]<=9){
      $m="00:05";
    } elseif($km_arr[$r]>=10 && $km_arr[$r]<=12){
      $m = "00:10";
    } elseif($km_arr[$r]>=13 && $km_arr[$r]<=17){
      $m = "00:15";
    } elseif($km_arr[$r]==18){
      $m = "00:20";
    } elseif($km_arr[$r]>=19 && $km_arr[$r]<=20){
      $m = "00:25";
    } elseif($km_arr[$r]>=21 && $km_arr[$r]<=25){
      $m = "00:30";
    } elseif($km_arr[$r]>=26 && $km_arr[$r]<=30){
      $m = "00:35";
    } elseif($km_arr[$r]>=31){
      $m = "00:40";
    }
    $minute[] = strtotime($m) - strtotime("00:00:00");
  }
  $wait = 300;
  $wait2 = 300;
  $coun=count($minute);

  $coun2=intdiv($coun, 2);

  $ref = strtotime($_POST["refillTime"]);
  if($ref!=false) {
    if($ref<$lunch_time) {
      $b_t = $begin_time;
      for($v=0; $v<$coun2; $v++) {
        $b_t_s = $minute[$v+1] + $wait + $minute[$v+1] + $wait2;
        $b_t += $b_t_s;
        if($b_t>$ref-300) {
          break;
        }else {
          list($minute[$v],$minute[$v+1]) = array($minute[$v+1],$minute[$v]);
          list($arr_file[$v],$arr_file[$v+1]) = array($arr_file[$v+1],$arr_file[$v]);    
        }
      }
    }elseif($ref>$lunch_end_time) {
      list($minute[0],$minute[$coun2]) = array($minute[$coun2],$minute[0]);
      list($arr_file[0],$arr_file[$coun2]) = array($arr_file[$coun2],$arr_file[0]);    
      $b_t = $lunch_end_time;
      for($v=$coun2; $v<$coun; $v++) {
        $b_t_s = $minute[$v+1] + $wait + $minute[$v+1] + $wait2;
        $b_t += $b_t_s;
        if($b_t>$ref-300) {
        //   list($minute[$v],$minute[$v+1]) = array($minute[$v+1],$minute[$v]);
        //   list($arr_file[$v],$arr_file[$v+1]) = array($arr_file[$v+1],$arr_file[$v]);    
          break;
        }else {
          list($minute[$v],$minute[$v+1]) = array($minute[$v+1],$minute[$v]);
          list($arr_file[$v],$arr_file[$v+1]) = array($arr_file[$v+1],$arr_file[$v]);    
        }
      }
    }
  }

  //до обеда
  $bt = $begin_time;

  for($u=0; $u<$coun2; $u++) {
    $bt += $minute[$u];
    $bt += $wait;
    $bt += $minute[$u];
    $bt += $wait2;
  }
  if($bt>$lunch_time) {
    $x = $bt - $lunch_time;
    $x = intdiv($x, $coun2*2);
    for($u=0; $u<$coun2; $u++) {
      $minute[$u]-=$x;
    }
  }elseif($bt<$lunch_time) {
    $x = $lunch_time - $bt;
    $x = intdiv($x, $coun2);
    $x = intdiv($x, 4);
    $wait+=$x;
    $wait2+=$x;
    for($u=0; $u<$coun2; $u++) {
      $minute[$u]+=$x;
    }
  }
  for($u=0; $u<$coun2; $u++) {
    $m_u = $minute[$u];
    $begin_time_arr[] = $begin_time;
    $begin_time += $m_u;
    $begin_time_arr[] = $begin_time;
    $begin_time += $wait;
    $begin_time_arr[] = $begin_time;
    $begin_time += $m_u;
    $begin_time_arr[] = $begin_time;
    $begin_time += $wait2;
  }

  //после обеда
  $bt = $lunch_end_time;
  for($u=$coun2; $u<$coun; $u++) {
    $bt += $minute[$u];
    $bt += $wait;
    $bt += $minute[$u];
    $bt += $wait2;
  }

  $coun3 = $coun - $coun2;

  if($bt>$end_time) {
    $x = $bt - $end_time;
    $x = intdiv($x, $coun3*2);
    for($u=$coun2; $u<$coun; $u++) {
      $minute[$u]-=$x;
    }
  }elseif($bt<$end_time) {
    $x = $end_time - $bt;
    $x = intdiv($x, $coun3);
    $x = intdiv($x, 4);
    $wait+=$x;
    $wait2+=$x;
    for($u=$coun2; $u<$coun; $u++) {
      $minute[$u]+=$x;
    }
  }

  $begin_time = $lunch_end_time;

  for($u=$coun2; $u<$coun; $u++) {
    $m_u = $minute[$u];
    $begin_time_arr[] = $begin_time;
    $begin_time += $m_u;
    $begin_time_arr[] = $begin_time;
    $begin_time += $wait;
    // if($u==$coun-1) {
    //   $begin_time += $m_u + $wait2;
    //   $begin_time_arr[] = $begin_time;
    // }else {
    //   $begin_time += $m_u;
    //   $begin_time_arr[] = $begin_time;
    //   $begin_time += $wait2;
    // }
    $begin_time_arr[] = $begin_time;
    $begin_time += $m_u;
    $begin_time_arr[] = $begin_time;
    $begin_time += $wait2;
  }

} else echo "<html><h1> ВВЕДИТЕ КИЛОМЕТРАЖ  </h1></html>";

?>