<?php

App::uses('AppController', 'Controller');

class TagsController extends AppController {

    public function index() {
        $this->Tag->recursive = 0;
        //$this->set('categories', $this->paginate());
        $this->set('tags', $this->Tag->find('all'));
    }

    public function view($id = null) {
        $this->Tag->id = $id;
        if (!$this->Tag->exists()) {
            throw new NotFoundException(__('Invalid tag'));
        }
        $this->set('tag', $this->Tag->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Tag->create();
            if ($this->Tag->save($this->request->data)) {
                $this->Flash->success(__('The tag has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The tag could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $tag = $this->Tag->findById($id);
        if (!$tag) {
            throw new NotFoundException(__('Invalid tag'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Tag->id = $id;
            if ($this->Tag->save($this->request->data)) {
                $this->Flash->success(__('The tag has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The tag could not be saved. Please, try again.')
            );
        }
        if (!$this->request->data) {
          $this->request->data = $tag;
        }
    }

    public function delete($id = null) {

        if ($this->request->is('get')) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $this->Tag->id = $id;
            if (!$this->Tag->exists()) {
                throw new NotFoundException(__('Invalid tag'));
            }
            if ($this->Tag->delete()) {
                $this->Flash->success(__('tag deleted'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('tag was not deleted'));
            return $this->redirect(array('action' => 'index'));

        } else {
            throw new NotFoundException(__('よくわからない'));

        }

    }

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow();
    }



}
