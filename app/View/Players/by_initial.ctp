<h1>Players LIst</h1>
<?=$this->Html->link('New', array('controller' => 'players', 'action' => 'add'), array('class' => 'btn btn-success btn-xs'))?>
<?php echo $this->Session->flash('flash', array('element' => 'success')); ?>
<table class="table table-striped">
	<tr>
		<td colspan="7">
			<ul class="pagination">
			<?php
				$alphas = range('A', 'Z');
				foreach ($alphas as $letter) {
			?>
				<li><?=$this->Html->link(h($letter), array('action' => 'by_initial', h($letter)))?></li>
			<?php
				}
			?>

			</ul>
		</td>
	</tr>
	<tr>
		<th>NAME</th>
		<th>SURNAME</th>
		<th>ROLE</th>
		<th>ATTENDED</th>
		<th width="20%" colspan="3">ACTIONS</th>
	</tr>
	<? foreach ($players as $player) : ?>
	<tr>
		<td><?=$player['Player']['name']?></td>
		<td><?=$player['Player']['surname']?></td>
		<td><?=$player['Player']['role']?></td>
		<td><?=count($player['Gig'])?></td>
		<td>
			<?=$this->Html->link('Gigs', array('controller' => 'gigs', 'action' => 'by_player', $player['Player']['id']), array('class' => 'btn btn-info btn-xs'))?>
		</td>
		<td>
			<?=$this->Html->link('Edit', array('controller' => 'players', 'action' => 'edit', $player['Player']['id']), array('class' => 'btn btn-default btn-xs'))?>
		</td>
		<td>
			<?=$this->Form->postLink('Delete', array('controller' => 'players', 'action' => 'delete', $player['Player']['id']), array('class' => 'btn btn-danger btn-xs', 'confirm' => 'Are you sure you want to delete '.$player['Player']['surname'].'?'))?>
		</td>
	</tr>
	<? endforeach; ?>
	<? unset($players); ?>
</table>