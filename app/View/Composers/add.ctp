<h1>Insert New Composer</h1>
<?=$this->Form->create('Composer', array('inputDefaults' => array('div' => false, 'class' => 'form-control')));?>
	<div class="form-group">
		<?=$this->Form->input('name', array('label' => 'Name'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('surname', array('label' => 'Surname'));?>
	</div>
<?=$this->Form->end(array('label' => 'Save', 'div' =>false, 'class' => 'btn btn-default'));?>