<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'タグ  インデックス',
          array('controller' => 'tags', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">
    <div class="categories form">
    <?php echo $this->Form->create('Tag'); ?>
        <fieldset>
            <legend><?php echo __('Add Tag'); ?></legend>
            <?php echo $this->Form->input('name',array ('class' => 'form-control'));
        ?>
        </fieldset>
    <?php echo $this->Form->end(array('label' => 'Save tag', 'class' => 'btn btn-default')); ?>
    </div>
</div>
