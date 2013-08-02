<?php
//* funckce filtrujące kontent

function contentFilter($content){
  $matches = array();
  $tagExp = "/\[\[([^]]*)\]\]/";
  $pluginExp =  "/([a-zA-Z]+)/";
  $pluginParamExp = ("/([0-9]+)/");
  $pluginParamExp = '/=([A-Za-z0-9.]+)/';  
  //$pluginParamExp = '\s*=(.+?)\s';
  //preg_match($tagExp, $content, $matches);
  preg_match_all($tagExp, $content, $matches);
  //preg_match($pluginExp,$matches[1], $pluginName);
  //echo 'Plagin name: '.$pluginName[1].' Parametr'.$param[1];
  $cms = new ecms();
  //var_dump($matches[1]);
 // echo count($matches[1]);
  
  for($i=0; $i < count($matches[1]);$i++)
  { 
  //echo 'matches '. $matches[1][$i];
  
  //preg_match($pluginExp,$matches[1][$i], $pluginName);
  //preg_match($pluginParamExp,$matches[1][$i], $param);
  //var_dump($param);
  
  $pluginArray = explode("=",$matches[1][$i]);
  //var_dump($pluginArray);
  //echo 'Parametr'. $pluginArray[1].'<br /> ';
  //echo 'Plagin'.  $pluginArray[0].'';
  
   
  switch(/*$pluginName[1]*/$pluginArray[0]){
  case 'newslist':  
  //$html= $cms->displayActiveNews($pluginArray[1],$_SESSION['ln']);
  $html= $cms->displayActiveNews(null,$_SESSION['ln']);
  $content = preg_replace("/\[\[(news.*)\]\]/",$html,$content,1); 
  //echo $content;
  //exit;  
  break;
  case 'catnewslist':
  if (isset($pluginArray[1])){
  $html = $cms->displayNewsCategoryItems($pluginArray[1],$_SESSION['ln']);
  }
  else $html= $cms->displayNewsCategoryList($_SESSION['ln']);
  
  $content = preg_replace("/\[\[(catnewslist.*)\]\]/",$html,$content,1); 
  //echo $content;
  //exit;  
  break;
  
  case 'newsintabs':
  $html = $cms->displayAllNewsInTabs($_SESSION['ln']);
  $content = preg_replace("/\[\[(newsintabs.*)\]\]/",$html,$content,1); 
  //echo $content;
  //exit;  
  break;
  
  case 'contactform':
   if(isset($pluginArray[1]) && ''!=$pluginArray[1]){
    switch ($pluginArray[1]){
    case 'basic':
    $html= $cms->displayContactForm_basic();
    break;
    case 'extended':
    $html= $cms->displayContactForm_extended();
    break;
    default:
    $html= $cms->displayContactForm_basic();
    }
  }else $html= $cms->displayContactForm_basic();

  $content = preg_replace("/\[\[(contactform.*)\]\]/",$html,$content,1); 
  
  break;
  case 'googlemap':
  
  $html = $cms->ecms3_showGoogleMapLocation($pluginArray[1],$pluginarray[2],$_SESSION['ln']);
  //$html= $cms->showGoogleMapLocation(/*$param[1]*/$pluginArray[1]);
  $content = preg_replace("/\[\[(googlemap.*)\]\]/",$html,$content,1); 
  break;
  
  case 'subtree':
  if(isset($pluginArray[1]) && ''!=$pluginArray[1]){
    switch ($pluginArray[1]){
      case 'fulltree':  $html= $cms->displaySubTreeDepth($_SESSION['ln'],null);
      break;
      case 'current':  $html= $cms->displaySubTreeDepth($_SESSION['ln'],$_GET['pid']);
      break;
      default:
      $html= $cms->displaySubTreeDepth($_SESSION['ln'],$pluginArray[1]);
      break;
    }
  } else $html= $cms->displaySubTreeDepth($_SESSION['ln'],$_GET['pid']);
  $content = preg_replace("/\[\[(subtree.*)\]\]/",$html,$content,1); 
  break;
  
   
  case 'galleryintabs':
  $html= $cms->displayAllGalleryInTabs($_SESSION['ln']);
  $content = preg_replace("/\[\[(galleryintabs.*)\]\]/",$html,$content,1); 
  break;
  
  case 'gallery':
  if(isset($pluginArray[1]) && ''!=$pluginArray[1]){
    
    $html= $cms->displayGallery($pluginArray[1],$_SESSION['ln']);
    
  } else $html= $cms->displayFullGallery($_SESSION['ln']);
   
  $content = preg_replace("/\[\[(gallery.*)\]\]/",$html,$content,1); 
  break;
  
  case 'albumlist':
  $html= $cms->displayAlbums($_SESSION['ln']);
  $content = preg_replace("/\[\[(albumlist.*)\]\]/",$html,$content,1); 
  break;
  }
  //preg_match($pluginExp,$matches[1], $pluginName);
  //echo 'Plagin name: '.$pluginName[1].' Parametr'.$param[1];

  }
   return $content;
}
  
  



////    -------------------------------------------


/**
 * function by Wes Edling .. http://joedesigns.com
 * feel free to use this in any project, i just ask for a credit in the source code.
 * a link back to my site would be nice too.
 *
 *
 * Changes: 
 * 2012/01/30 - David Goodwin - call escapeshellarg on parameters going into the shell
 * 2012/07/12 - Whizzkid - Added support for encoded image urls and images on ssl secured servers [https://]
 */

