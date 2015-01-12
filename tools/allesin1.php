<?php 
/* Daisycon prijsvergelijkers
 * File: zomer.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalAllesineen{

	public function adminAllesineen(){
		
		global $wpdb;

		$cMediaid = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."daisycon_tools");
		
		if (count($cMediaid) == 0){
			$mediaid = 'XXXXX';
		}else{
			$mediaid = $cMediaid->media_id;
		}
		
		$output = '
					<script type="text/javascript">
							function select_all(el) {
								if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
									var range = document.createRange();
									range.selectNodeContents(el);
									var sel = window.getSelection();
									sel.removeAllRanges();
									sel.addRange(range);
								} else if (typeof document.selection != "undefined" && typeof document.body.createTextRange != "undefined") {
									var textRange = document.body.createTextRange();
									textRange.moveToElementText(el);
									textRange.select();
								}
							}
							
							jQuery.ajax
							({
								url: "http://developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=zomer&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
							
							function getPrograms()
							{	 
								jQuery.ajax({
									url: "http://developers.affiliateprogramma.eu/allesin1/config/data.php?method=wpInstallPrograms&jsoncallback=?",
									dataType: "jsonp",
									async: true,
									success: function(data){
										
										jQuery("#custom_programs").html(data); 
													
									}
								});
							}
							
							jQuery(document).ready(function() {
								getPrograms();
							});
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="http://www.daisycon.com/shared/daisyconwebsite/img/layout/blog/alles-in-een-vergelijker.gif" alt="" title="" style="float:left;margin-right:20px;border: solid 10px;border-color:#9CD137;width:100px; border-radius: 5px;" /> <h1>Daisycon Alles-in-&eacute;&eacute;n-vergelijker</h1>
						Daisycon heeft exclusief voor haar publishers een gratis Alles-in-&eacute;&eacute;n-vergelijker ontwikkeld. Met deze tool kunnen jouw bezoekers pakketten met internet, televisie en (vaste)telefonie vergelijken.
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/alles-in-een-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_allesin1 mediaid="'.$mediaid.'" subid=""]
						</div>					
						
						<p>&nbsp;</p>
					
						<h1>Geavanceerd gebruik</h1>
						
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_allesin1 mediaid="'.$mediaid.'" pakket="internettvbellen" view="normaal" programs="all" subid=""]
						</div>	
						
						<h3>Vormgeving resultaten</h3>
						Met de optie <strong>view=""</strong> is het mogelijk om de vormgeving van de resultaten te veranderen. Het is mogelijk om weinig details van een pakket te laten zien, maar het is ook mogelijk om een uitgebreide lijst met informatie te maken. Het is alleen mogelijk om &eacute;&eacute;n view te selecteren:
						<br/>
						<i>normaal, uitgebreid, compact</i>
						<br/>
						<br/><br/>
						
						<h3>Soort pakket</h3>
						Met de optie <strong>pakket=""</strong> is het mogelijk om standaard op een soort pakket te filteren. Gebruik de onderstaande namen om in te vullen bij pakket="". Het is alleen mogelijk om &eacute;&eacute;n pakket te selecteren:
						<br/>
						<i>internettvbellen, internettv, internetbellen</i>
						<br/>
						<br/><br/>
						
						<h3>Programma&#39;s</h3>
						Gebruik de onderstaande nummers om in te vullen bij programs="". Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: &programs="3,1,6". Als je alle programma&#39;s wilt gebruik je programs="all".
						<br/>
						<div id="custom_programs"></div>
						<br/><br/>
						
						<h3>Titel van de autoverzekeringvergelijker</h3>
						Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
						<br/><br/>
						
						
						
						
						';
						
				
		echo $output;
	}
	
	public function allesineenAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
		
			if( !isset($array['pakket']) ){
				$array['pakket'] = 'internettvbellen';
			}
			
			if( !isset($array['view']) ){
				$array['view'] = 'normaal';
			}
			
			if( !isset($array['programs']) ){
				$array['programs'] = 'all';
			}
			
			// Register jQuery files
			wp_register_script( 'allesin1', 'http://developers.affiliateprogramma.eu/allesin1/general.js');
			
			// Register stylesheet files
			wp_register_style('stylesheet_allesin1', 'http://developers.affiliateprogramma.eu/allesin1/style.css');
		
			// Add all files to head
			wp_enqueue_script( 'allesin1' );

			wp_enqueue_style( 'stylesheet_allesin1');
									
			if(!empty( $array['title'] )){
				$result .= '	<h2>'.$array['title'].'</h2>';
			}
		
			$result .= '<div class="daisyconAllesineenContainer" data-mediaID="'.$array['mediaid'].'" data-package="'.$array['pakket'].'" data-view="'.$array['view'].'" data-buttonColor="FF7200" data-shadowColor="7E1F06" data-advertiser="'.$array['programs'].'" data-buttonText="Bekijken"></div>';
		}
			
		return($result);
	}
}
?>