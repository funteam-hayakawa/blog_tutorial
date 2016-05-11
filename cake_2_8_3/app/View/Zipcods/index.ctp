<style type="text/css">
<!--
  .dispn {
    display : none;
  }
-->
</style>

<script type="text/javascript">

        $(function(){
          //$('#zipcode').val('452-0961');
          function isPostcode( postcode )
          {
            if( (postcode.match(/^\d{3}-?\d{4}$/)) ){
              return true;
            }else{ return false; }
          }
          $('#zip_search').click(function(){
              var zip = $('#zipcode').val();
              $("#addr_selector_div").empty();
              $('#addr').removeClass("dispn");
              if (!isPostcode(zip)){
                $('#addr').val("郵便番号の形式が不正です");
                return;
              }
              zip = zip.replace( '-' , "" ) ;
              $.ajax({
                 type: "POST",
                 url: "http://blog.dev/cake_2_8_3/zipcods/zipsearch/",
                 data: {'zipcode' : zip},
                 success: function(msg){
                   var obj = JSON.parse(msg)
                   console.log(obj);
                   if (obj.length == 0){
                       $('#addr').val("有効な郵便番号を入力してください");
                       return;
                   }else if (obj.length == 1){
                       var addr = '';
                       addr += obj[0].Zipcod.pref;
                       addr += obj[0].Zipcod.city;
                       addr += obj[0].Zipcod.street;
                       $('#addr').val(addr);
                   }else{
                       var htm='';
                       $('#addr').addClass("dispn");
                       $('#addr').val("");
                       htm += '<select data-width="480px" id="addr_selector" class="selectpicker">';
                       htm += '<option id=0">以下から選択してください</option>"';
                       $.each(obj, function(key, value) {
                          var addr = value.Zipcod.pref;
                          addr += value.Zipcod.city;
                          addr += value.Zipcod.street;
                          addr = addr.replace( '以下に掲載がない場合' , "" ) ;
                          htm += '<option id="' + key + '">' + addr + "</option>";
                       });
                       htm += '</select>';
                       $("#addr_selector_div").html(htm);
                       $("#addr_selector").selectpicker();
                   }
                 }
               });//ajax
          });//click
          $('#addr_selector_div').on('change', '#addr_selector', function(){
              $('#addr').val($("#addr_selector").val());
              $("#addr_selector_div").empty();
              $('#addr').removeClass("dispn");
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


<hr>
<label>zipcode</label>
<input style="width:480px;" empty="1" class="form-control" maxlength="8" type="text" value="" id="zipcode">
<input type="button" value="郵便番号検索" class="btn btn-default" id="zip_search">
<input style="width:480px;" empty="1" class="form-control" maxlength="128" type="text" value="" id="addr">
<div id="addr_selector_div"><div>

</div>
