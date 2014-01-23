<? print_r($playlist); ?>
<h1>Pieces performed on <?=$this->Time->format('d/m/Y', $gig['Gig']['date'])?> at <?=$gig['Gig']['place']?></h1>

<?php echo $this->Session->flash('flash', array('element' => 'success')); ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>NAME</th>
			<th>AUTHOR</th>
			<th colspan="2">ACTIONS</th>
		</tr>
	</thead>
	<tbody>
		<?=$this->Form->create('Playlist', array('inputDefaults' => array('div' => false, 'class' => 'form-control')));?>
		<?=$this->Form->input('id', array('type' => 'hidden', 'value' => $playlist['Playlist']['id']))?>
		<?=$this->Form->input('gig_id', array('type' => 'hidden', 'value' => $playlist['Playlist']['gig_id']))?>
		<tr>
			<td><?=$this->Form->input('title', array('label' => false));?></td>
			<td><?=$this->Form->input('composer_id', array('label' => false, 'class' => 'form-control uses_chosen'));?></td>
			<td><?=$this->Form->end(array('label' => 'Save', 'div' =>false, 'class' => 'btn btn-default'));?><td>
		</tr>
	</tbody>
	<? unset($composers); ?>
</table>

