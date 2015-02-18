<?php 
/* Daisycon prijsvergelijkers
 * File: zorg.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalZorg{

	public function adminZorg(){
		
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
								url: "//developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=zorg&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
							
					</script>
		';
		
		$output .= 	'<div style="width:900px;">
			<img src="//images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/Zorgverzekeringvergelijker2.gif" alt="" title="" style="float:left;margin-right:20px;" /><h1>Daisycon Zorgverzekeringvergelijker</h1>
			Daisycon heeft exclusief voor haar publishers een gratis zorgverzekeringvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende zorgverzekeraars met elkaar te vergelijken.
			<br/><br/>
			Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/zorgverzekeringvergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
			<br/><br/>
			<h1>Standaardgebruik</h1>
			Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Bij amount vul je het aantal resultaten in dat je wil tonen.
			<br/><br/>
				
			<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
				[daisycon_zorg mediaid="'.$mediaid.'" amount="15"]
			</div>					
			
			<p>&nbsp;</p>
		
			<h1>Geavanceerd gebruik</h1>
					
			<br/>
			
			<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
				[daisycon_zorg mediaid="'.$mediaid.'" amount="15" default="0" popular="1" risico="360" float="left"]
			
			</div>	
			
			<p>&nbsp;</p>

			Standaard worden de filters ingesteld op 15 zorgverzekeraars een eigen risico van &euro; 360,-. Verder is de defaultwaarde niet ingevuld, staan de filters aan de linkerkant en wordt de meest populaire zorgverzekeraar uitgelicht.
			<br/>
			
			<h3>Default eigen risico</h3>
			Gebruik het onderstaand eigen risico om in te vullen bij <strong>risico=""</strong>.<br/>
			<i>360, 460, 560, 660, 760, 860</i>
			<br/><br/>	
			
			<h3>Titel van de zorgverzekeringvergelijker</h3>
			Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
			<br/><br/>	
			
			<h3>Default waarde</h3>
			Met de optie <strong>default=""</strong> is het mogelijk om een default waarde in te stellen. Als je een default waarde instelt worden automatisch de goedkoopste zorgverzekeringen met de hoogste dekking getoond.<br/><br/>
			<div style="width:200px; float:left;"><u>Geen default waarde</u></div><div style="width:130px; float:left;">0</div><br/>
			<div style="width:200px; float:left;"><u>Tandarts</u></div><div style="width:130px; float:left;">1</div><br/>
			<div style="width:200px; float:left;"><u>Fysiotherapie</u></div><div style="width:130px; float:left;">2</div><br/>
			<div style="width:200px; float:left;"><u>Psychologische hulp</u></div><div style="width:130px; float:left;">3</div><br/>
			<div style="width:200px; float:left;"><u>Bril / lenzen</u></div><div style="width:130px; float:left;">4</div><br/>
			<div style="width:200px; float:left;"><u>Alternatieve geneeswijzen</u></div><div style="width:130px; float:left;">5</div><br/>
			<div style="width:200px; float:left;"><u>Vrije zorgkeuze: Ja</u></div><div style="width:130px; float:left;">6</div><br/>
			<br/><br/>
			
			<h3>Populairste verzekeraar uitlichten</h3>
			Met de optie <strong>popular=""</strong> is het mogelijk om de meest populaire verzekeraar uit te lichten. Standaard staat dit aan. De populairste verzekeraar wordt bepaald op basis van de eCPC die wordt berekend uit alle resultaten van de vergelijker. Wil je de optie uitzetten, gebruik dan <strong>popular="0"</strong>.
			<br/><br/>	
			
			<h3>Filteruitlijning</h3>
			Met de optie <strong>float=""</strong> is het mogelijk om de filters links, rechts of boven de resultaten te plaatsen. Standaard staat het filter aan de linkerkant. Gebruik de onderstaande opties om in te vullen bij <strong>float=""</strong>.<br/>
			<i>left, right, top</i>
			<br/><br/>	
			
			';
		
		echo $output;
	}
	
	public function zorgAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'zorgvergelijker', '//developers.affiliateprogramma.eu/zorgverzekeringvergelijker/vergelijker.js');
	
			// Register stylesheet files
			wp_register_style('stylesheet_zorg', '//developers.affiliateprogramma.eu/zorgverzekeringvergelijker/example.css');
		
			// Add all files to head
			wp_enqueue_script( 'zorgvergelijker' );
			wp_enqueue_style( 'stylesheet_zorg');
			
			if( empty($array['amount']) ){
				$array['amount'] = 15;
			}
			
			if( empty($array['default']) ){
				$array['default'] = 0;
			}
			
			if( empty($array['popular']) ){
				$array['popular'] = 1;
			}
			
			if( empty($array['risico']) ){
				$array['risico'] = 360;
			}
			
			if( empty($array['float']) ){
				$array['float'] = 'left';
			}
			
			// Add comparator
			$result = '<script type="text/javascript">
						mediaid='.$array['mediaid'].';
						max_results='.$array['amount'].';
						defaultvalue='.$array['default'].';
						popular='.$array['popular'].';
						risico='.$array['risico'].';
						buttontekstkleur="FFFFFF";
						buttonkleur="2B9AE2";
						float="'.$array['float'].'";
						</script>';
			
		if(!empty( $array['title'] )){
			$result .= '	<h2>'.$array['title'].'</h2>';
		}
		
			$result .= '	<div id="health-ensurance-wrapper" class="health-ensurance-wrapper"></div>';
		}
			
		return($result);
	}
}
?>