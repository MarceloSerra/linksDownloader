<?


$links = json_decode($_POST['links']);
$dir = './processed/';


function crawlUrl($url){
    $ch = curl_init($url);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER,true );
    curl_setopt( $ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT'] );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true ); 
    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    $res=curl_exec( $ch );
    curl_close( $ch );
    return $res;
}

foreach($links as $link){

    $fileName = basename($link);
    if(file_put_contents($dir.$fileName, crawlUrl($link))){
        echo 'Downloaded: '.$link.'<br>';
    }else{
        echo 'Failed: '.$link.'<br>';
    }

}

?>