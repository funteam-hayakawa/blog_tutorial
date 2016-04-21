<?php

App::uses('AppModel', 'Model');

class Tag extends AppModel {
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A name is required'
            )
        ),
    );

    public $hasAndBelongsToMany = array(
    'Post' =>
        array(
            'className' => 'Post',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'tag_id',
            'associationForeignKey' => 'post_id',
            'unique' => true,
        )
      );

}
