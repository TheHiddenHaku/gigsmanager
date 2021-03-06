<h1>Composers List</h1>
<?=$this->Html->link('New', array('controller' => 'composers', 'action' => 'add'), array('class' => 'btn btn-success btn-xs'))?>

<?php echo $this->Session->flash('flash', array('element' => 'success')); ?>

<table class="table table-striped">
	<tr>
		<td colspan="6">
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
		<th>ATTENDED</th>
		<th width="20%" colspan="3">ACTIONS</th>
	</tr>
	<?php foreach ($composers as $composer) : ?>
	<tr>
		<td><?=$composer['Composer']['name']?></td>
		<td><?=$composer['Composer']['surname']?></td>
		<td><?=count($composer['Playlist']);?></td>
		<td>
			<?=$this->Html->link('Gigs', array('controller' => 'gigs', 'action' => 'by_composer', $composer['Composer']['id']), array('class' => 'btn btn-info btn-xs'))?>
		</td>
		<td>
			<?=$this->Html->link('Edit', array('controller' => 'composers', 'action' => 'edit', $composer['Composer']['id']), array('class' => 'btn btn-default btn-xs'))?>
		</td>
		<td>
			<?=$this->Form->postLink('Delete', array('controller' => 'composers', 'action' => 'delete', $composer['Composer']['id']), array('class' => 'btn btn-danger btn-xs', 'confirm' => 'Are you sure you want to delete '.$composer['Composer']['surname'].'?'))?>
		</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="6">
			<ul class="pagination">
	            <?php
	                echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
	                echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	            ?>
	        </ul>
    	</td>
	</tr>
	<?php unset($composers); ?>
</table>


