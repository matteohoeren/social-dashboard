// SPECIFY YOUR HASHTAG HERE:
var searchHashtag = "hashtag";


var state = 0;
function startPause() {
	if(state == 0){
		updateAll(searchHashtag, 15);
	} else if(state == 1){
		pauseAll();
	}
}

function pauseAll() {
clearTimeout(it);
clearTimeout(tt);
clearTimeout(gt);
$("#startPause").html("Resume Updates");
state = 0;
}

function updateAll(hashtag, delay) {
	state = 1;
	$("#startPause").html("Pause Updates");
	updateInstagram(hashtag, 2, delay);
	updateTwitter(hashtag, 6, delay);
	updateGmail(delay);
}

function updateInstagram(hashtag, count, delay) {
	$.ajax({
		type: "GET",
		url: "scripts/getInstgramFeed.php",
		data: "hashtag=" + hashtag + "&count=" + count,
		success: function(msg)
		{	
			$('[name=Instagram]').html("<h3>Instagram</h3><br />" + msg);
			console.log("Instagram Feed automatically updated.");
		}
	});
	it = setTimeout(function(){ updateInstagram(hashtag, count, delay); }, delay * 1000);
}

function updateTwitter(hashtag, count, delay) {
	$.ajax({
		type: "GET",
		url: "scripts/getTwitterHashtag.php",
		data: "hashtag=" +hashtag + "&count=" + count,
		success: function(msg)
		{	
			$('[name=Twitter]').html("<h3>Twitter</h3>" + msg);
		}
	});
	tt = setTimeout(function(){ updateTwitter(hashtag, count, delay); }, delay * 1000);
}

function updateGmail(delay) {
	$.ajax({
		type: "GET",
		url: "scripts/getNewMails.php",
		data: "update=true",
		success: function(msg)
		{	
			var mails = msg;
			$('[name=Gmail]').html("<h3>Google Mail</h3>" + mails);
		}
	});
	gt = setTimeout(function(){ updateGmail(delay); }, delay * 1000);
}