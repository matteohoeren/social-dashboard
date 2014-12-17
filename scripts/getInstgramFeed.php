<?php
error_reporting(0);
function callInstagram($url)
{
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_SSL_VERIFYHOST => 2
));

$result = curl_exec($ch);
curl_close($ch);
return $result;
}

function getInstagramFeed($hashtag, $count)
{
include("config.php");
$tag = $hashtag;

$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$IG_CLIENT_ID.'&count=' . $count;

$inst_stream = callInstagram($url);
$results = json_decode($inst_stream, true);

foreach($results['data'] as $item){
 $image_link = $item['images']['low_resolution']['url'];
 $likes = $item['likes']['count'];

   $content = $content . '<img src="'.$image_link.'" class="InstagramImage"/>';
}

return $content;
}
$instagramHashtag = $_GET['hashtag'];
$instagramCount = $_GET['count'];
if($instagramHashtag != "" AND $instagramCount != ""){
	echo getInstagramFeed($instagramHashtag, $instagramCount);
	} else {
	echo "Please spcify a hashtag and the amount of pictures!";
	}
?>