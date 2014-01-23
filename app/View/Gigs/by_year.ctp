<h1>
	Gigs List for <?=$year?>
	<select name="year" id="year" class="form-control">
		<option>Select Year</option>
		<? foreach ($annate as $anno) : ?>
		<option value="<?=$anno?>"><?=$anno?></option>
		<? endforeach; ?>
	</select>
</h1>
<?=$this->Html->link('Back', array('controller' => 'gigs', 'action' => 'index'), array('class' => 'btn btn-info btn-xs'))?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>DATE</th>
			<th>PLACE</th>
			<th>ORGANIZATION</th>
			<th>TITLE</th>
			<th width="30%">PLAYERS</th>
			<th colspan="4">ACTIONS</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($gigs as $gig) : ?>
		<tr>
			<td><?=$this->Time->format('d/m/Y', $gig['Gig']['date'])?></td>
			<td><?=$gig['Gig']['place']?></td>
			<td><?=$gig['Gig']['organization']?></td>
			<td><?=$gig['Gig']['title']?></td>
			<td>
				<? for ($i=0; $i<count($gig['Player']); $i++) : ?>
				<?=$gig['Player'][$i]['name']?> <?=$this->Html->link($gig['Player'][$i]['surname'], array('gigs' => 'players', 'action' => 'by_player', $gig['Player'][$i]['id']))?> -  
			<? endfor; ?>
			</td>
			<td>
				<?=$this->Html->link('View', array('controller' => 'gigs', 'action' => 'view', $gig['Gig']['id']), array('class' => 'btn btn-info btn-xs'))?>
			</td>
			<td>
				<?=$this->Html->link('Playlist', array('controller' => 'gigs', 'action' => 'playlist', $gig['Gig']['id']), array('class' => 'btn btn-info btn-xs'))?>
			</td>
			<td>
				<?=$this->Html->link('Edit', array('controller' => 'gigs', 'action' => 'edit', $gig['Gig']['id']), array('class' => 'btn btn-default btn-xs'))?>
			</td>
			<td>
				<?=$this->Form->postLink('Delete', array('controller' => 'gigs', 'action' => 'delete', $gig['Gig']['id']), array('class' => 'btn btn-danger btn-xs', 'confirm' => 'Are you sure you want to delete '.$gig['Gig']['title'].'?'))?>
			</td>
		</tr>
		<? endforeach; ?>
	</tbody>
	
	<? unset($gigs); ?>
</table>

