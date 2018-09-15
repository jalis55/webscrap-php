
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

    $datas = $xpath->query('//tr[contains(@class,"tabular-grid-content altRow-1 playRow autoscroll")]/td[position()=4]/a/@href');
    $mp3=[];
    foreach( $datas as $node )
    {
      $mp3[]=$node->nodeValue."<br>";
    }

    foreach ($mp3 as $mp) {
    	echo $mp;
    }


?>