<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'ユーザインデックス',
          array('controller' => 'users', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>

<div class="container">
    <div class="users form">
    <?php echo $this->Flash->render('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend>
                <?php echo __('Please enter your username and password'); ?>
            </legend>
            <?php echo $this->Form->input('username',array ('class' => 'form-control'));
            echo $this->Form->input('password',array ('class' => 'form-control'));
        ?>
        </fieldset>
    <?php echo $this->Form->end(array('label' => 'Login', 'class' => 'btn btn-default')); ?>
    </div>

</div>
