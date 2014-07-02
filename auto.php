<?php 
/* Daisycon prijsvergelijkers
 * File: auto.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalAuto{

	public function adminAuto(){
		
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
								url: "http://developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=wintersport&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="http://images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/autoverzekeringvergelijker.gif" alt="" title="" style="float:left;margin-right:20px;" /> <h1>Daisycon Autoverzekeringvergelijker</h1>
						Daisycon heeft exclusief voor haar publishers een gratis autoverzekeringvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende autoverzekeringen met elkaar te vergelijken.
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/autoverzekeringvergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Bij amount vul je het aantal resultaten in dat je wil tonen en je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_auto mediaid="'.$mediaid.'" amount="5" subid=""]
						</div>					
						
						<p>&nbsp;</p>
					
						<h1>Geavanceerd gebruik</h1>
						<br/>
					
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;">
						
							[daisycon_auto mediaid="'.$mediaid.'" amount="5" subid="" view="all" float="left"]
						
						</div>
						
						<br/><br/>
						<h3>Titel van de autoverzekeringvergelijker</h3>
						Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
						<br/><br/>				
						
						<h3>View</h3>
						Met de optie <strong>view=""</strong> is het mogelijk om naast de standaard view (resultaten en sidebar) ook alleen een lijst met resultaten weer te geven of alleen de filters en deze dan door te verwijzen naar de pagina waar de vergelijker staat. De onderstaande opties kunnen ingevuld bij <strong>view=""</strong>:
						<br/>
						<div style="width:130px; float:left;"><i>all</i></div>
						<div style="width:630px; float:left;">Standaard, met <strong>view="all"</strong> worden de sidebar en de resultaten weergegeven</div>
						<br/><br/>
						<div style="width:130px; float:left;"><i>results</i></div>
						<div style="width:630px; float:left;">Gebruik dit om alleen een lijst met resultaten weer te geven</div>
						<br/><br/>
						<div style="width:130px; float:left;"><i>filters</i></div>
						<div style="width:630px; float:left;">Indien deze optie gebruikt wordt moet tevens <strong>url=""</strong> ingevuld worden om aan te geven waar de filters naar toe verwijzen (oftewel de pagina waar de vergelijker staat)</div>
						<br/>
						<br/><br/>
										
						<h3>Sidebar uitlijning</h3>
						Met de optie <strong>float=""</strong> is het mogelijk om de sidebar links of rechts naast de resultaten te plaatsen. Standaard staat de sidebar aan de linkerkant. Gebruik de onderstaande opties om in te vullen bij <strong>float=""</strong>.<br/>
						<i>left, right</i>
						<br/><br/>
						';
						
		$output .=	'<script type="text/javascript">
						jQuery.ajax
						({
							url: "http://developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=auto&jsoncallback=?",
							dataType: "jsonp",
							cache: false,
							success: function(html)
							{
							} 
						});
					</script>';
		
		echo $output;
	}
	
	public function autoAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'auto', 'http://developers.affiliateprogramma.eu/Autoverzekeringvergelijker/general.js');
			
			// Register stylesheet files
			wp_register_style('stylesheet_auto', 'http://developers.affiliateprogramma.eu/Autoverzekeringvergelijker/style.css');
		
			// Add all files to head
			wp_enqueue_script( 'auto' );
			wp_enqueue_style( 'stylesheet_auto');
			
			if( empty($array['amount']) ){
				$array['amount'] = 5;
			}
			
			if( empty($array['view']) ){
				$array['view'] = 'all';
			}
			
			if( empty($array['sidebar']) ){
				$array['sidebar'] = '';
			}
			
			if( empty($array['url']) ){
				$array['url'] = '';
			}
			
			$result = '	<script type="text/javascript">
							var daisyconAutoMediaId='.$array['mediaid'].';
							var daisyconAutoSubId="'.$array['subid'].'";
							var daisyconAutoColor="2B9AE2";
							var daisyconAutoActionColor="FF8201";
							var daisyconAutoColorShaow="006A8B";
							var daisyconAutoActionColorShaow="B22D00";
							daisyconAutoView="'.$array['view'].'";
							daisyconAutoRedirect="'.$array['redirect'].'";
							daisyconAutoSidebar="'.$array['float'].'";
							daisyconAutoLimit='.$array['amount'].';
						</script> ';
			
		if(!empty( $array['title'] )){
			$result .= '	<h2>'.$array['title'].'</h2>';
		}
		
			$result .= '	<div id="daisyconautoVergelijkerContainer"></div>';
		}
			
		return($result);
	}
}
?>