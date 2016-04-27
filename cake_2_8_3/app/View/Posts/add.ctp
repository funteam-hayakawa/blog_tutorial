<!-- File: /app/View/Posts/add.ctp -->


<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
        $(function(){
          var img_no = 0;
          $('#add_image').click(function(){
            var htm = '';
            htm += '<div class="input file">';
            htm += '<label for="image' + img_no +'Attachment">Image</label>';
            htm += '<input type="file" name="data[Image][' + img_no + '][attachment]" id="Image' + img_no + 'Attachment">';
            htm += '</div>';
            htm += '<input type="hidden" name="data[Image][' + img_no + '][model]" value="Post" id="Image' + img_no + 'Model">';
            htm += '<input type="hidden" name="data[Image][' + img_no + '][name]" value="PostImage" id="Image' + img_no + 'Name">';
            $('#image_uploader').append(htm);
            img_no++;
          });
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

    <h1>Add Post</h1>
    <?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('Post.category_id', array(
        'options' => $categories,
        'empty'=>'未選択',
        'class' => 'selectpicker'
        //'multiple'=> true,
    ));
    echo $this->Form->input('Tag.Tag', array(
        'options' => $tags,
        'multiple'=> true,
        'class' => 'selectpicker'
    ));
    echo $this->Form->input('title',array ('class' => 'form-control'));
    echo $this->Form->input('body', array('rows' => '3', 'class' => 'form-control'));
    ?>
    <input type="button" value="画像を追加" class="btn btn-default" id="add_image">
    <div id='image_uploader'></div>
    <?php
    /*
    echo $this->Form->input('Image.0.attachment', array('type' => 'file', 'label' => 'Image'));
    echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Post'));
    echo $this->Form->input('Image.0.name', array('type' => 'hidden', 'value' => 'PostImage'));
    */
    echo $this->Form->end(array('label' => 'Save post', 'class' => 'btn btn-default'));
    ?>

</div>
