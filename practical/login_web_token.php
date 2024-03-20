<?php 
   require_once ('../includes/functions.php');
   $url = 'https://my.vnexpress.net/authen/users/login';

   $content = httpGet($url);
   preg_match('/name="csrf" value="(.+)"/', $content, $matches);
   $csrf = '';
   if(!empty($matches[1])) {
      $csrf = trim($matches[1]);
      $data = [
         'csrf' => $csrf,
         'myvne_email' => 'tonthanhtam01@gmail.com',
         'myvne_password' => 'cuc10061074',
         'view_app' => 0
      ];
      $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36';
   
      $queryStr = http_build_query($data);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $queryStr);
      curl_setopt($ch, CURLOPT_COOKIEFILE, realpath('logs/cookie.txt'));
      curl_setopt($ch, CURLOPT_COOKIEJAR, realpath('logs/cookie.txt'));
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   
      $result = curl_exec($ch);
      echo curl_error($ch);
      curl_close($ch);
      var_dump($result);
   }
?>