/**
 * SECURITY:
 * It's a bad idea to allow user supplied data to become the path for the image you wish to retrieve, as this allows them
 * to download nearly anything to your server. If you must do this, it's strongly advised that you put a .htaccess file 
 * in the cache directory containing something like the following :
 * <code>php_flag engine off</code>
 * to at least stop arbitrary code execution. You can deal with any copyright infringement issues yourself :)
 */

/**
 * @param string $imagePath - either a local absolute/relative path, or a remote URL (e.g. http://...flickr.com/.../ ). See SECURITY note above.
 * @param array $opts  (w(pixels), h(pixels), crop(boolean), scale(boolean), thumbnail(boolean), maxOnly(boolean), canvas-color(#abcabc), output-filename(string), cache_http_minutes(int))
 * @return new URL for resized image.
 */
function resize($imagePath,$opts=null){
	$imagePath = urldecode($imagePath);
	# start configuration
	$cacheFolder = './cache/'; # path to your cache folder, must be writeable by web server
	$remoteFolder = $cacheFolder.'remote/'; # path to the folder you wish to download remote images into

	$defaults = array('crop' => false, 'scale' => 'false', 'thumbnail' => false, 'maxOnly' => false, 
	   'canvas-color' => 'transparent', 'output-filename' => false, 
	   'cacheFolder' => $cacheFolder, 'remoteFolder' => $remoteFolder, 'quality' => 90, 'cache_http_minutes' => 20);

	$opts = array_merge($defaults, $opts);    

	$cacheFolder = $opts['cacheFolder'];
	$remoteFolder = $opts['remoteFolder'];

	$path_to_convert = 'convert'; # this could be something like /usr/bin/convert or /opt/local/share/bin/convert

	## you shouldn't need to configure anything else beyond this point

	$purl = parse_url($imagePath);
	$finfo = pathinfo($imagePath);
	$ext = $finfo['extension'];

	# check for remote image..
	if(isset($purl['scheme']) && ($purl['scheme'] == 'http' || $purl['scheme'] == 'https')):
		# grab the image, and cache it so we have something to work with..
		list($filename) = explode('?',$finfo['basename']);
		$local_filepath = $remoteFolder.$filename;
		$download_image = true;
		if(file_exists($local_filepath)):
			if(filemtime($local_filepath) < strtotime('+'.$opts['cache_http_minutes'].' minutes')):
				$download_image = false;
			endif;
		endif;
		if($download_image == true):
			$img = file_get_contents($imagePath);
			file_put_contents($local_filepath,$img);
		endif;
		$imagePath = $local_filepath;
	endif;

	if(file_exists($imagePath) == false):
		$imagePath = $_SERVER['DOCUMENT_ROOT'].$imagePath;
		if(file_exists($imagePath) == false):
			return 'image not found';
		endif;
	endif;

	if(isset($opts['w'])): $w = $opts['w']; endif;
	if(isset($opts['h'])): $h = $opts['h']; endif;

	$filename = md5_file($imagePath);

	// If the user has requested an explicit output-filename, do not use the cache directory.
	if(false !== $opts['output-filename']) :
		$newPath = $opts['output-filename'];
	else:
        if(!empty($w) and !empty($h)):
            $newPath = $cacheFolder.$filename.'_w'.$w.'_h'.$h.(isset($opts['crop']) && $opts['crop'] == true ? "_cp" : "").(isset($opts['scale']) && $opts['scale'] == true ? "_sc" : "").'.'.$ext;
        elseif(!empty($w)):
            $newPath = $cacheFolder.$filename.'_w'.$w.'.'.$ext;	
        elseif(!empty($h)):
            $newPath = $cacheFolder.$filename.'_h'.$h.'.'.$ext;
        else:
            return false;
        endif;
	endif;

	$create = true;

    if(file_exists($newPath) == true):
        $create = false;
        $origFileTime = date("YmdHis",filemtime($imagePath));
        $newFileTime = date("YmdHis",filemtime($newPath));
        if($newFileTime < $origFileTime): # Not using $opts['expire-time'] ??
            $create = true;
        endif;
    endif;

	if($create == true):
		if(!empty($w) and !empty($h)):

			list($width,$height) = getimagesize($imagePath);
			$resize = $w;

			if($width > $height):
				$resize = $w;
				if(true === $opts['crop']):
					$resize = "x".$h;				
				endif;
			else:
				$resize = "x".$h;
				if(true === $opts['crop']):
					$resize = $w;
				endif;
			endif;

			if(true === $opts['scale']):
				$cmd = $path_to_convert ." ". escapeshellarg($imagePath) ." -resize ". escapeshellarg($resize) . 
				" -quality ". escapeshellarg($opts['quality']) . " " . escapeshellarg($newPath);
			else:
				$cmd = $path_to_convert." ". escapeshellarg($imagePath) ." -resize ". escapeshellarg($resize) . 
				" -size ". escapeshellarg($w ."x". $h) . 
				" xc:". escapeshellarg($opts['canvas-color']) .
				" +swap -gravity center -composite -quality ". escapeshellarg($opts['quality'])." ".escapeshellarg($newPath);
			endif;

		else:
			$cmd = $path_to_convert." " . escapeshellarg($imagePath) . 
			" -thumbnail ". (!empty($h) ? 'x':'') . $w ."". 
			(isset($opts['maxOnly']) && $opts['maxOnly'] == true ? "\>" : "") . 
			" -quality ". escapeshellarg($opts['quality']) ." ". escapeshellarg($newPath);
		endif;

		$c = exec($cmd, $output, $return_code);
        if($return_code != 0) {
            error_log("Tried to execute : $cmd, return code: $return_code, output: " . print_r($output, true));
            return false;
		}
	endif;

	# return cache file path
	return str_replace($_SERVER['DOCUMENT_ROOT'],'',$newPath);

}

?>