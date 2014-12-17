<html>
	<head>
		<title>DASHBOARD</title>
		<link href="style/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/jquery.js" type="text/javascript"></script>
		<script src="scripts/getSocialUpdates.js" type="text/javascript"></script>
	</head>
	<body onLoad="updateAll('hashtag', 15);">
	<div id="header">Social Dashboard<span style="float:right; margin-right: 12%; margin-top: 5px;"><button id="startPause" class="square-button" onClick="startPause();">Pause Updates</button></span> </div>
	<div name="Instagram" id="content" style="margin-left: 11%;">
	</div>
	<div name="Twitter" id="content">
	</div>
	<div name="Gmail"id="content">
	</div>
	
	</body>
</html>
