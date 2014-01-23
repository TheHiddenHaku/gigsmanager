<h1>Stats</h1>
<ul>
	<li>Gigs: <?=$nGigs?></li>
	<li>Players: <?=$nPlayers?></li>
	<li>Composers: <?=$nComposers?></li>
	<li>PLaylists: <?=$nPlaylists?></li>
</ul>
<table>
	<tr>
		<td valign="top">
			<h2>Player Classification</h2>
			<ul>
				<? foreach ($classificaPlayers as $row): ?>
				<li><?=$row['players']['name']?> <?=$row['players']['surname']?> ( <?=$row[0]['occurrences']?> times)</li>
				<? endforeach; ?>
			</ul>
		</td>
		<td valign="top">
			<h2>Composer Classification</h2>
			<ul>
				<? foreach ($classificaComposers as $row): ?>
				<li><?=$row['composers']['name']?> <?=$row['composers']['surname']?> ( <?=$row[0]['occurrences']?> times)</li>
				<? endforeach; ?>
			</ul>
		</td>
	</tr>
</table>
