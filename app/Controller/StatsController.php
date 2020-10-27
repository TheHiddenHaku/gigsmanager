<?php
	class StatsController extends AppController
	{
		public $helpers = array('Html', 'Form', 'Session');
		public $components = array('Session');
		public $uses = array('Composer', 'Gig', 'Player', 'Playlist');

		public function index()
		{
			$nPlayers = $this->Player->find('count');
			$nGigs = $this->Gig->find('count');
			$nComposers = $this->Composer->find('count');
			$nPlaylists = $this->Playlist->find('count');

			$classificaPlayers = $this->Player->query("SELECT gigs_players.player_id, players.surname, players.name, COUNT( gigs_players.player_id ) AS occurrences FROM gigs_players, players WHERE players.id = gigs_players.player_id GROUP BY gigs_players.player_id ORDER BY occurrences DESC");

			$classificaComposers = $this->Player->query("SELECT playlists.composer_id, composers.surname, composers.name, COUNT( playlists.composer_id ) AS occurrences FROM playlists, composers WHERE composers.id = playlists.composer_id GROUP BY playlists.composer_id ORDER BY occurrences DESC");
			$this->set('nPlayers', $nPlayers);
			$this->set('nGigs', $nGigs);
			$this->set('nComposers', $nComposers);
			$this->set('nPlaylists', $nPlaylists);
			$this->set('classificaPlayers', $classificaPlayers);
			$this->set('classificaComposers', $classificaComposers);
		}

	}