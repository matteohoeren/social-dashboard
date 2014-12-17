<?php
function getNewMails($username, $password) {
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';

$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

$emails = imap_search($inbox,'UNSEEN');
$newmails = "";
if($emails) {
	rsort($emails);
	foreach($emails as $email_number) {
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$newmails = $newmails . "<span class='gmailSubject'>". $overview[0]->subject . "</span>      <span class='gmailFrom'>from:" . $overview[0]->from . "</span><br />";
	}
	return $newmails;
} else {
echo "No new mails!";
}

imap_close($inbox);
}
include("config.php");
echo getNewMails($GMAIL_USER, $GMAIL_PASSWORD);
?>