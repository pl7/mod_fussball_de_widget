<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<section class="page-item ac" id="team_HEADER" teamkey="<?php echo $params->get('team_key'); ?>" itemscope itemtype="http://schema.org/Organization" typeof="SportsTeam">    
    <header>
    	<h1>
            <?php echo $doc->getTitle(); ?>
    	</h1>
    </header>
    <article class="ac" id="fussball-de-widget">
        <header><h3><?php echo $params->get('competition_title'); ?></h3></header>
		<div id="ergebnisse" onLoad="checkFussballDeWidget()">
		   <section id="meinWettbewerb<?php echo htmlspecialchars($scores_id);?>_section">
		       <header <?php if (!($module->showtitle)) { echo'style="display:none;"'; }?>><h4><?php echo $module->title; ?></h4></header>
			   <div id="meinWettbewerb<?php echo htmlspecialchars($scores_id);?>"></div>
		   </section>
	   </div>
	   
	   <div id="ergebnisse" onLoad="checkFussballDeWidget()" <?php if($params->get('table_id') == "99") echo 'style="display:none""'; ?>>
		   <section id="meinWettbewerb<?php echo htmlspecialchars($table_id);?>_section">
		       <header <?php if (!($module->showtitle)) { echo'style="display:none;"'; }?>><h4><?php echo $module->title; ?></h4></header>
			   <div id="meinWettbewerb<?php echo htmlspecialchars($table_id);?>"></div>
		   </section>
	   </div>
	</article>	
	<article class="ac">
		<header><h4 style="display:none">Fussball.de Widget Hinweise</h3></header>
		<p>
			Bitte beachten Sie die <a href="/impressum/hinweise">Hinweise</a> zu den Widgets von Fussball.de.
		</p>
	</article>
	<script type="text/javascript">
	
		// disable alert
		alert = function() {};
	    try{
			var wettbewerb0 = new fussballdeAPI();
            wettbewerb0.setzeSaison('<?php echo htmlspecialchars($params->get('season_key')); ?>');
            wettbewerb0.setzeWettbewerbID('<?php echo htmlspecialchars($params->get('cc_id')); ?>');
			wettbewerb0.zeigeWettbewerb('meinWettbewerb<?php echo htmlspecialchars($params->get('scores_id'));?>');
			
			var wettbewerb1 = new fussballdeAPI();
            wettbewerb1.setzeSaison('<?php echo htmlspecialchars($params->get('season_key')); ?>');
            wettbewerb1.setzeWettbewerbID('<?php echo htmlspecialchars($params->get('cc_id')); ?>');
			wettbewerb1.zeigeTabelle('meinWettbewerb<?php echo htmlspecialchars($params->get('table_id'));?>');
			
        } catch(e) {
            console.log('Fehler beim Fussball.de Widget'+e);
        }
		function checkFussballDeWidget(){
			console.log("check fussball.de widget");
			var tabelleDiv = document.getElementById('meinWettbewerb<?php echo htmlspecialchars($table_id);?>');
			var tabelleFbDeApi = tabelleDiv.getElementById("fussballdeAPI");
			var tabelleSec = document.getElementById('meinWettbewerb<?php echo htmlspecialchars($table_id);?>_section');
			if(tabelleFbDeApi == null){ 
				console.log('Fussball.de Tabellen-Daten nicht verfügbar!');
				tabelleSec.innerHTML = '<p class="hint">Die Fussball.de Daten sind derzeit nicht verf&uuml;gbar. Du kannst die Tabelle aber direkt auf Fussball.de einsehen.</p>';
				<?php if(strlen($table_url) > 0) : ?>
				tabelleSec.innerHTML = tabelleSec.innerHTML+'<p class="hint"> <a class="extUrl" href="<?php echo $table_url; ?>" target="_blank">Tabelle im neuen Fenster &ouml;ffnen.</a> </p>';
				<?php endif; ?>
			}else {
				var i1 = tabelleFbDeApi.getElementsByTagName('iframe');
				i1.item().destroy();
			}
			var scoresDiv = document.getElementById('meinWettbewerb<?php echo htmlspecialchars($scores_id);?>');
			var scoresFbDeApi = scoresDiv.getElementById("fussballdeAPI");
			var scoresSec = document.getElementById('meinWettbewerb<?php echo htmlspecialchars($scores_id);?>_section');
			if(scoresFbDeApi == null){ 
				console.log('Fussball.de Ergebnis-Daten nicht verfügbar!');
				scoresSec.innerHTML = '<p  class="hint">Die Fussball.de Daten sind derzeit nicht verf&uuml;gbar. Du kannst die Ergebnisse aber direkt auf Fussball.de einsehen.</p>';
				<?php if(strlen($table_url) > 0) : ?>
				scoresSec.innerHTML = scoresSec.innerHTML+'<p  class="hint"> <a class="extUrl" href="<?php echo $scores_url; ?>" target="_blank">Ergebnisse im neuen Fenster &ouml;ffnen.</a> </p>';
				<?php endif; ?>
			} else {
				var i2 = scoresFbDeApi.getElementsByTagName('iframe');
				i2.item().destroy();
			}	
			if(scoresFbDeApi != null || tabelleFbDeApi != null){ 
				// append link css-class
				$('a[href*="/sv-wiesbaden"]').parent().parent().children().children().addClass(" svw");
				// append td css-class
				$('a[href*="/sv-wiesbaden"]').parent().parent().children().addClass(" svw")
			}
		}
	</script>	
</section>