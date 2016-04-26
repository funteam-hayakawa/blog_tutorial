<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
</script>

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
    <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend><?php echo __('Edit User'); ?></legend>
            <?php echo $this->Form->input('username',array ('class' => 'form-control'));
            echo $this->Form->input('password',array ('class' => 'form-control'));
            echo $this->Form->input('role', array(
                'options' => array('admin' => 'Admin', 'author' => 'Author'),
                'class' => 'selectpicker'
            ));
        ?>
        </fieldset>
    <?php echo $this->Form->end(array('label' => 'Submit', 'class' => 'btn btn-default')); ?>
    </div>
</div>
