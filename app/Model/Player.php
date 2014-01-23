<?php
	class Player extends AppModel
	{
		public $displayField = 'full_name';
		public $order = "surname";
		public $virtualFields = array(
		    'full_name' => "CONCAT(Player.name, ' ', Player.surname)"
		);

		public $hasAndBelongsToMany = array(
	        'Gig' =>
	            array(
	                'className' => 'Gig',
	                'joinTable' => 'gigs_players',
	                'foreignKey' => 'player_id',
	                'associationForeignKey' => 'gig_id'
	            )
	    );

	    public function getPlayersByInitial($initial = null) {
		    if(empty($initial)) return false;
		    $players = $this->find('all', array('conditions' => array('Player.surname LIKE' => $initial."%")));
		    return $players;
		}
	}