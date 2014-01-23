<h1>Edit Gig</h1>
<?=$this->Form->create('Gig', array('inputDefaults' => array('div' => false, 'class' => 'form-control')));?>
<?=$this->Form->input('id', array('type' => 'hidden'))?>
	<div class="form-group">
		<?=$this->Form->input('date', array('label' => 'Date', 'type' => 'text', 'class' => 'form-control datepicker'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('place', array('label' => 'Place'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('organization', array('label' => 'Organization'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('title', array('label' => 'Title'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('description', array('label' => 'Description', 'rows' => '5'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('rating', array('label' => 'Rating', 'options' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5), 'empty' => '(Select)'));?>
	</div>
	<div class="form-group">
		<?=$this->Form->input('Player', array('label' => 'Players', 'multiple' => 'true', 'size' => '20', 'class' => 'form-control uses_chosen'));?>
	</div>
<?=$this->Form->end(array(
    'label' => 'Save',
    'div' =>false,
    'class' => 'btn btn-default'
    ));?>