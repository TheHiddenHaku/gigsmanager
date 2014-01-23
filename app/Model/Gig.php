<?php
	class Gig extends AppModel
	{
		public $hasMany = "Playlist";
		public $order = "date DESC";
		public $hasAndBelongsToMany = array(
	        'Player' =>
	            array(
	                'className' => 'Player',
	                'joinTable' => 'gigs_players',
	                'foreignKey' => 'gig_id',
	                'associationForeignKey' => 'player_id'
	            )
	    );

		/**
		 * Questa funzione si occupa di raccogliere tutti i concerti di un dato interprete.
		 * @param  int $playerId Id dell'interprete
		 * @return Array           Array contenente tutti i concerti dell'interprete
		 */
	    public function getGigsByPlayerId($playerId = null) {
		    if(empty($playerId)) return false;
		    $gigs = $this->find('all', array(
		        'joins' => array(
		             array('table' => 'gigs_players',
		                'alias' => 'GigsPlayers',
		                'type' => 'INNER',
		                'conditions' => array(
		                    'GigsPlayers.player_id' => $playerId,
		                    'GigsPlayers.gig_id = Gig.id'
		                )
		            )
		        ),
		        'group' => 'Gig.id'
		    ));
		    return $gigs;
		}

		public function getGigsByPlaylistComposerId($composerId = null) {
		    if(empty($composerId)) return false;
		    $gigs = $this->find('all', array(
		        'joins' => array(
		             array('table' => 'playlists',
		                'alias' => 'Playlists',
		                'type' => 'INNER',
		                'conditions' => array(
		                    'Playlists.composer_id' => $composerId,
		                    'Playlists.gig_id = Gig.id'
		                )
		            )
		        ),
		        'group' => 'Gig.id'
		    ));
		    return $gigs;
		}
	}