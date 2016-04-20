<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

    public function index() {
        $this->Category->recursive = 1;
        //$this->set('categories', $this->paginate());
        $this->set('categories', $this->Category->find('all'));
    }

    public function view($id = null) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->set('category', $this->Category->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('The category has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The category could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('The category has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The category could not be saved. Please, try again.')
            );
        }
        if (!$this->request->data) {
          $this->request->data = $category;
        }
    }

    public function delete($id = null) {

        if ($this->request->is('get')) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $this->Category->id = $id;
            if (!$this->Category->exists()) {
                throw new NotFoundException(__('Invalid category'));
            }
            if ($this->Category->delete()) {
                $this->Flash->success(__('Category deleted'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('category was not deleted'));
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
