<?php
	// Version string in URLs is used to prevent unwanted caching of JS and CSS files following upgrades.
	// As a side effect, also causes browsers to more aggressively cache as long as it remains unchanged.
	$version = "0.23b";
	
	if (!file_exists(dirname(_FILE_).'/lib/config.ini'))
		die("<b>Error:</b> ./lib/config.ini not found! Please copy <i>config.ini-dist</i> to <i>config.ini</i> and configure appropriately.");		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>FireBreath IRC Log Viewer</title>
		<script type="text/javascript" src="http://www.google.com/jsapi?autoload=%7B%22modules%22%3A%5B%7Bname%3A%22maps%22%2Cversion%3A3%2Cother_params%3A%22sensor%3Dfalse%22%7D%2C%7B%22name%22%3A%22jquery%22%2C%22version%22%3A%221.3.2%22%7D%2C%7B%22name%22%3A%22jqueryui%22%2C%22version%22%3A%221.7.2%22%7D%5D%7D"></script>		
		<script src="js/main.js?v=<?php echo $version ?>"></script>		
		<link rel="stylesheet" href="css/main.css?v=<?php echo $version ?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	</head>
	<body>
	
		<!-- Header -->
		<div id="header">
			<h1>FireBreath IRC Log Viewer</h1>
			<div class="version">Version <?php echo $version ?></div>
		</div>
		
		<form id="ircLogSearchForm" name="ircLogSearchForm" method="get" onsubmit="ircLogSearch.search(); return false;">
		<!-- Search Results -->
			<div id="leftNavigation">
				<!-- Search Form -->
				<div id="selectChannel">					
					<label for="ircServer">Server:</label>
					<select id="ircServer" name="server" onchange="ircLogSearch.populateIrcChannelList();"></select>	
					<label for="ircChannel">Channel:</label>
					<select id="ircChannel" name="channel"></select>				
				</div>							
			
				<div id="searchBox">
					<input type="text" id="keywords" name="keywords" value="<?php echo $searchKeywords ?>" />
					<button type="button" name="search" onclick="ircLogSearch.search(); return false;" value="search">Search</button>
				</div>
				<div id="searchResults"></div>				
				
				<div id="datePicker">
					<div class="heading">View By Date</div>
					%CALENDAR_DATE_PICKER%
				</div>
			</div>
				
			<div id="ircLogSearchResultsLogView"></div>			
		</form>
		
		<!-- Footer -->	
		<div id="footer">
			<a href="http://validator.w3.org/check?uri=referer">W3C Validator</a>
		</div>
	</body>
</html>
