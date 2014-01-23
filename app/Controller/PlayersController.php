<?php
	class PlayersController extends AppController
	{
		public $helpers = array('Html', 'Form', 'Session', 'Time');
		public $components = array('Session', 'Paginator');

		public $paginate = array(
	        'limit' => 20,
	        'order' => array(
	            'Player.surname' => 'asc'
	        )
	    );

		public function index()
		{
			$this->Paginator->settings = $this->paginate;
   			$players = $this->Paginator->paginate('Player');
			$this->set('players', $players);
		}

		public function add()
		{
			if ($this->request->is('post')) {
            	$this->Player->create();
            	if ($this->Player->save($this->request->data)) {
                	$this->Session->setFlash(__('New player successfully saved'));
                	return $this->redirect(array('action' => 'index'));
            	}
            	$this->Session->setFlash(__('Player not saved'));
			}
		}

		public function edit($id = null)
		{
		    if (!$id) {
		        throw new NotFoundException(__('Invalid player'));
		    }

		    $player = $this->Player->findById($id);
		    if (!$player) {
		        throw new NotFoundException(__('Invalid player'));
		    }

		    if ($this->request->is('post') || $this->request->is('put')) {
		        $this->Player->id = $id;
		        if ($this->Player->save($this->request->data)) {
		            $this->Session->setFlash(__('Player has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Player not updated'));
		    }

		    if (!$this->request->data) {
		        $this->request->data = $player;
		    }
		}

		public function delete($id)
		{
			if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }

		    if ($this->Player->delete($id)) {
		        $this->Session->setFlash(__('Player with id: %s has been deleted.', h($id)));
		        return $this->redirect(array('action' => 'index'));
		    }
		}

		public function by_initial($initial = null)
		{
			if (!$initial) {
		        $initial = "A";
		    }
		    $players = $this->Player->getPlayersByInitial($initial);
    		$this->set('players', $players);
		}
	}