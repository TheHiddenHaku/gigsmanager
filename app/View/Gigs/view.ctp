<h1><?=$gig['Gig']['place']?> - <?=$this->Time->format('d/m/Y', $gig['Gig']['date'])?></h1>
<h2><em><?=$gig['Gig']['title']?></em></h2>
<p><?=$gig['Gig']['description']?></p>
<p>Organization: <em><?=$gig['Gig']['organization']?></em></p>
<h3>Players</h3>
<ul class="bigUl">
	<? for($i=0; $i<count($gig['Player']); $i++) :?>
	<li><?=$gig['Player'][$i]['role']?> - <?=$gig['Player'][$i]['full_name']?></li>
	<? endfor; ?>
</ul>
<h3>Playlist</h3>
<ul class="bigUl">
	<? for($i=0; $i<count($gig['Playlist']); $i++) :?>
	<li><?=$gig['Playlist'][$i]['composer_name']?> - <?=$gig['Playlist'][$i]['title']?></li>
	<? endfor; ?>
</ul>
<h5 class="marginTop20">Rating</h5>
<div id="star"></div>
