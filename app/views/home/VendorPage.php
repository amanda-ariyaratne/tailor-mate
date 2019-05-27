<?= $this->setSiteTitle(($params[0][0]->vendorName).'-TailorMate' )?>

<?= $this->start('head'); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div id="body-content" class="layout-boxed" style="background: #fff !important;">
  <div id="main-content"> 
    <div class="main-content">
      <div id="shopify-section-collection-template" class="shopify-section">



        <div class="wrap-breadcrumb bw-color">
          <div id="breadcrumb" class="breadcrumb-holder container">

            <div class="row">

               <?php 
                      echo
                        '<div class="col-lg-8 d-none d-lg-block">
                          <div class="page-title">'.
                             end($params).'
                          </div>
                        </div>';
                 ?> 

                               
      
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <ul class="breadcrumb">

                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                      <a itemprop="url" href="#home">
                        Home
                      </a>
                    </li>

                    <li class="active">
                      <?= end($params)?>
                      
                    </li>
                    
                  </ul>
                </div>
              </div>

            </div>
          </div>



<div class="page-cata" data-logic="true">
  <div class="container">
  
    <div class="row">

      
        <div id="sidebar" class="left-column-container col-lg-3  d-none d-lg-block">


        <div class="sb-widget">
          <div class="sb-banner">

              
                <a href="/collections/birthday-gifts">
                  <img class="lazyload" src = "//cdn.shopify.com/s/files/1/0102/1155/7435/files/sb_banner_270x.jpg?v=1539569056" alt="" /> 
                </a>
            
              
              
              <div class="block-text">
                <span class="text" style="color: #ffffff;">Wooden kitchen tools</span>
                <a class="btn btn-1" href="/collections/birthday-gifts">shop now</a>
              </div>
          </div>
        </div>


        <?php include 'Categories.php';?>

</div>

      <div class="col-lg-9 col-md-12">
        <div class="row">
          <div class="col-lg-9 col-md-12">

            <div class="wrap-cata-title">
              <h2>
                <?= $params[0][0]->vendorName;?>  
              </h2>
            </div>
              <a href="<?=PROOT?>home/addProduct"><button type="button" class="btn btn-1">Add Product</button></a>

          </div>

          <div class="col-lg-3 col-md-12 row" style="float:right; padding-right: 0px; padding-left: 8%;">
            
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 icon-style">

                          
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12 col-12 icon-style">
              
              <div></div>
              <div><br></div>
            </div> 

            <div class="col-lg-4 col-md-12 col-sm-12 col-12 icon-style notification">
              
                  
            </div>
          </div>

        </div>
        <div class="cata-toolbar">
          <div class="group-toolbar">
            
            <div class="pagination-showing">
              <div class="showing">
                  <?php

                   if ($params[1]<6){
                     echo 'Showing all Items';
                   }
                   elseif ($params[1]>6) {
                     echo 'Showing 6 items from'.$params[1];
                   }

                ?>

              </div>
            </div>
          </div>
        </div>


<div id="col-main">
          
  <div class="cata-product cp-grid">


      <?php
  foreach ($params[0] as $product){
    // dnd();
      if($product->status=="1"){

          $pr_status = "Deactivate";
      }
      if($product->status=="0"){
          $pr_status = "Activate";
      }

      $approved = $product->approve_status;

echo '
<div class="product-grid-item mode-view-item">
                      

  <div class="product-wrapper effect-overlay ">

    <div class="product-head">
      <div class="product-image">';

    if($approved==0){
        echo '<button style="margin-left: 140px" class="btn btn-1" type="button" disabled >'.$pr_status.'</button> ';
    }
    else {
        echo '<button style="margin-left: 140px" class="btn btn-1" type="button" id="'. $product->id .'" onclick="active(id)">' . $pr_status . '</button> ';
    }
      echo ' 
        <div class="featured-img lazyload">
          <a href="'.PROOT.'home/productView/'.$params[0][0]->id.'"> 
            <img style="width: 230px;height: 250px" class="featured-image front lazyload" src="'.PROOT.'assets/images/products/'.$product->images[0].'">  
    
        </span>
          </a>
        </div>
        
        <div class="product-button">

        </div>    

    <div class="wrapper-countdown">
      <div class="countdown_1588807401531"></div>
    </div>
      </div>
    </div>

    <div style="padding: 20px 1px 5px 20px" class="product-content">
      <div  class="pc-inner">
        
        <div class="product-group-vendor-name"> 
          <h5 class="product-name">
            <a href="'.PROOT.'home/productView/'.$params[0][0]->id.'"> 
             '.$product->name.'
            </a>
                    <span class="price-sale"><span style="margin-left: 20px" class=money>'.$product->price.'</span></span>
                    <br><br>
                    <a style="color: #dc3545" href="'.PROOT.'home/editProduct/'.$product->id.'">edit</a>
                    <a style="color: #dc3545;margin-left: 40px"  href="'.PROOT.'home/removeProduct/'.$product->id.'" >remove</a>


          </h5>
          
          
            <div class="product-review">
              <span class="shopify-product-reviews-badge" data-id="1588807401531"></span>
            </div>
          
        </div>
        
    

      
      
      
      <div>
      
        

    </div>
  </div>


</div>
</div>
</div>';


    
  }
 ?>

     
</div>   
</div>
</div>


</div>
</div>
</div>

      </div>
    </div>

  
  </div>
</div>
<script>
    function confirm(name) {
        if(confirm("Remove the product permanently")){
            $.ajax({
                url:<?=PROOT?>name,
                type: "POST",
                // data:{'new': data1},
                // success: function(){
                //     alert("Successfully Activated");
                //     // var array_new=JSON.parse(data);
                // }
            });
        }
    }



    function active(id) {
        alert(id);
        if(document.getElementById(id).innerHTML==="Activate"){
            var arry1 = [id,"1"];
            var data1 = JSON.stringify( arry1 );
                $.ajax({
                    url:"<?=PROOT?>Home/changeActiveStatus",
                    type: "POST",
                    data:{'new': data1},
            success: function(){
                        alert("Successfully Activated");
                // var array_new=JSON.parse(data);
            }
        });
            document.getElementById(id).innerHTML = "Deactivate";

        }
        else {
            var arry2 = [id,"0"];
            var data2 = JSON.stringify( arry2 );
            $.ajax({
                url:"<?=PROOT?>Home/changeActiveStatus",
                type: "POST",
                data:{'new' : data2},
                success: function(){
                    alert("Successfully Deactivated");
                    // var array_new=JSON.parse(data);
                }
            });
            document.getElementById(id).innerHTML = "Activate";
        }
    }

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



<?= $this->end(); ?>
