social-dashboard
================

A dashboard displaying Instagram photo's by hashtag, tweets by hashtag and new mails you have.
Make sure the php-imap module is activated, your **API Key's** are in the scripts/config.php file
and that you have set the **hashtag** you want to search for in line 8 in the index.php:

  `<body onLoad="updateAll('hashtag', 15);">`
  
**AND** in the scripts/getSocialUpdates.js at line 2.

  `var searchHashtag = "hashtag";`
  
  
  
Then you should be good to go! Have fun!

P.S. The design works perfectly fine for google chrome and a 1080p display, you may have to
costumize it for your display size or browser.
