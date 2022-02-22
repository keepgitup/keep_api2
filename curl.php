<?php
 //-- 建立連線 --
 $ch = curl_init();


 // 設定擷取的URL網址
//  curl_setopt($ch, CURLOPT_URL, "https://api.nlsc.gov.tw/other/ListTown1/".$_POST['city_code']);
//  curl_setopt($ch, CURLOPT_URL, "https://boxoffice.tfi.org.tw/api/export?start=2022/02/07&end=2022/02/13".$_GET['list']);
//20220222 chester advise remove .$_GET['list']
curl_setopt($ch, CURLOPT_URL, "https://tcgbusfs.blob.core.windows.net/dotapp/youbike/v2/youbike_immediate.json");

 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

 //將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

 //-- 執行 --
 $temp=curl_exec($ch);
 $xml = simplexml_load_string($temp, "SimpleXMLElement", LIBXML_NOCDATA);
 $json_data=json_encode($xml);
 echo $json_data;
//  echo $_GET['list'];

 // 關閉CURL連線
 curl_close($ch);

?>