<?php 
/* Daisycon prijsvergelijkers
 * File: dagaanbiedingen.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalDailyoffer{

	public function adminDailyoffer(){
		
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
								url: "//developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=dag&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
							
							function getPrograms()
							{	 
								jQuery.ajax({
									url: "//developers.affiliateprogramma.eu/dagaanbiedingen/generator/data.php?method=wpProgramFilter&jsoncallback=?",
									dataType: "jsonp",
									async: true,
									success: function(data){
										
										jQuery("#custom_programs").html(data); 
													
									}
								});
							}
							
							function getCategories()
							{	 
								jQuery.ajax({
									url: "//developers.affiliateprogramma.eu/dagaanbiedingen/generator/data.php?method=wpCategoryFilter&jsoncallback=?",
									dataType: "jsonp",
									async: true,
									success: function(data){
										
										jQuery("#custom_category").html(data); 
													
									}
								});
							}
							
							jQuery(document).ready(function() {
								getCategories();
								getPrograms();
							});	
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="//www.daisycon.com/shared/daisyconwebsite/img/layout/blog/dagaanbiedingen_affiliate.gif" alt="" title="" style="width:110px;float:left;margin-right:20px;" /> <h1>Daisycon dagaanbiedingen-tool</h1>
						Daisycon heeft exclusief voor haar publishers een gratis dagaanbiedingen-tool ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website dagaanbiedingen te zien. 
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de dagaanbiedingen-tool verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/dagaanbiedingen-tool/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Bij amount vul je het aantal resultaten in dat je wil tonen en je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_dagaanbieding mediaid="'.$mediaid.'" subid=""]
						</div>					
						
						<p>&nbsp;</p>
					
						<h1>Geavanceerd gebruik</h1>
						
						<h3>Programma&#39;s</h3>
						Gebruik de onderstaande nummers om in te vullen bij <strong>programs=""</strong>. Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>programs="2000,3325,5940"</strong>. Als je alle programma&#39;s wilt gebruik je <strong>programs="all"</strong>.<br/><br/>
						<div id="custom_programs"></div>
						<br/>
						
						<h3>Categorie&euml;n</h3>
						Gebruik de onderstaande nummers om in te vullen bij <strong>category=""</strong>. Het is mogelijk om meerdere categorie&euml;n te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>category="Gratis,Mode,Wonen"</strong>. Als je alle categorie&euml;n wilt gebruik je <strong>category="all"</strong>.<br/>
						<div id="custom_category"></div>
						<br/>
						
						<h3>Formaat</h3>
						Met de optie <strong>size=""</strong> is het mogelijk de afmeting van de banner te bepalen. Gebruik <strong>size="dynamic"</strong> om het formaat dynamisch te maken. Gebruik de onderstaande opties om in te vullen bij <strong>size=""</strong>.
						<br/>
						<i>160x300, 250x390, 300x250, 335x390, dynamic</i>
						<br/><br/>
						
						<h3>Slideshow</h3>
						Met de optie <strong>slideshow=""</strong> is het mogelijk de afmeting van de banner te bepalen. Gebruik <strong>slideshow="0"</strong> om de slideshow uit te zetten. Gebruik de onderstaande opties om in te vullen als snelheid voor de slideshow bij <strong>slideshow=""</strong>.
						<br/>
						<i>0, 5000, 8000, 10000</i>
						<br/><br/>
						
						<h3>Maximaal &eacute;&eacute;n aanbieding per aanbieder</h3>
						Met de optie <strong>multiple=""</strong> is het mogelijk om maximaal &eacute;&eacute;n aanbieding per aanbieder te selecteren. Gebruik de onderstaande opties om in te vullen bij <strong>multiple=""</strong>.
						<br>
						<div style="width:100px; float:left;"><i>0</i></div>
						<div style="width:630px; float:left;">Maximaal &eacute;&eacute;n aanbieding per aanbieder</div>
						<div style="clear:both;">
						<div style="width:100px; float:left;"><i>1</i></div>
						<div style="width:630px; float:left;">Meerdere aanbiedingen per aanbieder</div>
						<div style="clear:both;">
						<br/><br/>
						
						<h3>Titel van de Dagaanbiedingen-tool</h3>
						Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
						<br/><br/>
						
						<br><br>Gebruik voor verder geavanceerd gebruik de <a href="" target="_blank">generator</a> voor meer opties.
						
						';
						
				
		echo $output;
	}
	 
	public function dailyofferAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'dagaanbieding', '//developers.affiliateprogramma.eu/dagaanbiedingen/banner.js');
			// Register stylesheet files
			wp_register_style('stylesheet_dagaanbieding', '//developers.affiliateprogramma.eu/dagaanbiedingen/style.css');
		
			// Add all files to head
			wp_enqueue_script( 'dagaanbieding' );
			wp_enqueue_style( 'stylesheet_dagaanbieding'); 
			
			if( empty($array['amount']) ){
				$array['amount'] = 5;
			}
			
			if( empty($array['text']) ){
				$array['text'] = 'Bekijken';
			}
			
			if( empty($array['size']) ){
				$array['size'] = 'dynamic';
			}
			
			if( !isset($array['slideshow']) ){
				$array['slideshow'] = '0';
			}
			
			if( !isset($array['multiple']) ){
				$array['multiple'] = '0';
			}
			
			if( !isset($array['programs']) ){
				$array['programs'] = 'all';
			}
			
			if( !isset($array['category']) ){
				$array['category'] = 'all';
			}
			
			$result = '';
			if(!empty( $array['title'] )){
				$result .= '	<h2>'.$array['title'].'</h2>';
			}
						
			// Add comparator
			$result = '	<div class="DaisyconDailyOffers" data-mediaID="'.$array['mediaid'].'" data-subid="'.$array['subid'].'" data-size="'.$array['size'].'" data-colorButton="FF8201" data-colorHead="2B9AE2" data-text="'.$array['text'].'" data-multiple="'.$array['multiple'].'" data-price="3000" data-category="'.$array['category'].'" data-advertiser="'.$array['programs'].'" data-speed="'.$array['slideshow'].'"></div>';

		}
			
		return($result);
	}
}
?>