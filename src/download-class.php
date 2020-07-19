<?

class Download{
    private $links;
    private $dir;

    public function __construct($arrayUrls, $stringDir){
        $this->links = $arrayUrls;
        $this->dir = $stringDir;
    }

    public function setLinks($arrayLinks){
            $this->links = $value;
    }

    public function getLinks(){
        return $this->links;
      }

    public function setDir($stringDir){
        $this->dir = $stringDir;
    }

    public function getDir(){
        return $this->dir;
    }


    private function fetchLink($url){
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER,true );
        curl_setopt( $ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT'] );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true ); 
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        $res=curl_exec( $ch );
        curl_close( $ch );
        return $res;
    }

    public function iteratorLinks(){

        foreach($this->links as $link){
            $fileName = basename($link);
            if(file_put_contents($this->dir.$fileName, $this->fetchLink($link))){
                echo 'Downloaded: '.$link.'<br>';
            }else{
                echo 'Failed: '.$link.'<br>';
            }
        
        }
        
      }
}


?>