<link rel="stylesheet" type="text/css" media="screen" href="{$modules_dir}/blocktwittercycle/css/jq.css" />
<script type="text/javascript" src="{$modules_dir}/blocktwittercycle/js/jquery.corner.js"></script>
<script type="text/javascript" src="{$modules_dir}/blocktwittercycle/js/jquery.twitter.search.js"></script>


<script type="text/javascript">
$(document).ready(function() {
	$('h1.title').corner('bevelfold tr 12px');

	$('#twitter2').twitterSearch({
		term: '{$TWITTERCYCLE_VAR}',
		title: 'En direct de Twitter',
		titleLink: 'http://SiteProjet.com',
		birdLink: 'http://SiteProjet.com',
		pause:   true, 
		time:    true, 
		timeout: 2000,
		css: { 
			img: { width: '30px', height: '30px' } 
		}
	});
	
});

</script>

<div id="twitter2" class="twitter" title="Retirez la souris pour reprendre le scrolling" style="box-shadow:4px 4px 5px #ABABAB"></div>