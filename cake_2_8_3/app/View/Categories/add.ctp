<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'インデックス',
          array('controller' => 'categories', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">
    <div class="categories form">
    <?php echo $this->Form->create('Category'); ?>
        <fieldset>
            <legend><?php echo __('Add Category'); ?></legend>
            <?php echo $this->Form->input('name',array ('class' => 'form-control'));
        ?>
        </fieldset>
    <?php echo $this->Form->end(array('label' => 'Save category', 'class' => 'btn btn-default')); ?>
    </div>
</div>
