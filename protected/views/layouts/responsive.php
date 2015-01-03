<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.default.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.tagsinput.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/toggles.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/select2.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorpicker.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropzone.css" rel="stylesheet" />
        
        <style type="text/css">
            @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
            .arabic{font-family: 'Droid Arabic Kufi', serif !important;}
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left" style="min-height:20px; height:auto; padding:0; margin:0;">
                    </div>
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class=""><a href="<?php echo Yii::app()->createUrl('saying/index');?>"><i class="fa fa-file-text"></i> <span>Sayings</span></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('category/index');?>"><i class="fa fa-list"></i> <span>Categories</span></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('request/index');?>"><i class="fa fa-list-alt"></i> <span>Requests</span></a></li>
                        
                        
                    </ul>
                    
                </div><!-- leftpanel -->
                
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="media-body">
                                <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
<?php endif ?>
                                <h4><?php echo $this->pageTitle;?></h4>
                            </div>
                        </div><!-- media -->
                    </div>
                    
                    <div class="contentpanel arabic">
                        
                        <?php echo $content; ?>
                        
                        <div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
                    </div>
                    
                </div>
            </div><!-- mainwrapper -->
        </section>


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.3.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pace.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/retina.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookies.js"></script>
        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autogrow-textarea.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mousewheel.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tagsinput.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/toggles.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/colorpicker.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dropzone.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
        <script>
            jQuery(document).ready(function() {
                
                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});
                 
                // Textarea Autogrow
                jQuery('#autoResizeTA').autogrow();
                
                // Spinner
                var spinner = jQuery('#spinner').spinner();
                spinner.spinner('value', 0);
                
                // Form Toggles
                jQuery('.toggle').toggles({on: true});
                
                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                
                // Input Masks
                jQuery("#date").mask("99/99/9999");
                jQuery("#phone").mask("(999) 999-9999");
                jQuery("#ssn").mask("999-99-9999");
                
                // Select2
                jQuery("#select-basic, #select-multi").select2();
                jQuery('#select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
                jQuery('select option:first-child').text('');
                
                jQuery("#select-templating").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
                // Color Picker
                if(jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
			    jQuery(colpkr).fadeIn(500);
                            return false;
			},
			onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
			},
			onChange: function (hsb, hex, rgb) {
			    jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
			    jQuery('#colorpicker').val('#'+hex);
			}
                    });
                }
  
                // Color Picker Flat Mode
                jQuery('#colorpickerholder').ColorPicker({
                    flat: true,
                    onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
                    }
                });
                
                
            });
        </script>

    </body>
</html>
