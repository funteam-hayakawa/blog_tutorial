

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
    <h1><?php echo h($post['Post']['title']); ?></h1>

    <?php
    //echo "<pre>"; print_r($post); echo "</pre>";
    ?>

    <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

    <?php foreach ($post['Image'] as $image): ?>
      <img src=
        <?php
        echo '../../files/image/attachment/' . $image['dir'] . '/' . $image['attachment'];
        ?>
        width="256">
    <?php endforeach; ?>

    <?php
    echo $this->Form->create('Post', array('type' => 'file'));

    echo $this->Form->input('id', array('type' => 'hidden'));

    echo $this->Form->input('Image.0.attachment', array('type' => 'file', 'label' => 'Image',
      'style' => "display:none"));
    echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Post'));
    echo $this->Form->input('Image.0.name', array('type' => 'hidden', 'value' => 'PostImage'));
    ?>
    <div class="input-append">
    <input id="photoCover" class="input-large" type="text" readonly="readonly" style="width:480px;" >
    <a class="btn btn-default" onclick="$('input[id=Image0Attachment]').click();">画像を選択</a>
    </div>

    <?php
    echo $this->Form->end(array('label' => 'Save post', 'class' => 'btn btn-default'));
    ?>
    <script type="text/javascript">
    $('input[id=Image0Attachment]').change(function() {
    $('#photoCover').val($(this).val());
    });
    </script>

    <p><?php echo h($post['Post']['body']); ?></p>
</div>
