<?
//$aws_debug_flag = true;

// FUNCTION TO AUTOMATICALLY ADD MEME CATEGORIES BASED ON SLUG CONTENTS
// fold
function atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,$slug_check,$slug_value){
	//$aws_debug_flag = true;
	$temp_slug = "xxx-".$temp_slug."-xxx";
	if (strpos($temp_slug,$slug_check)){
		$temp_query = "SELECT term_taxonomy_id FROM wp_term_relationships WHERE (object_id = '".$id."' AND term_taxonomy_id ='".$slug_value."') ";
		if ($aws_debug_flag){echo "<br>querystr ".$temp_query;}
		$meme_categories = $wpdb->get_var($temp_query);
		$maxcount = count($meme_categories);
		if ($aws_debug_flag){echo "<br>maxcount ".$maxcount;}
		if($maxcount == 0){
			if ($aws_debug_flag){echo "<br>Do the DB Insert ";}
			$querystr = "INSERT into wp_term_relationships  (object_id, term_taxonomy_id ,  term_order ) values ('".$id."', '".$slug_value."',  '0' )";
			if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
			$wpdb->query($querystr); //update the db
		}else{
			if ($aws_debug_flag){echo "<br>It's already there do nothing ";}
		}
	}
}
// endfold

//CHECK THESES CATEGORIES
// fold
if(strpos($temp_slug,"-4chan")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-4chan","274");}
if(strpos($temp_slug,"-gender-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-gender-","168");}
if(strpos($temp_slug,"-maul-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-maul-","229");}
if(strpos($temp_slug,"-pres-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-pres-","206");}
if(strpos($temp_slug,"-quote-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-quote-","208");}
if(strpos($temp_slug,"-race-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-race-","209");}
if(strpos($temp_slug,"-rey-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-rey-","229");}
if(strpos($temp_slug,"-santa-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-santa-","273");}
if(strpos($temp_slug,"-scotus-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-scotus-","233");}
if(strpos($temp_slug,"-splc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-splc-","220");}
if(strpos($temp_slug,"-splc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-splc-","196");}
if(strpos($temp_slug,"-splc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-splc-","186");}
if(strpos($temp_slug,"-stat-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-stat-","230");}
if(strpos($temp_slug,"-stats-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-stats-","230");}
if(strpos($temp_slug,"-sw-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-sw-","229");}
if(strpos($temp_slug,"-tax-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-tax-","234");}
if(strpos($temp_slug,"-taxation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-taxation-","234");}
if(strpos($temp_slug,"-taxes-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-taxes-","234");}
if(strpos($temp_slug,"-tj-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-tj-","276");}
if(strpos($temp_slug,"-uk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-uk-","242");}
if(strpos($temp_slug,"-un-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-un-","251");}
if(strpos($temp_slug,"-un-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-un-","290");}
if(strpos($temp_slug,"-zog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-zog-","257");}
if(strpos($temp_slug,"1a-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"1a-","105");}
if(strpos($temp_slug,"2a-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"2a-","113");}
if(strpos($temp_slug,"abortion-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"abortion-","114");}
if(strpos($temp_slug,"aclu-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"aclu-","115");}
if(strpos($temp_slug,"africa-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"africa-","116");}
if(strpos($temp_slug,"air-force-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"air-force-","182");}
if(strpos($temp_slug,"airforce-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"airforce-","182");}
if(strpos($temp_slug,"america-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"america-","118");}
if(strpos($temp_slug,"anderson-cooper")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"anderson-cooper","227");}
if(strpos($temp_slug,"anderson-cooper")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"anderson-cooper","76");}
if(strpos($temp_slug,"andrew-yang")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"andrew-yang","119");}
if(strpos($temp_slug,"animals-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"animals-","120");}
if(strpos($temp_slug,"ann-coulter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ann-coulter-","121");}
if(strpos($temp_slug,"anne-frank-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"anne-frank-","112");}
if(strpos($temp_slug,"anti-white")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"anti-white","122");}
if(strpos($temp_slug,"antifa-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"antifa-","123");}
if(strpos($temp_slug,"aoc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"aoc-","265");}
if(strpos($temp_slug,"aoc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"aoc-","148");}
if(strpos($temp_slug,"aoc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"aoc-","297");}
if(strpos($temp_slug,"aoc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"aoc-","298");}
if(strpos($temp_slug,"army-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"army-","182");}
if(strpos($temp_slug,"aslan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"aslan-","124");}
if(strpos($temp_slug,"assange-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"assange-","125");}
if(strpos($temp_slug,"assange-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"assange-","254");}
if(strpos($temp_slug,"avenatti-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avenatti-","194");}
if(strpos($temp_slug,"avenatti-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avenatti-","194");}
if(strpos($temp_slug,"avenatti-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avenatti-","297");}
if(strpos($temp_slug,"avenetti-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avenetti-","194");}
if(strpos($temp_slug,"avenetti-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avenetti-","194");}
if(strpos($temp_slug,"avenetti-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avenetti-","297");}
if(strpos($temp_slug,"avengers-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"avengers-","259");}
if(strpos($temp_slug,"bacon-haters-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bacon-haters-","126");}
if(strpos($temp_slug,"ballot-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ballot-","245");}
if(strpos($temp_slug,"ben-shapiro-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ben-shapiro-","127");}
if(strpos($temp_slug,"bernie-sanders-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bernie-sanders-","128");}
if(strpos($temp_slug,"beto-orourke-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"beto-orourke-","129");}
if(strpos($temp_slug,"bilbo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bilbo-","175");}
if(strpos($temp_slug,"black-ariel-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"black-ariel-","130");}
if(strpos($temp_slug,"black-bond-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"black-bond-","73");}
if(strpos($temp_slug,"black-james-bond-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"black-james-bond-","73");}
if(strpos($temp_slug,"black-people-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"black-people-","132");}
if(strpos($temp_slug,"blackpanther-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"blackpanther-","259");}
if(strpos($temp_slug,"blackpanther-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"blackpanther-","294");}
if(strpos($temp_slug,"blasey-ford-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"blasey-ford-","88");}
if(strpos($temp_slug,"blm-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"blm-","131");}
if(strpos($temp_slug,"bluecheckmark-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bluecheckmark-","126");}
if(strpos($temp_slug,"bluecheckmark-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bluecheckmark-","241");}
if(strpos($temp_slug,"bolton-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bolton-","92");}
if(strpos($temp_slug,"booker-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"booker-","142");}
if(strpos($temp_slug,"booker-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"booker-","148");}
if(strpos($temp_slug,"booker-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"booker-","297");}
if(strpos($temp_slug,"boomer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"boomer-","101");}
if(strpos($temp_slug,"border-caravan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"border-caravan-","74");}
if(strpos($temp_slug,"border-caravan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"border-caravan-","179");}
if(strpos($temp_slug,"borimir-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"borimir-","175");}
if(strpos($temp_slug,"brian-stelter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"brian-stelter-","226");}
if(strpos($temp_slug,"brian-stelter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"brian-stelter-","76");}
if(strpos($temp_slug,"brian-stelter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"brian-stelter-","161");}
if(strpos($temp_slug,"bush-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"bush-","206");}
if(strpos($temp_slug,"buttigieg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"buttigieg-","202");}
if(strpos($temp_slug,"buttigieg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"buttigieg-","148");}
if(strpos($temp_slug,"captain-america-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"captain-america-","259");}
if(strpos($temp_slug,"captainamerica-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"captainamerica-","259");}
if(strpos($temp_slug,"carter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"carter-","206");}
if(strpos($temp_slug,"charliekirk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"charliekirk-","239");}
if(strpos($temp_slug,"chickfila-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"chickfila-","87");}
if(strpos($temp_slug,"china-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"china-","135");}
if(strpos($temp_slug,"cia-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cia-","136");}
if(strpos($temp_slug,"ciamarella-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ciamarella-","126");}
if(strpos($temp_slug,"ciamarella-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ciamarella-","147");}
if(strpos($temp_slug,"ciamarella-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ciamarella-","104");}
if(strpos($temp_slug,"ciamarella-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ciamarella-","97");}
if(strpos($temp_slug,"civil-war-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"civil-war-","107");}
if(strpos($temp_slug,"civilwar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"civilwar-","107");}
if(strpos($temp_slug,"climate-change-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"climate-change-","77");}
if(strpos($temp_slug,"clinton -")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"clinton -","206");}
if(strpos($temp_slug,"clock-boy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"clock-boy-","75");}
if(strpos($temp_slug,"clockboy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"clockboy-","75");}
if(strpos($temp_slug,"clown-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"clown-","137");}
if(strpos($temp_slug,"clowns-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"clowns-","137");}
if(strpos($temp_slug,"cnn-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cnn-","76");}
if(strpos($temp_slug,"cnn-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cnn-","161");}
if(strpos($temp_slug,"colonizer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"colonizer-","253");}
if(strpos($temp_slug,"congress-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"congress-","139");}
if(strpos($temp_slug,"conspiracy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"conspiracy-","140");}
if(strpos($temp_slug,"constitution-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"constitution-","141");}
if(strpos($temp_slug,"container-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"container-","188");}
if(strpos($temp_slug,"cosmo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cosmo-","143");}
if(strpos($temp_slug,"cosmopolitan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cosmopolitan-","143");}
if(strpos($temp_slug,"covington-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"covington-","144");}
if(strpos($temp_slug,"crime-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"crime-","145");}
if(strpos($temp_slug,"cufi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cufi-","126");}
if(strpos($temp_slug,"cufi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cufi-","257");}
if(strpos($temp_slug,"cufi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cufi-","195");}
if(strpos($temp_slug,"cufi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cufi-","86");}
if(strpos($temp_slug,"cultural-appropriation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"cultural-appropriation-","253");}
if(strpos($temp_slug,"culturalappropriation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"culturalappropriation-","253");}
if(strpos($temp_slug,"daca-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"daca-","179");}
if(strpos($temp_slug,"daca-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"daca-","291");}
if(strpos($temp_slug,"darth-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"darth-","229");}
if(strpos($temp_slug,"dating-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dating-","211");}
if(strpos($temp_slug,"deathstar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"deathstar-","229");}
if(strpos($temp_slug,"deep-state-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"deep-state-","147");}
if(strpos($temp_slug,"deepstate-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"deepstate-","147");}
if(strpos($temp_slug,"democrat-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"democrat-","148");}
if(strpos($temp_slug,"democrats-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"democrats-","148");}
if(strpos($temp_slug,"disney-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"disney-","150");}
if(strpos($temp_slug,"diversity-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-","56");}
if(strpos($temp_slug,"diversity-shooter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooter-","56");}
if(strpos($temp_slug,"diversity-shooter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooter-","132");}
if(strpos($temp_slug,"diversity-shooter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooter-","145");}
if(strpos($temp_slug,"diversity-shooter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooter-","296");}
if(strpos($temp_slug,"diversity-shooting-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooting-","56");}
if(strpos($temp_slug,"diversity-shooting-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooting-","132");}
if(strpos($temp_slug,"diversity-shooting-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooting-","145");}
if(strpos($temp_slug,"diversity-shooting-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"diversity-shooting-","296");}
if(strpos($temp_slug,"dna-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dna-","152");}
if(strpos($temp_slug,"dod-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dod-","70");}
if(strpos($temp_slug,"dog-right-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dog-right-","153");}
if(strpos($temp_slug,"dogright-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dogright-","153");}
if(strpos($temp_slug,"drag-queens-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"drag-queens-","154");}
if(strpos($temp_slug,"dragqueen-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dragqueen-","154");}
if(strpos($temp_slug,"dragqueens-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"dragqueens-","154");}
if(strpos($temp_slug,"drford-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"drford-","88");}
if(strpos($temp_slug,"drford-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"drford-","297");}
if(strpos($temp_slug,"drstrange-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"drstrange-","259");}
if(strpos($temp_slug,"eat-the-bugs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"eat-the-bugs-","81");}
if(strpos($temp_slug,"eatbugs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"eatbugs-","81");}
if(strpos($temp_slug,"eatthebugs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"eatthebugs-","81");}
if(strpos($temp_slug,"eisenhower-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"eisenhower-","206");}
if(strpos($temp_slug,"electoral-college-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"electoral-college-","157");}
if(strpos($temp_slug,"electoralcollege-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"electoralcollege-","157");}
if(strpos($temp_slug,"elizabeth-warren-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"elizabeth-warren-","103");}
if(strpos($temp_slug,"england-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"england-","242");}
if(strpos($temp_slug,"epstein-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"epstein-","79");}
if(strpos($temp_slug,"eu-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"eu-","158");}
if(strpos($temp_slug,"european-union-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"european-union-","158");}
if(strpos($temp_slug,"european-union-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"european-union-","290");}
if(strpos($temp_slug,"europeanman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanman-","196");}
if(strpos($temp_slug,"europeanman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanman-","86");}
if(strpos($temp_slug,"europeanman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanman-","236");}
if(strpos($temp_slug,"europeanman1-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanman1-","196");}
if(strpos($temp_slug,"europeanman1-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanman1-","86");}
if(strpos($temp_slug,"europeanman1-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanman1-","236");}
if(strpos($temp_slug,"europeanmanarchives-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanmanarchives-","196");}
if(strpos($temp_slug,"europeanmanarchives-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanmanarchives-","86");}
if(strpos($temp_slug,"europeanmanarchives-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"europeanmanarchives-","236");}
if(strpos($temp_slug,"facebook-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"facebook-","159");}
if(strpos($temp_slug,"fail-gifs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fail-gifs-","160");}
if(strpos($temp_slug,"fake-news-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fake-news-","161");}
if(strpos($temp_slug,"fakenews-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fakenews-","161");}
if(strpos($temp_slug,"fashion-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fashion-","162");}
if(strpos($temp_slug,"fb-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fb-","159");}
if(strpos($temp_slug,"fbi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fbi-","82");}
if(strpos($temp_slug,"female-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"female-","255");}
if(strpos($temp_slug,"feminism-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"feminism-","164");}
if(strpos($temp_slug,"ff-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ff-","113");}
if(strpos($temp_slug,"finedog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"finedog-","237");}
if(strpos($temp_slug,"firedog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"firedog-","237");}
if(strpos($temp_slug,"florida-man-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"florida-man-","225");}
if(strpos($temp_slug,"floridaman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"floridaman-","225");}
if(strpos($temp_slug,"ford-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ford-","206");}
if(strpos($temp_slug,"founding-fathers-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"founding-fathers-","113");}
if(strpos($temp_slug,"foundingfathers-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"foundingfathers-","113");}
if(strpos($temp_slug,"france-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"france-","166");}
if(strpos($temp_slug,"franklin-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"franklin-","113");}
if(strpos($temp_slug,"franklin-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"franklin-","279");}
if(strpos($temp_slug,"frodo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"frodo-","175");}
if(strpos($temp_slug,"frogs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"frogs-","138");}
if(strpos($temp_slug,"frozen-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"frozen-","167");}
if(strpos($temp_slug,"frozen-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"frozen-","150");}
if(strpos($temp_slug,"fwp-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fwp-","163");}
if(strpos($temp_slug,"fwp-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fwp-","196");}
if(strpos($temp_slug,"fwp-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"fwp-","86");}
if(strpos($temp_slug,"gandalf-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gandalf-","175");}
if(strpos($temp_slug,"gandhi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gandhi-","284");}
if(strpos($temp_slug,"gender-gap-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gender-gap-","169");}
if(strpos($temp_slug,"gendergap-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gendergap-","169");}
if(strpos($temp_slug,"geography-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"geography-","170");}
if(strpos($temp_slug,"germany-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"germany-","172");}
if(strpos($temp_slug,"gillette-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gillette-","174");}
if(strpos($temp_slug,"ginsburg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ginsburg-","215");}
if(strpos($temp_slug,"ginsburg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ginsburg-","233");}
if(strpos($temp_slug,"ginsburg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ginsburg-","297");}
if(strpos($temp_slug,"gollum-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gollum-","175");}
if(strpos($temp_slug,"gondor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gondor-","175");}
if(strpos($temp_slug,"gop-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gop-","176");}
if(strpos($temp_slug,"grant-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"grant-","206");}
if(strpos($temp_slug,"greta-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"greta-","83");}
if(strpos($temp_slug,"greta-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"greta-","77");}
if(strpos($temp_slug,"groyper-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"groyper-","138");}
if(strpos($temp_slug,"groypers-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"groypers-","138");}
if(strpos($temp_slug,"gw-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"gw-","278");}
if(strpos($temp_slug,"hamilton-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hamilton-","285");}
if(strpos($temp_slug,"hancock-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hancock-","113");}
if(strpos($temp_slug,"harambe-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"harambe-","84");}
if(strpos($temp_slug,"hawaii-judge-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hawaii-judge-","85");}
if(strpos($temp_slug,"hawaii-judge-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hawaii-judge-","147");}
if(strpos($temp_slug,"hawaiijudge-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hawaiijudge-","85");}
if(strpos($temp_slug,"hawaiijudge-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hawaiijudge-","147");}
if(strpos($temp_slug,"healthcare-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"healthcare-","177");}
if(strpos($temp_slug,"hero-dog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hero-dog-","64");}
if(strpos($temp_slug,"hero-dog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hero-dog-","300");}
if(strpos($temp_slug,"herodog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"herodog-","64");}
if(strpos($temp_slug,"herodog-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"herodog-","300");}
if(strpos($temp_slug,"hoax-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hoax-","299");}
if(strpos($temp_slug,"hobbits-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hobbits-","175");}
if(strpos($temp_slug,"hogg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hogg-","95");}
if(strpos($temp_slug,"hogg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hogg-","201");}
if(strpos($temp_slug,"holocaust-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"holocaust-","111");}
if(strpos($temp_slug,"holocaust-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"holocaust-","86");}
if(strpos($temp_slug,"holocaust-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"holocaust-","196");}
if(strpos($temp_slug,"honkler-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"honkler-","137");}
if(strpos($temp_slug,"honklers-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"honklers-","137");}
if(strpos($temp_slug,"hoover-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hoover-","206");}
if(strpos($temp_slug,"house-of-representatives-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"house-of-representatives-","178");}
if(strpos($temp_slug,"houserep-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"houserep-","178");}
if(strpos($temp_slug,"hulk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"hulk-","259");}
if(strpos($temp_slug,"ilhan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ilhan-","96");}
if(strpos($temp_slug,"ilhan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ilhan-","148");}
if(strpos($temp_slug,"ilhan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ilhan-","126");}
if(strpos($temp_slug,"immigration-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"immigration-","179");}
if(strpos($temp_slug,"impeachment-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"impeachment-","97");}
if(strpos($temp_slug,"infinity-stones-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"infinity-stones-","259");}
if(strpos($temp_slug,"infinitystones-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"infinitystones-","259");}
if(strpos($temp_slug,"iran-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"iran-","180");}
if(strpos($temp_slug,"ironman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ironman-","259");}
if(strpos($temp_slug,"its-ok-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"its-ok-","91");}
if(strpos($temp_slug,"itsok-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"itsok-","91");}
if(strpos($temp_slug,"jackson-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jackson-","206");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","113");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","280");}
if(strpos($temp_slug,"jadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jadams-","206");}
if(strpos($temp_slug,"jbiden-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jbiden-","89");}
if(strpos($temp_slug,"jedi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jedi-","229");}
if(strpos($temp_slug,"jefferson-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jefferson-","206");}
if(strpos($temp_slug,"jefferson-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jefferson-","276");}
if(strpos($temp_slug,"jesus-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jesus-","261");}
if(strpos($temp_slug,"jesus-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jesus-","262");}
if(strpos($temp_slug,"jesus-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jesus-","292");}
if(strpos($temp_slug,"jfk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jfk-","206");}
if(strpos($temp_slug,"joe-biden-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"joe-biden-","89");}
if(strpos($temp_slug,"joebiden-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"joebiden-","89");}
if(strpos($temp_slug,"john-adams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"john-adams-","113");}
if(strpos($temp_slug,"john-adams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"john-adams-","280");}
if(strpos($temp_slug,"john-adams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"john-adams-","206");}
if(strpos($temp_slug,"johnadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"johnadams-","113");}
if(strpos($temp_slug,"johnadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"johnadams-","280");}
if(strpos($temp_slug,"johnadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"johnadams-","206");}
if(strpos($temp_slug,"johnson-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"johnson-","206");}
if(strpos($temp_slug,"johnson-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"johnson-","206");}
if(strpos($temp_slug,"jsoc")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"jsoc","182");}
if(strpos($temp_slug,"k-9-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"k-9-","300");}
if(strpos($temp_slug,"k-9-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"k-9-","153");}
if(strpos($temp_slug,"k9-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"k9-","300");}
if(strpos($temp_slug,"k9-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"k9-","153");}
if(strpos($temp_slug,"kaepernick-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kaepernick-","271");}
if(strpos($temp_slug,"kamala-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kamala-","184");}
if(strpos($temp_slug,"kamala-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kamala-","148");}
if(strpos($temp_slug,"kavanaugh-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kavanaugh-","183");}
if(strpos($temp_slug,"kavanaugh-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kavanaugh-","233");}
if(strpos($temp_slug,"kennedy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kennedy-","206");}
if(strpos($temp_slug,"kenobi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kenobi-","229");}
if(strpos($temp_slug,"kirk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kirk-","260");}
if(strpos($temp_slug,"kushner-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kushner-","63");}
if(strpos($temp_slug,"kushner-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kushner-","86");}
if(strpos($temp_slug,"kushner-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kushner-","257");}
if(strpos($temp_slug,"kylo-ren-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kylo-ren-","229");}
if(strpos($temp_slug,"kyloren-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"kyloren-","229");}
if(strpos($temp_slug,"law-enforcement-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"law-enforcement-","203");}
if(strpos($temp_slug,"lawenforcement-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lawenforcement-","203");}
if(strpos($temp_slug,"leo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"leo-","203");}
if(strpos($temp_slug,"lgbtq-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lgbtq-","126");}
if(strpos($temp_slug,"lgbtq-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lgbtq-","207");}
if(strpos($temp_slug,"light-saber-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"light-saber-","229");}
if(strpos($temp_slug,"lightsaber-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lightsaber-","229");}
if(strpos($temp_slug,"lincoln-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lincoln-","206");}
if(strpos($temp_slug,"literally-racist-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"literally-racist-","187");}
if(strpos($temp_slug,"literallyracist-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"literallyracist-","187");}
if(strpos($temp_slug,"london-mayor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"london-mayor-","189");}
if(strpos($temp_slug,"london-mayor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"london-mayor-","242");}
if(strpos($temp_slug,"london-mayor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"london-mayor-","126");}
if(strpos($temp_slug,"londonmayor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"londonmayor-","189");}
if(strpos($temp_slug,"londonmayor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"londonmayor-","242");}
if(strpos($temp_slug,"londonmayor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"londonmayor-","126");}
if(strpos($temp_slug,"losttv-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"losttv-","190");}
if(strpos($temp_slug,"lotr-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lotr-","175");}
if(strpos($temp_slug,"love-democracy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"love-democracy-","229");}
if(strpos($temp_slug,"lovedemocracy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lovedemocracy-","229");}
if(strpos($temp_slug,"lrr-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"lrr-","187");}
if(strpos($temp_slug,"maam-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maam-","90");}
if(strpos($temp_slug,"macron-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"macron-","191");}
if(strpos($temp_slug,"macron-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"macron-","166");}
if(strpos($temp_slug,"madison-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"madison-","113");}
if(strpos($temp_slug,"madison-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"madison-","277");}
if(strpos($temp_slug,"madison-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"madison-","206");}
if(strpos($temp_slug,"mafia-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"mafia-","286");}
if(strpos($temp_slug,"maga-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maga-","263");}
if(strpos($temp_slug,"maga-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maga-","62");}
if(strpos($temp_slug,"mandalorian-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"mandalorian-","229");}
if(strpos($temp_slug,"manifesto-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"manifesto-","192");}
if(strpos($temp_slug,"manifesto-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"manifesto-","295");}
if(strpos($temp_slug,"marine")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"marine","182");}
if(strpos($temp_slug,"marines-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"marines-","182");}
if(strpos($temp_slug,"marvel-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"marvel-","259");}
if(strpos($temp_slug,"masculine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"masculine-","193");}
if(strpos($temp_slug,"masculinity-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"masculinity-","193");}
if(strpos($temp_slug,"maxine-waters")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maxine-waters","221");}
if(strpos($temp_slug,"maxine-waters")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maxine-waters","148");}
if(strpos($temp_slug,"maxinewaters")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maxinewaters","221");}
if(strpos($temp_slug,"maxinewaters")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"maxinewaters","148");}
if(strpos($temp_slug,"mcdonalds-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"mcdonalds-","247");}
if(strpos($temp_slug,"mckinley-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"mckinley-","206");}
if(strpos($temp_slug,"meme-magic-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"meme-magic-","258");}
if(strpos($temp_slug,"men-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"men-","193");}
if(strpos($temp_slug,"meteor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"meteor-","173");}
if(strpos($temp_slug,"middle-earth-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"middle-earth-","175");}
if(strpos($temp_slug,"middleearth-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"middleearth-","175");}
if(strpos($temp_slug,"military-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"military-","182");}
if(strpos($temp_slug,"misc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"misc-","31");}
if(strpos($temp_slug,"miscellaneous-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"miscellaneous-","31");}
if(strpos($temp_slug,"mom-dancing-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"mom-dancing-","99");}
if(strpos($temp_slug,"momdancing-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"momdancing-","99");}
if(strpos($temp_slug,"moms-dancing-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"moms-dancing-","99");}
if(strpos($temp_slug,"momsdancing-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"momsdancing-","99");}
if(strpos($temp_slug,"monroe-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"monroe-","113");}
if(strpos($temp_slug,"monroe-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"monroe-","206");}
if(strpos($temp_slug,"morder-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"morder-","175");}
if(strpos($temp_slug,"narnia-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"narnia-","124");}
if(strpos($temp_slug,"navy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"navy-","182");}
if(strpos($temp_slug,"nazi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nazi-","195");}
if(strpos($temp_slug,"nazis-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nazis-","195");}
if(strpos($temp_slug,"new-york-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"new-york-","224");}
if(strpos($temp_slug,"newyork-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"newyork-","224");}
if(strpos($temp_slug,"newyorktimes-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"newyorktimes-","197");}
if(strpos($temp_slug,"newyorktimes-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"newyorktimes-","161");}
if(strpos($temp_slug,"nike-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nike-","100");}
if(strpos($temp_slug,"nixon-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nixon-","206");}
if(strpos($temp_slug,"non-binary")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"non-binary","168");}
if(strpos($temp_slug,"nonbinary")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nonbinary","168");}
if(strpos($temp_slug,"notice-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"notice-","196");}
if(strpos($temp_slug,"notice-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"notice-","86");}
if(strpos($temp_slug,"noticer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"noticer-","196");}
if(strpos($temp_slug,"noticer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"noticer-","86");}
if(strpos($temp_slug,"noticer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"noticer-","236");}
if(strpos($temp_slug,"noticethings-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"noticethings-","196");}
if(strpos($temp_slug,"noticethings-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"noticethings-","86");}
if(strpos($temp_slug,"nra-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nra-","126");}
if(strpos($temp_slug,"nra-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nra-","113");}
if(strpos($temp_slug,"-ny-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"-ny-","224");}
if(strpos($temp_slug,"nyt-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nyt-","197");}
if(strpos($temp_slug,"nyt-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"nyt-","161");}
if(strpos($temp_slug,"obama-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"obama-","198");}
if(strpos($temp_slug,"obama-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"obama-","206");}
if(strpos($temp_slug,"ocasio-cortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasio-cortez-","265");}
if(strpos($temp_slug,"ocasio-cortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasio-cortez-","148");}
if(strpos($temp_slug,"ocasio-cortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasio-cortez-","297");}
if(strpos($temp_slug,"ocasio-cortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasio-cortez-","298");}
if(strpos($temp_slug,"ocasiocortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasiocortez-","265");}
if(strpos($temp_slug,"ocasiocortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasiocortez-","148");}
if(strpos($temp_slug,"ocasiocortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasiocortez-","297");}
if(strpos($temp_slug,"ocasiocortez-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ocasiocortez-","298");}
if(strpos($temp_slug,"okboomer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"okboomer-","101");}
if(strpos($temp_slug,"omar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"omar-","96");}
if(strpos($temp_slug,"omar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"omar-","148");}
if(strpos($temp_slug,"omar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"omar-","126");}
if(strpos($temp_slug,"omar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"omar-","297");}
if(strpos($temp_slug,"omar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"omar-","298");}
if(strpos($temp_slug,"omar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"omar-","297");}
if(strpos($temp_slug,"oprah-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"oprah-","199");}
if(strpos($temp_slug,"orc-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"orc-","175");}
if(strpos($temp_slug,"orcs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"orcs-","175");}
if(strpos($temp_slug,"otter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"otter-","200");}
if(strpos($temp_slug,"otter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"otter-","120");}
if(strpos($temp_slug,"otters-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"otters-","200");}
if(strpos($temp_slug,"otters-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"otters-","120");}
if(strpos($temp_slug,"palpatine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"palpatine-","229");}
if(strpos($temp_slug,"parkland-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"parkland-","201");}
if(strpos($temp_slug,"parody-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"parody-","301");}
if(strpos($temp_slug,"patrick-henry-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"patrick-henry-","113");}
if(strpos($temp_slug,"patrick-henry-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"patrick-henry-","281");}
if(strpos($temp_slug,"patrickhenry-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"patrickhenry-","113");}
if(strpos($temp_slug,"patrickhenry-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"patrickhenry-","281");}
if(strpos($temp_slug,"pelosi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pelosi-","65");}
if(strpos($temp_slug,"pelosi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pelosi-","148");}
if(strpos($temp_slug,"pelosi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pelosi-","297");}
if(strpos($temp_slug,"pelosi-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pelosi-","178");}
if(strpos($temp_slug,"pence-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pence-","155");}
if(strpos($temp_slug,"pepe-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pepe-","138");}
if(strpos($temp_slug,"perkins-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"perkins-","229");}
if(strpos($temp_slug,"phenry-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"phenry-","113");}
if(strpos($temp_slug,"picard-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"picard-","260");}
if(strpos($temp_slug,"pocahontas-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pocahontas-","103");}
if(strpos($temp_slug,"pocahontas-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pocahontas-","148");}
if(strpos($temp_slug,"police-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"police-","203");}
if(strpos($temp_slug,"polyamorous-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"polyamorous-","204");}
if(strpos($temp_slug,"polyamory-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"polyamory-","204");}
if(strpos($temp_slug,"pop-culture-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"pop-culture-","287");}
if(strpos($temp_slug,"popculture-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"popculture-","287");}
if(strpos($temp_slug,"popeyes-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"popeyes-","205");}
if(strpos($temp_slug,"popo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"popo-","203");}
if(strpos($temp_slug,"president-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"president-","206");}
if(strpos($temp_slug,"presidents-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"presidents-","206");}
if(strpos($temp_slug,"primary-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"primary-","245");}
if(strpos($temp_slug,"progressive-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"progressive-","207");}
if(strpos($temp_slug,"progressives-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"progressives-","207");}
if(strpos($temp_slug,"putin-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"putin-","214");}
if(strpos($temp_slug,"quote-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"quote-","208");}
if(strpos($temp_slug,"rangers")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"rangers","182");}
if(strpos($temp_slug,"rbg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"rbg-","215");}
if(strpos($temp_slug,"rbg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"rbg-","233");}
if(strpos($temp_slug,"rbg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"rbg-","297");}
if(strpos($temp_slug,"reaction-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reaction-","210");}
if(strpos($temp_slug,"reaction-gif-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reaction-gif-","210");}
if(strpos($temp_slug,"reaction-gifs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reaction-gifs-","210");}
if(strpos($temp_slug,"reaction-gifs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reaction-gifs-","210");}
if(strpos($temp_slug,"reactiongif-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reactiongif-","210");}
if(strpos($temp_slug,"reactiongifs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reactiongifs-","210");}
if(strpos($temp_slug,"reactions-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reactions-","210");}
if(strpos($temp_slug,"reagan-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reagan-","206");}
if(strpos($temp_slug,"relationship-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"relationship-","211");}
if(strpos($temp_slug,"relationships-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"relationships-","211");}
if(strpos($temp_slug,"religion-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"religion-","261");}
if(strpos($temp_slug,"religions-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"religions-","261");}
if(strpos($temp_slug,"religious-group-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"religious-group-","86");}
if(strpos($temp_slug,"reparation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reparation-","109");}
if(strpos($temp_slug,"reparation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reparation-","132");}
if(strpos($temp_slug,"reparation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reparation-","108");}
if(strpos($temp_slug,"reparations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reparations-","109");}
if(strpos($temp_slug,"reparations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reparations-","132");}
if(strpos($temp_slug,"reparations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"reparations-","108");}
if(strpos($temp_slug,"republican-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"republican-","176");}
if(strpos($temp_slug,"republicans-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"republicans-","176");}
if(strpos($temp_slug,"road-sign-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"road-sign-","212");}
if(strpos($temp_slug,"road-signs-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"road-signs-","212");}
if(strpos($temp_slug,"roadsign-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"roadsign-","212");}
if(strpos($temp_slug,"roadsigns-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"roadsigns-","212");}
if(strpos($temp_slug,"roddy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"roddy-","213");}
if(strpos($temp_slug,"roosevelt-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"roosevelt-","206");}
if(strpos($temp_slug,"russian-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"russian-","214");}
if(strpos($temp_slug,"russians-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"russians-","214");}
if(strpos($temp_slug,"sadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sadams-","113");}
if(strpos($temp_slug,"sadams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sadams-","282");}
if(strpos($temp_slug,"samuel-adams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"samuel-adams-","113");}
if(strpos($temp_slug,"samuel-adams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"samuel-adams-","282");}
if(strpos($temp_slug,"samueladams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"samueladams-","113");}
if(strpos($temp_slug,"samueladams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"samueladams-","282");}
if(strpos($temp_slug,"saruman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"saruman-","175");}
if(strpos($temp_slug,"sauron-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sauron-","175");}
if(strpos($temp_slug,"schiff-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"schiff-","66");}
if(strpos($temp_slug,"schumer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"schumer-","102");}
if(strpos($temp_slug,"schumer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"schumer-","148");}
if(strpos($temp_slug,"schumer-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"schumer-","297");}
if(strpos($temp_slug,"seals")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"seals","182");}
if(strpos($temp_slug,"senate-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"senate-","216");}
if(strpos($temp_slug,"senator-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"senator-","216");}
if(strpos($temp_slug,"seth-rich-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"seth-rich-","217");}
if(strpos($temp_slug,"sethrich-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sethrich-","217");}
if(strpos($temp_slug,"sexy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sexy-","218");}
if(strpos($temp_slug,"shooters-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"shooters-","192");}
if(strpos($temp_slug,"shooting-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"shooting-","192");}
if(strpos($temp_slug,"sith-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sith-","229");}
if(strpos($temp_slug,"sjw-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"sjw-","219");}
if(strpos($temp_slug,"slave-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"slave-","108");}
if(strpos($temp_slug,"slavery-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"slavery-","108");}
if(strpos($temp_slug,"slaves-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"slaves-","108");}
if(strpos($temp_slug,"snowden-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"snowden-","117");}
if(strpos($temp_slug,"social-justice-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"social-justice-","219");}
if(strpos($temp_slug,"socialjustice-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"socialjustice-","219");}
if(strpos($temp_slug,"soros-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"soros-","171");}
if(strpos($temp_slug,"soros-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"soros-","290");}
if(strpos($temp_slug,"special-forces")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"special-forces","182");}
if(strpos($temp_slug,"specialforces")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"specialforces","182");}
if(strpos($temp_slug,"spock-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"spock-","260");}
if(strpos($temp_slug,"stacy-abrams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"stacy-abrams-","228");}
if(strpos($temp_slug,"stacyabrams-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"stacyabrams-","228");}
if(strpos($temp_slug,"star-trek-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"star-trek-","260");}
if(strpos($temp_slug,"star-wars-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"star-wars-","229");}
if(strpos($temp_slug,"startrek-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"startrek-","260");}
if(strpos($temp_slug,"starwars-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"starwars-","229");}
if(strpos($temp_slug,"statistic-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"statistic-","230");}
if(strpos($temp_slug,"statistics-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"statistics-","230");}
if(strpos($temp_slug,"stormy-daniels-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"stormy-daniels-","231");}
if(strpos($temp_slug,"stormydaniels-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"stormydaniels-","231");}
if(strpos($temp_slug,"suddenly-lesbian-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"suddenly-lesbian-","232");}
if(strpos($temp_slug,"suddenlylesbian-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"suddenlylesbian-","232");}
if(strpos($temp_slug,"supreme-court")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"supreme-court","233");}
if(strpos($temp_slug,"supremecourt")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"supremecourt","233");}
if(strpos($temp_slug,"swalwell-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"swalwell-","270");}
if(strpos($temp_slug,"swalwell-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"swalwell-","148");}
if(strpos($temp_slug,"swastika-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"swastika-","195");}
if(strpos($temp_slug,"ted-talk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ted-talk-","235");}
if(strpos($temp_slug,"ted-talks-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"ted-talks-","235");}
if(strpos($temp_slug,"tedtalk-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tedtalk-","235");}
if(strpos($temp_slug,"tedtalks-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tedtalks-","235");}
if(strpos($temp_slug,"tem-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tem-","196");}
if(strpos($temp_slug,"tem-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tem-","86");}
if(strpos($temp_slug,"tem-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tem-","236");}
if(strpos($temp_slug,"templar-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"templar-","185");}
if(strpos($temp_slug,"texas-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"texas-","223");}
if(strpos($temp_slug,"thanos-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thanos-","259");}
if(strpos($temp_slug,"the_donald-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"the_donald-","272");}
if(strpos($temp_slug,"the-donald-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"the-donald-","272");}
if(strpos($temp_slug,"the-european-man-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"the-european-man-","196");}
if(strpos($temp_slug,"the-european-man-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"the-european-man-","86");}
if(strpos($temp_slug,"the-european-man-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"the-european-man-","236");}
if(strpos($temp_slug,"thedonald-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thedonald-","272");}
if(strpos($temp_slug,"them-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"them-","213");}
if(strpos($temp_slug,"this-is-fine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"this-is-fine-","237");}
if(strpos($temp_slug,"thisisfine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thisisfine-","237");}
if(strpos($temp_slug,"thomas-paine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thomas-paine-","283");}
if(strpos($temp_slug,"thomaspaine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thomaspaine-","283");}
if(strpos($temp_slug,"thor-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thor-","259");}
if(strpos($temp_slug,"thunberg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thunberg-","83");}
if(strpos($temp_slug,"thunberg-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"thunberg-","77");}
if(strpos($temp_slug,"toxic-masculinity-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"toxic-masculinity-","238");}
if(strpos($temp_slug,"toxic-masculinity-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"toxic-masculinity-","193");}
if(strpos($temp_slug,"toxicmasculinity-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"toxicmasculinity-","238");}
if(strpos($temp_slug,"toxicmasculinity-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"toxicmasculinity-","193");}
if(strpos($temp_slug,"tpaine-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tpaine-","283");}
if(strpos($temp_slug,"tpusa-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tpusa-","239");}
if(strpos($temp_slug,"trans-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"trans-","240");}
if(strpos($temp_slug,"transexual-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"transexual-","240");}
if(strpos($temp_slug,"transgender-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"transgender-","240");}
if(strpos($temp_slug,"trudeau-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"trudeau-","93");}
if(strpos($temp_slug,"truman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"truman-","206");}
if(strpos($temp_slug,"trump-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"trump-","206");}
if(strpos($temp_slug,"trump-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"trump-","62");}
if(strpos($temp_slug,"tubman-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tubman-","106");}
if(strpos($temp_slug,"tweet-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tweet-","241");}
if(strpos($temp_slug,"tweets-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"tweets-","241");}
if(strpos($temp_slug,"twitter-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"twitter-","241");}
if(strpos($temp_slug,"united-kingdom-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"united-kingdom-","242");}
if(strpos($temp_slug,"united-nation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"united-nation-","251");}
if(strpos($temp_slug,"united-nation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"united-nation-","290");}
if(strpos($temp_slug,"united-nations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"united-nations-","251");}
if(strpos($temp_slug,"united-nations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"united-nations-","290");}
if(strpos($temp_slug,"unitedkingdom-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"unitedkingdom-","242");}
if(strpos($temp_slug,"unitednation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"unitednation-","251");}
if(strpos($temp_slug,"unitednation-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"unitednation-","290");}
if(strpos($temp_slug,"unitednations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"unitednations-","251");}
if(strpos($temp_slug,"unitednations-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"unitednations-","290");}
if(strpos($temp_slug,"vader-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"vader-","229");}
if(strpos($temp_slug,"veteran-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"veteran-","243");}
if(strpos($temp_slug,"veterans-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"veterans-","243");}
if(strpos($temp_slug,"vfw-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"vfw-","243");}
if(strpos($temp_slug,"video-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"video-","244");}
if(strpos($temp_slug,"videos-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"videos-","244");}
if(strpos($temp_slug,"votes-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"votes-","245");}
if(strpos($temp_slug,"voting-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"voting-","245");}
if(strpos($temp_slug,"wakanda-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wakanda-","259");}
if(strpos($temp_slug,"wakanda-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wakanda-","294");}
if(strpos($temp_slug,"wapo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wapo-","246");}
if(strpos($temp_slug,"wapo-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wapo-","147");}
if(strpos($temp_slug,"warrant-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"warrant-","203");}
if(strpos($temp_slug,"warrants-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"warrants-","203");}
if(strpos($temp_slug,"warren-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"warren-","103");}
if(strpos($temp_slug,"washington-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washington-","113");}
if(strpos($temp_slug,"washington-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washington-","278");}
if(strpos($temp_slug,"washington-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washington-","206");}
if(strpos($temp_slug,"washington-post-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washington-post-","246");}
if(strpos($temp_slug,"washington-post-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washington-post-","147");}
if(strpos($temp_slug,"washingtonpost-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washingtonpost-","246");}
if(strpos($temp_slug,"washingtonpost-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"washingtonpost-","147");}
if(strpos($temp_slug,"wendy-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wendy-","249");}
if(strpos($temp_slug,"wendys-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wendys-","249");}
if(strpos($temp_slug,"whistle-blower-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"whistle-blower-","104");}
if(strpos($temp_slug,"whistleblower-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"whistleblower-","104");}
if(strpos($temp_slug,"white-genocide-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"white-genocide-","250");}
if(strpos($temp_slug,"white-people-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"white-people-","252");}
if(strpos($temp_slug,"white-privilege-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"white-privilege-","253");}
if(strpos($temp_slug,"whitegenocide-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"whitegenocide-","250");}
if(strpos($temp_slug,"whitepeople-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"whitepeople-","252");}
if(strpos($temp_slug,"whiteprivilege-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"whiteprivilege-","253");}
if(strpos($temp_slug,"wikileaks-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wikileaks-","254");}
if(strpos($temp_slug,"women-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"women-","255");}
if(strpos($temp_slug,"world-war-2-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"world-war-2-","110");}
if(strpos($temp_slug,"worldwar-2-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"worldwar-2-","110");}
if(strpos($temp_slug,"worldwar2-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"worldwar2-","110");}
if(strpos($temp_slug,"wwii-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"wwii-","110");}
if(strpos($temp_slug,"yoda-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"yoda-","229");}
if(strpos($temp_slug,"youtube-")){atlasws_meme_auto($wpdb,$id,$aws_debug_flag,$temp_slug,"youtube-","256");}

// endfold

// IF PARODY IN SLUG REMOVE INCOMPATIBLE CATEGORIES
// fold
if (strpos($temp_slug,"-parody") == false){
	//$aws_debug_flag = true;
	// NON PARODY MEME CATEGORIES
	$atlasws_non_meme = array("165","206","208");
	for ($i = 0; $i < count($atlasws_non_meme); $i++) {
    $temp_check = $atlasws_non_meme[$i];
		$temp_query = "SELECT term_taxonomy_id FROM wp_term_relationships WHERE (object_id = '".$id."' AND term_taxonomy_id ='".$temp_check."') ";
		if ($aws_debug_flag){echo "<br>querystr ".$temp_query;}
		$meme_categories = $wpdb->get_var($temp_query);
		$maxcount = count($meme_categories);
		if ($aws_debug_flag){echo "<br>maxcount ".$maxcount;}
		if($maxcount > 0){
			if ($aws_debug_flag){echo "<br>Do the DB DELETE ";}
			$querystr = "DELETE FROM wp_term_relationships where object_id = '".$id."' AND term_taxonomy_id = '".$temp_check."' ";
			if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
			$wpdb->query($querystr); //update the db
		}
	}
}
// endfold

// IF DRAFT OUR DAUGHTERS KEEP CATEGORIES NEAT
// fold
if (strpos($temp_slug,"-dod-") == true){
	//$aws_debug_flag = true;
	// NON PARODY MEME CATEGORIES
	$atlasws_non_meme = array("59","94","182","193","206","213","255");
	for ($i = 0; $i < count($atlasws_non_meme); $i++) {
    $temp_check = $atlasws_non_meme[$i];
		$temp_query = "SELECT term_taxonomy_id FROM wp_term_relationships WHERE (object_id = '".$id."' AND term_taxonomy_id ='".$temp_check."') ";
		if ($aws_debug_flag){echo "<br>querystr ".$temp_query;}
		$meme_categories = $wpdb->get_var($temp_query);
		$maxcount = count($meme_categories);
		if ($aws_debug_flag){echo "<br>maxcount ".$maxcount;}
		if($maxcount > 0){
			if ($aws_debug_flag){echo "<br>Do the DB DELETE ";}
			$querystr = "DELETE FROM wp_term_relationships where object_id = '".$id."' AND term_taxonomy_id = '".$temp_check."' ";
			if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
			$wpdb->query($querystr); //update the db
		}
	}
}
// endfold

// SLUG CLEANUP
// fold
$slug_update  = false;

// LOOP THROUGH THE JUNK AND DELETE IT
$aws_debug_flag = true;
$slug_replace = array("-a-","-at-","-and-","-are-","-as-","-be-","-by-","-for-","-from-","-have-","-i-","-if-","-ill-","-in-","-is-","-it-","-its-","-my-","-of-","-on-","-or-","-so-","-the-","-then-","-to-","-we-");
for ($i = 0; $i < count($slug_replace); $i++) {
	if (strpos($temp_slug,$slug_replace[$i])){ $temp_slug = str_replace($slug_replace[$i],"-",$temp_slug);$slug_update  = true;}
}

// SPECIAL CASES
if (strpos($temp_slug,"-draft-our-daughters-")){ $temp_slug = str_replace("-draft-our-daughters-","-dod-",$temp_slug);$slug_update  = true;}
if (strpos($temp_slug,"-dod-")){
	if (strpos($temp_slug,"-parody") == false){ $temp_slug = $temp_slug."-parody";$slug_update  = true;}
}

// PLACEHOLDER CLEANUP
$temp_slug = str_replace("xxx-","",$temp_slug);
$temp_slug = str_replace("-xxx","",$temp_slug);
$temp_slug = str_replace("xxx","",$temp_slug);

// DO THE UPDATE
if($slug_update  == true){
	$querystr = "UPDATE wp_posts SET post_name = '".$temp_slug."' WHERE (ID = '".$id."' )";  //build querystring makes debugging easier
	if ($aws_debug_flag){echo "<br>querystr ".$querystr;}
	$wpdb->query($querystr); //update the db
}
$aws_debug_flag = false;



// endfold



?>