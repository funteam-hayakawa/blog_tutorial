<!-- File: /app/View/Posts/edit.ctp -->



<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
</script>
<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'インデックス',
          array('controller' => 'posts', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">

    <h1>Edit Post</h1>
    <?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('category', array(
        'options' => $categories,
        'empty'=>'未選択',
        'class' => 'selectpicker'
        //'multiple'=> true,
    ));
    echo $this->Form->input('tag', array(
        'options' => $tags,
        'multiple'=> true,
        'class' => 'selectpicker'
    ));
    echo $this->Form->input('title',array ('class' => 'form-control'));
    echo $this->Form->input('body', array('rows' => '3', 'class' => 'form-control'));
    echo $this->Form->input('id', array('type' => 'hidden'));

    echo $this->Form->end(array('label' => 'Save post', 'class' => 'btn btn-default'));
    ?>

</div>
