<?php



class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Search.Prg');
    public $presetVars = true;



    var $uses = array('Post', 'Category', 'Tag');

    public function index() {
        unset($this->Post->validate['title']);
        $this->Prg->commonProcess();

        //var_dump($this->passedArgs);
        //exit();

        $this->paginate = array(
            'conditions' => $this->Post->parseCriteria($this->passedArgs),
        );


        //$this->set('posts', $this->Post->find('all'));
        $this->set('posts', $this->paginate());
        $tag_list = $this->Tag->find('list', array(
                'fields' => array('Tag.name')
              ));
        $this->set('tags', $tag_list);
        $cat_list = $this->Category->find('list', array(
                'fields' => array('Category.name')
              ));
        $this->set('categories', $cat_list);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }


    public function add() {

        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->request->data['Post']['category_id'] = $this->request->data['Post']['category'];

            $this->request->data['Tag'] = array('Tag' => $this->request->data['Post']['tag']);

            $this->Post->create();
            //var_dump($this->request->data);
            //exit();

            if ($this->Post->saveAll($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
        $cat_list = $this->Category->find('list', array(
                'fields' => array('Category.name')
              ));
        $tag_list = $this->Tag->find('list', array(
                'fields' => array('Tag.name')
              ));

        $this->set('categories', $cat_list);
        $this->set('tags', $tag_list);
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;

            $this->request->data['Post']['category_id'] = $this->request->data['Post']['category'];

            $this->request->data['Tag'] = array('Tag' => $this->request->data['Post']['tag']);

            if ($this->Post->saveAll($this->request->data)) {
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }
        $cat_list = $this->Category->find('list', array(
                'fields' => array('Category.name')
              ));
        $tag_list = $this->Tag->find('list', array(
                'fields' => array('Tag.name')
              ));
        $this->set('categories', $cat_list);
        $this->set('tags', $tag_list);
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    public function delete($id) {
        if ($this->request->is('get')) {
            //throw new MethodNotAllowedException();
            $this->redirect(array('action' => 'index'));
	         }

        if ($this->Post->delete($id)) {
            $this->Flash->success(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
    public function add_image($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }


        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->request->data['Image'][0]['attachment']['name']){
              if ($this->Post->saveAll($this->request->data)) {
                  $this->Flash->success(__('Your post has been updated.'));
                  return $this->redirect(array('action' => 'index'));
              }
              $this->Flash->error(__('Unable to update your post.'));
            }
        }

        $this->set('post', $post);
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add') {
            return true;
        }

        // 投稿のオーナーは編集や削除ができる
         if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


}
