<?


include 'src/download-class.php';
$downloader = new Download(json_decode($_POST['links']), './processed/');
$downloader->iteratorLinks();
//$downloader->getLinks();
//$downloader->getDir();

?>