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

echo $this->Form->input('Image.0.attachment', array('type' => 'file', 'label' => 'Image'));
echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Post'));
echo $this->Form->input('Image.0.name', array('type' => 'hidden', 'value' => 'PostImage'));

echo $this->Form->end('Save Post');
?>

<p><?php echo h($post['Post']['body']); ?></p>
