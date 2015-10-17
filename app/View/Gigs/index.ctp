<h1>
	Gigs List
	<select name="year" id="year" class="form-control">
		<option>Select Year</option>
		<?php foreach ($annate as $anno) : ?>
		<option value="<?=$anno?>"><?=$anno?></option>
		<?php endforeach; ?>
	</select>
</h1>
<?=$this->Html->link('New', array('controller' => 'gigs', 'action' => 'add'), array('class' => 'btn btn-success btn-xs'))?>
<?php echo $this->Session->flash('flash', array('element' => 'success')); ?>
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
		<?php foreach ($gigs as $gig) : ?>
		<tr>
			<td><?=$this->Time->format('d/m/Y', $gig['Gig']['date'])?></td>
			<td><?=$gig['Gig']['place']?></td>
			<td><?=$gig['Gig']['organization']?></td>
			<td><?=$gig['Gig']['title']?></td>
			<td>
				<?php for ($i=0; $i<count($gig['Player']); $i++) : ?>
				<?=$gig['Player'][$i]['name']?> <?=$this->Html->link($gig['Player'][$i]['surname'], array('gigs' => 'players', 'action' => 'by_player', $gig['Player'][$i]['id']))?> - 
			<?php endfor; ?>
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
		<?php endforeach; ?>
	</tbody>


	
	<?php unset($gigs); ?>
</table>

    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('Indietro'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Avanti'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>

