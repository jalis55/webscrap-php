
<?php
    ini_set('display_errors', 1);

    $url = 'http://classic.beatport.com/search?query=Albert+Aponte%2C+Chris+Groovejey+-+Body+Music+(Original+Mix';


    //#Set CURL parameters: pay attention to the PROXY config !!!!
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_PROXY, '');
    $data = curl_exec($ch);
    curl_close($ch);

    $dom = new DOMDocument();
    @$dom->loadHTML($data);

    $xpath = new DOMXPath($dom);

    $datas = $xpath->query('//span[contains(@class,"play-queue play-queue-med-small")]');
    $mp3=[];
    foreach( $datas as $node )
    {
       // die("123");
       $datas=$node->getAttribute('data-json');
       
      
       $datas=json_decode($datas,TRUE);
      // print_r(array_values($datas));
       
       
            echo $datas['preview']['mp3']['http']."<br>";
       

    }

    


?>