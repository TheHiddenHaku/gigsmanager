<?php
	class Composer extends AppModel
	{
		public $displayField = 'full_name';
		public $order = "surname";
		public $virtualFields = array(
		    'full_name' => "CONCAT(Composer.name, ' ', Composer.surname)"
		);
		public $hasMany = "Playlist";

		public function getComposersByInitial($initial = null) {
		    if(empty($initial)) return false;
		    $composers = $this->find('all', array('conditions' => array('Composer.surname LIKE' => $initial."%")));
		    return $composers;
		}

	}