<?php 
error_reporting(0);
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
function getTweets($hashtag, $count){
	include("config.php");
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	  return $connection;
	}
	 
	$connection = getConnectionWithAccessToken($TWITTER_CONSUMER_KEY, $TWITTER_CONSUMER_SECRET, $TWITTER_ACCESS_TOKEN, $TWITTER_ACCESS_TOKEN_SECRET);
	 
	$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=%23". $hashtag . "&count=" . $count);

	$stream = "";
	$i = 0;
	 foreach($tweets as $tweet){
		foreach($tweet as $t){
			$i = $i + 1;
			if($i <= $count) {
			$text = $t->text;
			$pic = $t->user->profile_image_url;
			$stream = $stream . "<div id='tweet'><img src='" . $pic . "' class='twitterPic' />" .$text . "</div>";
			
			} else {
				continue;
			}
		}
	} 
	return $stream;
}

$hashtag = $_GET['hashtag'];
$count = $_GET['count'];
if($hashtag != "" AND $count != ""){
	echo getTweets($hashtag, $count);
} else {
	echo "Please specify hashtag and the number of tweets!";
}
?>