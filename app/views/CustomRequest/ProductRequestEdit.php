<?= $this->setSiteTitle('Product Request') ?>

<?= $this->start('head'); ?>
	<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/woo-styles.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/style-1.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/grid.css' type='text/css' media='all' />
	<link rel='stylesheet' id='editor-buttons-css'  href='http://handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>assets/css/datetimepicker.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


<?= $this->end(); ?>

<?= $this->start('body'); ?>

<?php 
	$images = $params['details']['img_url_array'];
	$images_config = $params['details']['img_config_array'];
?>

<div class="site-wrapper">

<div class="site-main container">
	<!-- Content wrapper -->
	<div class="row">
		
	<div class="breadcrumbs-wrapper col-md-12 col-sm-12 col-xs-12">
		<!-- Breadcrumbs-wrapper -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="page-title">
							Custom Request	
						</div>
			</div>
			<div class="col-md-8 col-sm-6 col-xs-12">
				<p id="breadcrumbs" class="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="http://handy.themes.zone/" rel="v:url" property="v:title">Home</a> / <span class="breadcrumb_last">Custom Request</span></span></span></p>						
			</div>
		</div>
	</div>
</div>
<!-- end of Breadcrumbs -->
			
	<main class="site-content col-xs-12 col-md-9 col-sm-8 col-md-push-3 col-sm-push-4" itemscope="itemscope" itemprop="mainContentOfPage">

	<!-- Main content -->
			
	<div class="page-content entry-content">

	<!-- Page content -->
		
		
	<div class="wcvendors-pro-dashboard-wrapper"> 
		
	<div class="wcv-grid">

		<?php $details=$params['details'][0]; 

		// dnd($params['product_id'])?>
		<form method="post" id="post-custom-request-form" enctype="multipart/form-data" action="<?=PROOT?>CustomRequestController/ProductRequestEdit/<?=$params['product_id']?>" onsubmit="return validateData();">
			<?php 
				if(isset($_SESSION['alert']))
					{echo $_SESSION['alert']; $_SESSION['alert'] = '';
				}
			?>
			
			<h3>Design Request</h3>			

			<br />

			<div class="wcv-tabs top" data-prevent-url-change="true">

				<!-- Design request Settings Form -->

				<div class="tabs-content" id="store">

					<!-- Design Name -->

					<div class="control-group" >
						<label>Design Name 							
							<small style="font-color: red !important;">*Required</small>
						</label>

						<div class="control" >
							<input type="text" class="form-control" name="design-name" value="<?=$details->pr_name?>" id="design-name"  style="width: 616px;" placeholder="design name" data-rules="required"/> 
							<small id="error-msg-name"></small>
						</div>

						

					</div>
					<br />
					
					<!-- Design Description -->

					<div class="control-group" >
						<label>Design Description</label>

						<div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active" style="width: 618px;" placeholder="ex: This product is about...">
							
						<div id="wp-pv_shop_description-editor-container" class="wp-editor-container">
							<div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>

							<textarea  style="height: 200px;width: 617px;" autocomplete="off" cols="40" name="design-Description" id="design-description"><?=$details->description?></textarea>				 

							<small id="error-msg-description"></small>  
						</div>
						</div>
					</div>
					<br />

					


					
					<div class="row">

						<!-- Add an image -->
						
						<div class="control-group col-lg-9">
							<label>Image</label>
							<small>*Add 1-3 images</small>		
							<br>
							<input type='file' id="design-image" name="fileUpload[]" multiple="true" style="border:none; background-color: none;" />	
								
							<small id="error-msg-images"></small>
						</div>

					</div>
					<div class="row">	
						<!-- Add a color -->

						<div class="control-group col-lg-7">
							<label>Color</label>	<br>
							<input type="color" id="design-color" value="<?=$details->color?>" name="color-picker" style="border:none;background-color: none;width: 40px;padding-left: 0px;padding-right: 0px;" />
							 
							 <small id="error-msg-color"></small><br>
						</div>

					</div>

					<br/>

					<!-- Add ypur measurements -->
			<?php 			

			$options='';
			foreach ($params['measurement_types'] as $measurement_type){
				$options=$options.'<option value='.$measurement_type->name.'>'.$measurement_type->name.'</option>';

			}

			$measurements=$params['details']['measurements'];

			$types=[];		
			foreach ($measurements as $measurement){
				$options='';
				foreach ($params['measurement_types'] as $measurement_type){

					if ($measurement_type->name==$measurement->measurement_type){
						$options=$options.'<option value='.$measurement_type->name.' selected>'.$measurement_type->name.'</option>';
					}
					else{
						$options=$options.'<option value='.$measurement_type->name.'>'.$measurement_type->name.'</option>';
					}
				}
				array_push($types,$options);	
			}
				echo '


				<div class="control-group">
						<div class="row">
							<label class="col-md-4">Measurements (in Inches)</label>
							<div class="col-md-1"></div>
							<i class="fa fa-plus col-md-4" style="color: #000;padding-left: 30px;" aria-hidden="true"></i>
							<div class="col-md-3"></div>
						</div>
				';

				for ($i=1; $i<count($measurements)+1; $i++){
					echo '

						<div class="row id-'.$i.'">

							<div class="form-group col-lg-2">
						      <select class="form-control" id="type-1" name="type[]" style="width: 150px;height: 38.5px;">
						      '.$types[$i-1].'
						      </select>
						     </div>

							<div class="col-lg-1"></div>

							<input type="text" name="measurement[]" value="'.$measurements[$i-1]->measurement.'" class="form-control col-lg-2" placeholder="$xxx" data-rules="required"/>

							<button type="button" class="close col-lg-1 btn-id-update" data-id='.$measurements[$i-1]->id.' aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>

							<div class="col-lg-6"></div>

						</div>
					';
				}

				$id=count($measurements)+1;

		 	?>


						<div id="id-<?=$id?>"></div>

						<small id="error-msg-measurements"></small>
														
					</div>
					
					<br/>

					<!-- Add a price range -->

					<div class="control-group" style="padding-left: 14px;">
						<label>Price Range</label>
						<div class="row control">
							<input type='text' id="min-price" name="min-price" class="form-control col-lg-2" placeholder="$least" data-rules="required" value="<?=$details->min_price?>"/>

							<div class="col-lg-1"></div>
							<input type='text' id="max-price" name="max-price" class="form-control col-lg-2" placeholder="$maximum" data-rules="required" value="<?=$details->max_price?>"/>	
							<div class="col-lg-7"></div>
						</div>								
					</div>
					<small id="error-msg-prices"></small>

					<br/>

					<!-- Add location -->

						<div class="control-group">
							<label >Postal Code</label>	
							<input type='text' value="<?=$details->location?>" placeholder="ex: 15000" style="width: 181px;" id="postal-code" class="form-control" name="postal-code"  />
							<small id="error-msg-location"></small>
						</div>
						<br/>
						
						

						<!-- Add due Date -->
						
						<div class="control-group">
							<label >Due date</label>	
							<input type='date'  id="due-date" style="width: 182px;padding-left: 10px;padding-right: 10px;" class="form-control" name="due-date" value="<?=$details->due_date?>"/>
							<small id="error-msg-due-date"></small>
						</div>
					             
				</div>
				<br>                 
				</div>

				<div class="control-wrapper last">
	                <button class="btn btn-1"  type="submit" id="submitForm">
	                	Submit Product
	            	</button>
	            </div>
		</form>
	</div>

		
		
	</div><!-- end of Page content -->

	</main><!-- end of Main content -->

	<script type="text/javascript">

		$(document).ready(function(){

			var id=<?=$id?>;
			var cl=id+1;

			$('.fa-plus').on('click',function(){

				$('#id-'+id).addClass('row');


				$('#id-'+id).addClass('id-'+cl);
				

				// console.log($('#id-'+id));
				var divTag='<div class="form-group col-lg-2"><select class="form-control"  name="type[]" style="width: 150px;height: 38.5px;"><?=$options?></select></div><div class="col-lg-1"></div><input type="text" name="measurement[]" class="form-control col-lg-2" placeholder="$xxx" data-rules="required"/><button type="button" class="close col-lg-1 btn-id" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="col-lg-6"></div>';

				$('#id-'+id).html(divTag);
				id++;

				$('.id-'+cl).after('<div id="id-'+id+'"></div>');
				cl++;
			});

			$('.btn-id').on('click',function(){
				$(this).parent().remove();
			});

			$('.btn-id-update').on('click',function(){

				var id=$(this).data("id");

				$.ajax({  
	                url:"<?=PROOT?>CustomRequestController/removeMeasurement",
	                method: "POST",
	                data:{'m_id': id },
	                success: function(data){
	                	data=JSON.parse(data);
	                	console.log(data);                    
	                }
	            }); 
	            $(this).parent().remove();				
			});



			jQuery("#design-image").fileinput({
			          overwriteInitial: false,
			          dropZoneEnabled: true,
			          dropZoneTitle: '<span style="font-size:16px;"><b>Drop files here or click to upload.</b></span>',
			          dropZoneClickTitle: '<br><span style="font-size:14px;">(Maximum file size is 30MB and 3 files are allowed</span>)',
			          uploadUrl: "<?=PROOT?>CustomRequestController/ProductRequestEdit",
			          uploadAsync : true,
			          showUpload: false,
			          showBrowse: false,
			          showPreview: true,
			          purifyHtml: true,
			          showCaption: false,
			          showUploadedThumbs: true,
			          browseOnZoneClick: true,
			          minFileCount: 1,
			          maxFileCount: 3,
			          allowedFileTypes: ['image'],          
			          allowedFileExtensions: ["jpg", "gif", "png", "jpeg", "jfif"],
			          maxFileSize: 30000,
			          initialPreview: <?php echo json_encode(array_slice($images, 0, 10 ) ); ?>,
                      initialPreviewConfig: <?php echo json_encode(array_slice($images_config, 0, 10)) ?>,
			          elErrorContainer : false,
			          fileActionSettings: {
			            showUpload: false,
			            showZoom: false
			          },
			          uploadExtraData: function(event, files) {
			            tinymce.triggerSave();

			            var poData = new FormData(document.getElementById('post-custom-request-form'));

			            var test = {};
			            for (var pair of poData.entries()) {

			              test[pair[0]] = pair[1]
			            }
			            console.log(test);
			            return test;
			          }

			        }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
			          $("#submitForm").prop('disabled', true);
			          toastr.success("Your Ad was successfully submitted");
			          location.reload();
			        }).on('filebatchuploaderror', function(event, data, msg) {
			        	alert(msg);
			          $("#submitFormBtn").prop("disabled", false)
			          $("#saveFormBtn").prop('disabled', false);
			          $(".submit-btn-loader").css('display', 'none');

			          if(data.jqXHR.responseJSON.hasOwnProperty("errors")){
			            var errors = data.jqXHR.responseJSON.errors

			            $.each(errors, function(index, value){

			              toastr.error(value);
			            });

			          }else{
			            toastr.error("!! Opps, Something went wrong. Please try again.");

			          }
			        }).on('filesorted', function(e, params) {
			          console.log('File sorted params', params);
			        });

			        $('#file_upload').on('filedeleted', function(event, key, jqXHR, data) {
                        console.log("Successfully deleted!");
                    });

		});

		// function removeElement(className, id){
		// 	$('.'+className+id).parent().remove()
		// }

		var count=1;
		function addMore(){

			var sid=("design-color-more-"+count);
			var addMoreV=document.getElementById(sid);
			addMoreV.style.display="inline-block";
			count++;
		}

		function validateData(){

			document.getElementById("error-msg-name").innerHTML="";
			document.getElementById("error-msg-description").innerHTML="";
			document.getElementById("error-msg-images").innerHTML="";
			document.getElementById("error-msg-location").innerHTML="";
			document.getElementById("error-msg-date").innerHTML="";

			var date=document.getElementById("due-date").value;
			var postalCode=document.getElementById("postal-code").value;
			var name=document.getElementById("design-name").value;
			var description=document.getElementById("design-description").value;
			var images=document.getElementById("design-image").files;
			var color=document.getElementById("design-color");
			var error;

			//window.alert(color);
		

			if (name==""){
				error=document.getElementById("error-msg-name");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Name is required!</small>";
				return false;
			}

			else if (images.length<0 || images.length>3){
				error=document.getElementById("error-msg-images");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Add valid number of images!</small>";
				return false;
			}

			else if (postalCode==""){
				error=document.getElementById("error-msg-location");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Invalid postalCode!</small>";
				return false;
			}

			else if (date==""){
				error=document.getElementById("error-msg-date");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Date is required!</small>";
				return false;
			} 

			else{
				return true;				
			}
		}	


	</script>
	
	   	
	<div id="sidebar-pages" class="widget-area col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 sidebar" role="complementary">
		<br><br>
			<?php include (ROOT.DS.'app'.DS.'views'.DS.'home'.DS.'Categories.php');?>					
	</div>
				

</div>
<br><br><br>
</div><!-- end of Content wrapper -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
	// Display an info toast with no title
	toastr.info('Are you the 6 fingered man?')

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
	// Display an info toast with no title
	toastr.info('Are you the 6 fingered man?')

</script>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<?= $this->end(); ?>