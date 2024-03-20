<?php 
   function httpGet($url, $file = null) {
      $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);

      if(!empty($file)) {
         curl_setopt($ch, CURLOPT_FILE, $file);
      }

      $result = curl_exec($ch);
      curl_close($ch);
      
      if(!empty($file)) {
         fclose($file);
      }
      return $result;
   }

   function downloadImage($url, $folder) {
      $fileName = basename($url);
      $fileName = preg_replace('/(.+)\?.+/', '$1', $fileName);
      $image = fopen($folder.'/'.$fileName, 'a+');
      return httpGet($url, $image);
   }

?>