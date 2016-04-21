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

    <?php
    //echo $this->Html->link('../files/image/attachment/' . $image['dir'] . '/' . $image['attachment']);
    ?>

<?php endforeach; ?>



<p><?php echo h($post['Post']['body']); ?></p>
