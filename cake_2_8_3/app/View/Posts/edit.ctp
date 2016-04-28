<!-- File: /app/View/Posts/edit.ctp -->

<style type="text/css">
<!--
  .dispn {
    display : none;
  }
  .hide {
    Visibility : hidden;
  }
  .popup-item{
     position:fixed;     /* 位置の固定 */
     top: 50%;           /* 表示位置(真ん中に表示) */
     left: 50%;          /* 表示位置(真ん中に表示) */
     margin: -25%;
     padding: 0;         /* 余白の削除 */
     z-index:1001;       /* 要素のz座標 */
   }
   .btn-left{
      position:fixed;     /* 位置の固定 */
      top: 50%;           /* 表示位置(真ん中に表示) */
      left: 50%;          /* 表示位置(真ん中に表示) */
      margin-left: -25%;
      padding: 0;         /* 余白の削除 */
      z-index:1002;       /* 要素のz座標 */
      opacity : 0.5;
    }
    .btn-right{
       position:fixed;     /* 位置の固定 */
       top: 50%;           /* 表示位置(真ん中に表示) */
       right: 50%;          /* 表示位置(真ん中に表示) */
       margin-right: -25%;
       padding: 0;         /* 余白の削除 */
       z-index:1002;       /* 要素のz座標 */
       opacity : 0.5;
     }
-->
</style>

<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
        var img = [];
        var img_idx = {};
        var img_id = [];
        var curr_idx;
        var img_no = 0;
        $(function(){
          var i;
          for(i = 0 ; i < $('.post_image').length ; i++){
              //console.log($($('.post_image')[i]).attr('src'));
              var tmp = $($('.post_image')[i]).attr('src');
              var id = $($('.post_image')[i]).attr('img_id');
              img[i] = tmp;
              img_idx[tmp] = i;
              img_id[i] = id;
          }
          var setimage = function(img_url){
            var htm = '';
            htm += '<img src="' + img_url + '" width="' + Math.floor(window.innerWidth/2) + 'px"/>';
            $('#popup_item').hide();
            $('#popup_image').html(htm);
            $('#popup_item').fadeIn(500);
            if (curr_idx == 0){
              $('#prev').addClass('hide');
            } else {
              $('#prev').removeClass('hide');
            }
            if (curr_idx == img.length-1){
              $('#next').addClass('hide');
            } else {
              $('#next').removeClass('hide');
            }
          };

          $('.post_image').click(function(e){
             //console.log($(e.target).attr('src'));
             var img_url = $(e.target).attr('src');
             curr_idx = img_idx[img_url];
             setimage(img_url);
          });
          $('#delete').click(function(){
            //console.log(img_id[curr_idx]);
            var post_id = $('#PostId').val();
            var postForm = function(url, data) {
            var $form = $('<form/>', {'action': url, 'method': 'post'});
                for(var key in data) {
                    $form.append($('<input/>', {'type': 'hidden', 'name': key, 'value': data[key]}));
                }
                $form.appendTo(document.body);
                $form.submit();
            };
            //console.log('postid' + post_id);
            if (confirm("Are you sure?")){
              //console.log("消す");
              var request = new XMLHttpRequest();
              var url="http://blog.dev/cake_2_8_3/posts/deleteimage/"+ post_id + "/" + img_id[curr_idx] + "/";
              postForm(url, {dummy:0});
            }
          });
          $('#close').click(function(){
              $('#popup_item').fadeOut();
          });
          $('#next').click(function(){
            if (curr_idx < img.length - 1){
              curr_idx++;
              var img_url = img[curr_idx];
              setimage(img_url);
            }
          });
          $('#prev').click(function(){
            if (curr_idx > 0){
              curr_idx--;
              var img_url = img[curr_idx];
              setimage(img_url);
            }
          });

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

    <h1>Edit Post</h1>
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
                echo $this->Form->input('id', array('type' => 'hidden'));
                ?>
                <div>


                  <?php foreach ($post['Image'] as $image): ?>
                    <?php
                    //echo "<pre>"; print_r($image); echo "</pre>";
                     ?>
                      <img src=
                        <?php
                        echo '../../files/image/attachment/' . $image['dir'] . '/' . $image['attachment'];
                        ?>
                        width="256" class="post_image" img_id=<?php echo $image['id'] ?>>
                        <?php
                      //echo $this->Html->link('../files/image/attachment/' . $image['dir'] . '/' . $image['attachment']);
                      ?>

                  <?php endforeach; ?>
                  <div id='popup_item' class="popup-item dispn">
                      <div style="float:right">
                        <input type="button" value="写真の削除" class="btn btn-default" id="delete">
                        <input type="button" value="閉じる" class="btn btn-default" id="close"><br>
                      </div>
                      <div style="clear:both"></div>
                      <div class="btn-left">
                        <input type="button" value="前" class="btn btn-default" id="prev">
                      </div>
                      <div id='popup_image'></div>
                      <div class="btn-right">
                        <input type="button" value="次" class="btn btn-default" id="next">
                      </div>
                  </div>
                </div>
                <input type="button" value="画像を追加" class="btn btn-default" id="add_image">
                <div id='image_uploader'></div>
                <?php
                echo $this->Form->end(array('label' => 'Save post', 'class' => 'btn btn-default'));
                ?>
            </div>
        </div>
    </div>
</div>
