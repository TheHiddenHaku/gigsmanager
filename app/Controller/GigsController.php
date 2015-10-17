<?php
	class GigsController extends AppController
	{
		public $helpers = array('Html', 'Form', 'Session');
		public $components = array('Session', 'Paginator');
		public $uses = array('Composer', 'Gig', 'Playlist');

		public $paginate = array(
	        'limit' => 20,
	        'order' => array(
	            'Gig.date' => 'desc'
	        )
	    );

		public function getAnnate()
		{
			$tmp = $this->Gig->query('SELECT DISTINCT Year(Gig.date) AS year FROM gigsmanager.gigs AS Gig WHERE 1 = 1 GROUP BY year');
			$annate = array();

			for($i=0; $i<count($tmp); $i++)
			{
				$annate[] = $tmp[$i][0]['year'];
			}

			return $annate;
		}

		public function index()
		{
			$this->Paginator->settings = $this->paginate;
   			$gigs = $this->Paginator->paginate('Gig');
   			$this->set('annate', $this->getAnnate());
			$this->set('gigs', $gigs);
		}

		public function view($id = null)
		{
			if (!$id) {
		        throw new NotFoundException(__('Invalid Gig'));
		    }

		    $gig = $this->Gig->findById($id);

		    for($i=0; $i<count($gig['Playlist']); $i++)
		    {
		    	$composer = $this->Composer->findById($gig['Playlist'][$i]['composer_id']);
		    	$composer_name = $composer['Composer']['full_name'];
		    	$gig['Playlist'][$i]['composer_name'] = $composer_name;
		    }

		    $this->set('gig', $gig);
		}

		public function add()
		{
			$this->set('players', $this->Gig->Player->find('list'));
			if ($this->request->is('post')) {
            	$this->Gig->create();
            	if ($this->Gig->saveAll($this->request->data)) {
                	$this->Session->setFlash(__('New gig succesfully saved!'));
                	return $this->redirect(array('action' => 'playlist', $this->Gig->id));
            	}
            	$this->Session->setFlash(__('Gig not saved.'));
			}
		}

		public function edit($id = null)
		{
		    if (!$id) {
		        throw new NotFoundException(__('Invalid Gig'));
		    }

		    $gig = $this->Gig->findById($id);
		    if (!$gig) {
		        throw new NotFoundException(__('Invalid Gig'));
		    }

		    if ($this->request->is('post') || $this->request->is('put')) {
		        $this->Gig->id = $id;
		        if ($this->Gig->saveAll($this->request->data)) {
		            $this->Session->setFlash(__('The gig has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Gig not updated.'));
		    }

		    if (!$this->request->data) {
		    	$this->set('players', $this->Gig->Player->find('list'));
		        $this->request->data = $gig;
		    }
		}

		public function delete($id)
		{
			if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }

		    if ($this->Gig->delete($id)) {
		        $this->Session->setFlash(__('Gig with id: %s has been deleted.', h($id)));
		        return $this->redirect(array('action' => 'index'));
		    }
		}

		public function playlist($id = null)
		{
			if (!$id) {
		        throw new NotFoundException(__('invalid Gig'));
		    }

		    $gig = $this->Gig->findById($id);
		    $composers = $this->Playlist->Composer->find('list');

		    if (!$gig) {
		        throw new NotFoundException(__('Invalid Gig'));
		    }

		    for($i=0; $i<count($gig['Playlist']); $i++)
		    {
		    	$composer = $this->Composer->findById($gig['Playlist'][$i]['composer_id']);
		    	$composer_name = $composer['Composer']['full_name'];
		    	$gig['Playlist'][$i]['composer_name'] = $composer_name;
		    }

			$this->set('gig', $gig);
			$this->set('composers', $composers);

		    if ($this->request->is('post')) {
            	$this->Playlist->create();
            	if ($this->Playlist->saveAll($this->request->data)) {
                	$this->Session->setFlash(__('New piece succesfully saved!'));
                	return $this->redirect(array('action' => 'playlist', h($id)));
            	}
            	$this->Session->setFlash(__('Playlist not saved'));
			}
		}

		public function edit_playlist($id = null)
		{
		    if (!$id) {
		        throw new NotFoundException(__('Invalid Piece'));
		    }

		    $playlist = $this->Playlist->findById($id);
		    if (!$playlist) {
		        throw new NotFoundException(__('Invalid Piece'));
		    }

		    $composers = $this->Playlist->Composer->find('list');
		    for($i=0; $i<count($gig['Playlist']); $i++)
		    {
		    	$composer = $this->Composer->findById($gig['Playlist'][$i]['composer_id']);
		    	$composer_name = $composer['Composer']['full_name'];
		    	$gig['Playlist'][$i]['composer_name'] = $composer_name;
		    }

			$this->set('composers', $composers);

		    if ($this->request->is('post') || $this->request->is('put')) {
		        $this->Playlist->id = $id;
		        if ($this->Playlist->save($this->request->data)) {
		            $this->Session->setFlash(__('Piece succesfully updated.'));
		            return $this->redirect(array('action' => 'playlist', $playlist['Playlist']['gig_id']));
		        }
		        $this->Session->setFlash(__('Piece not saved'));
		    }

		    if (!$this->request->data) {
		        $this->request->data = $playlist;
		    }
		}

		public function delete_playlist($id)
		{
			if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }

		    $playlist = $this->Playlist->findById($id);
		    $gig_id = $playlist['Playlist']['gig_id'];
		    if ($this->Playlist->delete($id)) {
		        $this->Session->setFlash(__('Piece with id: %s has been deleted.', h($id)));
		        return $this->redirect(array('action' => 'playlist', h($gig_id)));
		    }
		}

		public function by_player($id = null)
		{
			if (!$id) {
		        throw new NotFoundException(__('Invalid Player'));
		    }

		    $gigs = $this->Gig->getGigsByPlayerId($id);
		    $this->set('annate', $this->getAnnate());
    		$this->set('gigs', $gigs);
		}

		public function by_composer($id = null)
		{
			if (!$id) {
		        throw new NotFoundException(__('Invalid Composer'));
		    }

		    $gigs = $this->Gig->getGigsByPlaylistComposerId($id);
		    $this->set('annate', $this->getAnnate());
    		$this->set('gigs', $gigs);
		}

		public function by_year($year)
		{
			$dataInizio = $year."-01-01";
			$dataFine = $year."-12-31";
			$gigs = $this->Gig->find('all', array('conditions' => array('Gig.date <= ' => $dataFine, 'Gig.date >= ' => $dataInizio)));
			$this->set('annate', $this->getAnnate());
			$this->set('gigs', $gigs);
			$this->set('year', $year);
		}
	}