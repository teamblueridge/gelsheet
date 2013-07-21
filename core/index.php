<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gelsheet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <style type="text/css" media="screen">
	    @import url("./themes/opengoo/style.css");
	    @import url("./themes/opengoo/toolbar.css");
	    @import url("./js/lib/extjs/extjs2.2/css/ext-all.css");
    </style>

    <!--[if IE]>
    <style type="text/css" media="screen">
		@import url("./ie.css");
	</style>	
	<![endif]-->
	
	<!--[if lte IE 7]>
    <style type="text/css" media="screen">
		@import url("./ie7.css");
	</style>	
	<![endif]-->
	
	<script type="text/javascript" src="util/language.js.php"></script>
	<script type="text/javascript" src="js/lib/extjs/extjs2.2/adapter/ext/ext-base.js"></script>
	<script type="text/javascript" src="js/lib/extjs/extjs2.2/ext-all.js"></script>
	
	<script>
	
		alert(parent.Gelsheet.config.toSource());
	</script>
	<?php 
    $cnf = array();
    $cnf['jspath'] = array();

    
    $includes = "";
    $developing = true;
	
   //<!--******************* External Libraries *********************-->    
	//$cnf['jspath'][] = "./js/lib/extjs/extjs2.2/ext-all.js";
    
	//<!--******************* Handlers/Managers *********************-->
	
	include_once 'util/javascripts.php';    
     
    $fileName = "js/gelsheet.min.js";
    
    if($developing == false){
    	//if minified file doesn't exists build it
    	if(!file_exists($fileName)){
			include_once 'util/jsmin-1.1.1.php';
	 		$includes = "";
	        foreach ($cnf['jspath']  as $file) {
	            $includes .= file_get_contents($file) . "\n";
	        }
	        $includes = JSMin::minify($includes);
	        file_put_contents($fileName, $includes);
    	}
        $includes = "\t<script type=\"text/javascript\" src=\"".$fileName."\"></script>\n";
//		echo "<script type=\"text/javascript\">\n" .$includes ."\n</script>\n";
		echo $includes; 
	}else{
		foreach ($cnf['jspath'] as $file) 
			$includes .= "\t<script type=\"text/javascript\" src=\"".$file."\"></script>\n";
		echo $includes;
	}
		
		
   ?> 
    <script type="text/javascript" >
    	
    	
        function load(){			
        	window.ogID = '' ;
			window.ogWID = '' ;
	<?php if (isset($_GET['id'])) : ?>
			window.ogID = <?php echo $_GET['id'] ?>;
	<?php endif; ?>
	<?php if (isset($_GET['wid'])) : ?>
			window.ogWID = <?php echo $_GET['wid'] ?>;
	<?php endif; ?>

        	var application = new Application(document.body);
	<?php if (isset($_GET['book'])) :  ?>
			application.loadBook(<?php echo $_GET['book'] ?>);
	<?php endif; ?>


			// Display logo..
			var logo_div = document.getElementById('logo');
			if ( logo_div ) {
				logo_div.style.display = "block"; 
			}
        	
        }
    </script>
</head>

<body id="body" onload="load();" >
  <div id="logo" style="z-index: 1001; display: none" ></div>
  <div id="west"></div>
  <div id="north">
  </div>
  <div id="dialog-container" style="position: absolute; z-index: 50000 ;"></div>
  <div id="center"></div>
  <div id="east" style="width:200px;height:200px;overflow:hidden;"></div>
  <div id="south"></div>
</body>
</html>
