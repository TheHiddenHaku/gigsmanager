<?php
	class ComposersController extends AppController
	{
		public $helpers = array('Html', 'Form', 'Session', 'Time');
		public $components = array('Session', 'Paginator');

		public $paginate = array(
	        'limit' => 20,
	        'order' => array(
	            'Composer.surname' => 'asc'
	        )
	    );

	    public function index()
		{
			$this->Paginator->settings = $this->paginate;
   			$composers = $this->Paginator->paginate('Composer');
			$this->set('composers', $composers);
		}

		public function add()
		{
			if ($this->request->is('post')) {
            	$this->Composer->create();
            	if ($this->Composer->save($this->request->data)) {
                	$this->Session->setFlash(__('New composer saved!'));
                	return $this->redirect(array('action' => 'index'));
            	}
            	$this->Session->setFlash(__('Composer not saved.'));
			}
		}

		public function edit($id = null)
		{
		    if (!$id) {
		        throw new NotFoundException(__('Invalid composer'));
		    }

		    $composer = $this->Composer->findById($id);
		    if (!$composer) {
		        throw new NotFoundException(__('Invalid composer'));
		    }

		    if ($this->request->is('post') || $this->request->is('put')) {
		        $this->Composer->id = $id;
		        if ($this->Composer->save($this->request->data)) {
		            $this->Session->setFlash(__('Composer has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Composer not updated'));
		    }

		    if (!$this->request->data) {
		        $this->request->data = $composer;
		    }
		}

		public function delete($id)
		{
			if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }

		    if ($this->Composer->delete($id)) {
		        $this->Session->setFlash(__('Composer with id: %s has been deleted.', h($id)));
		        return $this->redirect(array('action' => 'index'));
		    }
		}

		public function by_initial($initial = null)
		{
			if (!$initial) {
		        $initial = "A";
		    }

		    $composers = $this->Composer->getComposersByInitial($initial);
    		$this->set('composers', $composers);
		}
	}