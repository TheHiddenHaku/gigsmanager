<h1>Insert New PLayer</h1>
<?=$this->Form->create('Player', array('inputDefaults' => array('div' => false, 'class' => 'form-control')));?>
	<div class="form-group">
		<?=$this->Form->input('name', array('label' => 'Name'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('surname', array('label' => 'Surname'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('role', array('label' => 'Role'));?>
	</div>
<?=$this->Form->end(array(
    'label' => 'Save',
    'div' =>false,
    'class' => 'btn btn-default'
    ));?>