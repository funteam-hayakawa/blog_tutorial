<!-- File: /app/View/Posts/add.ctp -->


<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
        $(function(){
          var img_no = 0;
          $('#add_image').click(function(){
            var htm = '';
            var id = 'Image' + img_no + 'Attachment';
            htm += '<div id="img_div' + id + '">'
            htm += '<div class="input file">';
            htm += '<label for="image' + img_no +'Attachment">Image</label>';
            htm += '<input style="display:none" class="image_uploader_input" type="file" name="data[Image][' + img_no + '][attachment]" id="' + id + '">';
            htm += '</div>';
            htm += '<input type="hidden" name="data[Image][' + img_no + '][model]" value="Post" id="Image' + img_no + 'Model">';
            htm += '<input type="hidden" name="data[Image][' + img_no + '][name]" value="PostImage" id="Image' + img_no + 'Name">';

            htm += '<div class="input-append">';
            htm += '<input required="required" id="photoCover' + id + '" class="required input-large" type="text" readonly="readonly" style="width:480px;" >';
            htm += '<a class="btn btn-default file_btn" input_id="' + id +'")>画像を選択</a>';
            htm += '<a class="btn btn-default clear_btn" input_id="' + id +'")>クリア</a>';
            htm += '</div>';
            htm += '</div>';
            $('#image_uploader').append(htm);
            img_no++;
          });
          $('#image_uploader').on('click', ".file_btn", function(e){
            //console.log($(e.target).attr('input_id'));
            var id = $(e.target).attr('input_id');
            $('#' + id).click();
          });
          $('#image_uploader').on('click', ".clear_btn", function(e){
            var id = $(e.target).attr('input_id');
            $('#' + id).val("");
            $('#photoCover' + id).val("");
            $('#img_div' + id).css({"display":"none"});
          });
          $('#image_uploader').on('change', ".image_uploader_input", function(e){
              var id = $(e.target).attr('id');
              $('#photoCover' + id).val($(this).val());
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
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <?php
                echo $this->Form->create('Post', array('type' => 'file'));
                ?>
                <label for="Category">Category</label>
                <?php
                echo $this->Form->input('Post.category_id', array(
                    'options' => $categories,
                    'empty'=>'未選択',
                    'class' => 'selectpicker',
                    'label' => false,    // labelを出力しない
                    //'multiple'=> true,
                ));
                ?>
                <label for="Tag">Tag</label>
                <?php

                echo $this->Form->input('Tag.Tag', array(
                    'options' => $tags,
                    'multiple'=> true,
                    'class' => 'selectpicker',
                    'label' => false,    // labelを出力しない
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
        </div>
    </div>
</div>
