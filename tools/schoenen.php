<?php 
/* Daisycon prijsvergelijkers
 * File: schoenen.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalSchoenen{

	public function adminSchoenen(){

		$output = '
					<script type="text/javascript">							
							jQuery.ajax
							({
								url: "//developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=schoenen&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="//images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/schoenenzoeker_tools.png" alt="" title="" style="float:left;margin-right:20px;" /> <h1>Daisycon Schoenenzoeker</h1>
						Met deze tool zoek je in het uitgebreide schoenenassortiment van adverteerders bij Daisycon. Selecteer de schoenen die je mooi vindt en plaats ze direct op je website.
						<div style="clear:both;"></div>	
						<br/>
						Op dit moment is de Schoenenzoeker alleen te genereren via de <a href="http://www.daisycon.com/nl/tools/schoenenzoeker/" target="_blank">generator op Daisycon.com</a>. 
						<br/><br/>
						<a title="Schoenenzoeker maken" href="http://www.daisycon.com/nl/tools/schoenenzoeker/" target="_blank"><img style="float: left;" src="http://images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/Zorgverzekeringvergelijker-generator.png" alt="Schoenenzoeker genereren"></a>
						<br/><br/>
						<div style="clear:both;"></div>	
						<br/><br/>
						<a title="Demowebsite schoenenzoeker" href="http://vergelijkers.daisycon.com/schoenenzoeker" target="_blank"><img style="float: left;" src="http://images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/Zorgverzekeringvergelijker-demowebsite.png" alt="Demowebsite schoenenzoeker"></a>
						<div style="clear:both;"></div>	
						<br/><br/>
						Meer informatie over de Schoenenzoeker kun je <a href="http://www.daisycon.com/nl/blog/schoenenzoeker/" target="_blank">hier</a> vinden.
						
						';
				
		echo $output;
	}

}
?>