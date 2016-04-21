<?php

class Post extends AppModel {

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        'title' => array('type' => 'like'),
        'category' => array('type' => 'value', 'field' => 'Category.id'),
        //'tag' => array('type' => 'value', 'field' => 'Tag.name'),
        array('name' => 'tag', 'type' => 'subquery', 'method' => 'searchTag', 'field' => 'Post.id'),
    );
    function searchTag($data = array()) {
       $this->PostsTag->Behaviors->attach('Containable', array('autoFields' => false));
       $this->PostsTag->Behaviors->attach('Search.Searchable');

       if ($data['tag'][0]){
         $query = $this->PostsTag->getQuery('all', array(
             'conditions' => array('PostsTag.tag_id' => $data['tag']),
             'fields' => array('post_id'),
             'contain' => array('Tag')
             )
         );
       }else{
         $query = $this->getQuery('all', array(
             'fields' => array('id'),
             )
         );
       }
       return $query;
   }
    public $hasMany = array(
        'Image' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'conditions' => array(
                'Image.model' => 'Post',
            ),
            'dependent' => true
        ),
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'order' => 'Post.id ASC',
        ),
      );

    public $hasAndBelongsToMany = array(
    'Tag' =>
        array(
            'className' => 'Tag',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'post_id',
            'associationForeignKey' => 'tag_id',
            'unique' => true,
            'with' => 'PostsTag',
        )
      );

}
