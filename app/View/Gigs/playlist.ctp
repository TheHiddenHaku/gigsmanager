<h1>Pieces performed on <?=$this->Time->format('d/m/Y', $gig['Gig']['date'])?> at <?=$gig['Gig']['place']?></h1>

<?php echo $this->Session->flash('flash', array('element' => 'success')); ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>TITLE</th>
			<th>AUTHOR</th>
			<th colspan="2">ACTIONS</th>
		</tr>
	</thead>
	<tbody>
		<?=$this->Form->create('Playlist', array('inputDefaults' => array('div' => false, 'class' => 'form-control')));?>
		<?=$this->Form->input('gig_id', array('type' => 'hidden', 'value' => $gig['Gig']['id']))?>
		<tr>
			<td><?=$this->Form->input('title', array('label' => false));?></td>
			<td><?=$this->Form->input('composer_id', array('label' => false, 'class' => 'form-control uses_chosen'));?></td>
			<td colspan="2"><?=$this->Form->end(array('label' => 'Save', 'div' =>false, 'class' => 'btn btn-default'));?><td>
		</tr>

		<?php foreach ($gig['Playlist'] as $playlist) : ?>
		<tr>
			<td><?=$playlist['title']?></td>
			<td><?=$playlist['composer_name']?></td>
			<td>
				<?=$this->Html->link('Edit', array('controller' => 'gigs', 'action' => 'edit_playlist', $playlist['id']), array('class' => 'btn btn-default btn-xs'))?>
			</td>
			<td>
			<?=$this->Form->postLink('Delete', array('controller' => 'gigs', 'action' => 'delete_playlist', $playlist['id']), array('class' => 'btn btn-danger btn-xs', 'confirm' => 'Are you sure you want to delete '.$playlist['title'].'?'))?>
			<td>
		</tr>
		<?php endforeach; ?>
		
	</tbody>
	<?php unset($composers); ?>
</table>