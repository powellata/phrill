<?php

//header('Content-Type: application/json');
//ini_set('memory_limit','16M');

$error					= false;

$absolutedir			= dirname(__FILE__);
$dir					= '/tmp/';
$serverdir				= $absolutedir.$dir;
$filename				= array();

foreach($_FILES as $name => $value) {
	$json					= json_decode($_POST[$name.'_values']);
	$tmp					= explode(',',$json->data);
	$imgdata 				= base64_decode($tmp[1]);
	
	$extension				= strtolower(end(explode('.',$json->name)));
	$fname					= substr($json->name,0,-(strlen($extension) + 1)).'.'.substr(sha1(time()),0,6).'.'.$extension;
	
	
	$handle					= fopen($serverdir.$fname,'w');
	fwrite($handle, $imgdata);
	fclose($handle);
	
	$filename[]				= $fname;
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phrill Image upload</title>
    
    <meta name="description" content="A HTML5 image upload plugin build with jQuery. Can drag and drop an image, crop it and change ratio." />

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/banner.css" rel="stylesheet">
    <link href="assets/css/html5imageupload.css" rel="stylesheet">
      <style>
.btn {
    font-size: 12px;
}  
	  
.btn-success {
color: #fff;
background-color: #68B2B1;
border-color: #68B2B1;
}

.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    color: #FFF;
    background-color: #4b9493;
    border-color: #4b9493;
}
</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 <div class="inner.banner">
           <header role="banner"  style="height: 62px;">  
              
           <h1 class="logo" style="margin-top: 5px; margin-left: 15px; margin-right: 5px; float:left;">
           <a href="#"><img src="images/logo_lg.png" alt="Phrill" height="50"></a></h1> 
            <h1 class="strapline">    
         HECTIC NEWS COMING FROM A&nbsp;DIMENSIONALLY&nbsp;DIFFERENT&nbsp;WORLD
        </strapline>   
        </header>       
 </div> 
          
	<div class="container">
	  <div class="row">
	    <div class="col-xs-12">
	      <h2>Thank you!</h2>
	    </div>
	  </div>
	  
	  <div class="row">
	    <div class="col-xs-12">
	      <p>Your uploaded image</p>
	      
	      <img src="/tmp/<?php echo $filename[0]?>" class="img-thumbnail img-responsive" />
	      
	      <p>&nbsp;</p>
	      
	     <!-- <div class="row">
		    <div class="col-xs-12">
		      <p class="text-center"><a href="//codecanyon.net/item/html-5-upload-image-ratio-with-drag-and-drop/8712634" class="btn btn-lg btn-info">Download this plugin at Code Canyon!</a></p>
		    </div>
		  </div>-->
	      
	      <div class="row">
		    <div class="col-xs-12">
		      <p class="text-center"><a href="upload.html" class="btn btn-success"><!--<i class="glyphicon glyphicon-chevron-left"></i>-->Upload another image</a></p>
		    </div>
		  </div>
	      
            	      <div class="row">
		    <div class="col-xs-12">
		      <p class="text-center"><a href="/" class="btn btn-success">Back to homepage</a></p>
		    </div>
		  </div>
            
	    </div>
	    
	   <!-- <div class="col-xs-6">
	      <h2></h2>
	      <p>The <code>$_POST</code> variable</p>
	      <pre><?php echo var_dump($_POST); ?></pre>
	      <p>The JSON object</p>
	      <pre><?php echo var_dump($json); ?></pre>
	    </div>-->
	    
	  </div>
	  
	</div>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
	
	</body>
</html>