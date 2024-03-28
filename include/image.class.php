<?php
// +----------------------------------------------------------------------
// | 方维购物分享网站系统 (Build on ThinkPHP)
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://fanwe.com All rights reserved.
// +----------------------------------------------------------------------

/**
 * image.class.php
 *
 * 
 *
 * @package class
 * @author awfigq <awfigq@qq.com>
 */
if(!defined('MY_ROOT'))
	define('MY_ROOT', str_replace('include/image.class.php', '', str_replace('\\', '/', __FILE__)));

class Image
{
	/**
	 * 
	 */
	var $file = array();
	/**
	 * 
	 */
	var $dir = 'public';
	/**
	 * 
	 */
	var $error_code = 0;
	/**
	 *
	 */
	var $max_size = 204800000;

	function Image()
	{
		
	}

	/**
	 *
	 * @param array $file
	 * @param string $dir
	 * @return bool
	 */
	function init($file, $dir = 'temp')
	{
		if(!is_array($file) || empty($file) || !$this->isUploadFile($file['tmp_name']) || trim($file['name']) == '' || $file['size'] == 0)
		{
			$this->file = array();
			$this->error_code = -1;
			return false;
		}
		else
		{
			$file['size'] = intval($file['size']);
			$file['name'] =  trim($file['name']);
			$file['thumb'] = '';
			$file['ext'] = $this->fileExt($file['name']);
			$file['name'] =  htmlspecialchars($file['name'], ENT_QUOTES);

			$file['is_image'] = $this->isImageExt($file['ext']);
			$file['file_dir'] = $this->getTargetDir($dir);
			$file['prefix'] = md5(microtime(true)).random('6');
			$file['target'] = $file['file_dir'].'/'.$file['prefix'].'.jpg';
			$file['local_target'] = MY_ROOT.$file['target'];
			$this->file = &$file;
			$this->error_code = 0;
			return true;
		}
	}

	/**
	 *
	 * @return bool
	 */
	function save()
	{
		if(empty($this->file) || empty($this->file['tmp_name']))
			$this->error_code = -101;
		elseif(!$this->file['is_image'])
			$this->error_code = -102;
		elseif(!$this->saveFile($this->file['tmp_name'], $this->file['local_target']))
			$this->error_code = -103;
		elseif($this->file['is_image'] && (!$this->file['image_info'] = $this->getImageInfo($this->file['local_target'], true)))
		{
			$this->error_code = -104;
			@unlink($this->file['local_target']);
		}
		else
		{
			$this->error_code = 0;
			return true;
		}
		return false;
	}

	/**
	 *
	 * @return number
	 */
	function error()
	{
		return $this->error_code;
	}

	/**
	 *
	 * @return string
	 */
	function fileExt($file_name)
	{
		return addslashes(strtolower(substr(strrchr($file_name, '.'), 1, 10)));
	}

	/**
	 *
	 * @param string $ext
	 * @return bool
	 */
	function isImageExt($ext)
	{
		static $img_ext  = array('jpg', 'jpeg', 'png', 'bmp','gif','giff');
		return in_array($ext, $img_ext) ? 1 : 0;
	}

	/**
	 *
	 * @param string $target
	 * @return mixed
	 */
	function getImageInfo($target)
	{
		$ext = Image::fileExt($target);
		$is_image = Image::isImageExt($ext);

		if(!$is_image)
			return false;
		elseif(!is_readable($target))
			return false;
		elseif($image_info = @getimagesize($target))
		{
			
			$file_size = floatval(@filesize($target));
			$file_size = $file_size / 1024;
			if($file_size > $this->max_size)
				return false;
			list($width, $height, $type) = !empty($image_info) ? $image_info : array('', '', '');
			if($is_image && !in_array($type, array(1,2,3,6,13)))
				return false;

			$image_info['type'] = strtolower(substr(image_type_to_extension($image_info[2]),1));
			return $image_info;
		}
		else
			return false;
	}

	/**
	 *
	 * @param string $source
	 * @return bool
	 */
	function isUploadFile($source)
	{
		return $source && ($source != 'none') && (is_uploaded_file($source) || is_uploaded_file(str_replace('\\\\', '\\', $source)));
	}

	/**
	 *
	 * @param string $dir
	 * @return string
	 */
	function getTargetDir($dir)
	{
		if($dir == 'temp')
			$dir = './upload/temp/'.fToDate(NULL,'Y/m/d/H');
		else
			$dir = './upload/'.$dir.'/'.fToDate(NULL,'Y/m/d');

		makeDir(MY_ROOT.$dir);
		return $dir;
	}

	/**
	 *
	 * @param string $source
	 * @param string $target
	 * @return bool
	 */
	private function saveFile($source, $target)
	{
		if(!Image::isUploadFile($source))
			$succeed = false;
		elseif(@copy($source, $target))
			$succeed = true;
		elseif(function_exists('move_uploaded_file') && @move_uploaded_file($source, $target))
			$succeed = true;
		elseif (@is_readable($source) && (@$fp_s = fopen($source, 'rb')) && (@$fp_t = fopen($target, 'wb')))
		{
			while (!feof($fp_s))
			{
				$s = @fread($fp_s, 1024 * 512);
				@fwrite($fp_t, $s);
			}
			fclose($fp_s);
			fclose($fp_t);
			$succeed = true;
		}

		if($succeed)
		{
			$this->error_code = 0;
			@chmod($target, 0644);
			@unlink($source);
		}
		else
		{
			$this->error_code = 0;
		}

		return $succeed;
	}

	public function thumb($image,$maxWidth=200,$maxHeight=50,$gen = 1,$interlace=true,$filepath = '')
    {
        $info  = Image::getImageInfo($image);
		
		
        if($info !== false)
		{
            $srcWidth  = $info[0];
            $srcHeight = $info[1];
			$type = $info['type'];
           
            $interlace  =  $interlace? 1:0;
            unset($info);

			if($maxWidth > 0 && $maxHeight > 0)
				$scale = min($maxWidth/$srcWidth, $maxHeight/$srcHeight); // 计算缩放比例
			elseif($maxWidth == 0)
				$scale = $maxHeight/$srcHeight;
			elseif($maxHeight == 0)
				$scale = $maxWidth/$srcWidth;

            if($scale >= 1)
			{
                //
                $width   =  $srcWidth;
                $height  =  $srcHeight;
            }
			else
			{
                //
                $width  = (int)($srcWidth*$scale);
                $height = (int)($srcHeight*$scale);
            }

			if($gen == 1)
			{
				$width = $maxWidth;
				$height = $maxHeight;
			}

			$paths = pathinfo($image);
			if(empty($filepath))
				$thumbname = str_replace('.'.$paths['extension'],'',$image).'_'.$maxWidth.'x'.$maxHeight.'.jpg';
			else
				$thumbname = $filepath;
			
			$thumburl = str_replace(MY_ROOT,'',$thumbname);

            //
            $createFun = 'imagecreatefrom'.($type=='jpg'?'jpeg':$type);
			if(!function_exists($createFun))
				$createFun = 'imagecreatefromjpeg';

            $srcImg = $createFun($image);

            //
            if($type!='gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height);
            else
                $thumbImg = imagecreatetruecolor($width, $height);



          if(strpos(strtolower($image),".gif")){
			  imagealphablending($thumbImg, false);
			  imagesavealpha($thumbImg, true);
		  }
		  if(strpos(strtolower($image),".png")){
			     $image2=imagecreatefrompng($image);//PNG
		 	     imagesavealpha($image2,true);
				 imagealphablending($thumbImg,false);
				 imagesavealpha($thumbImg,true);
		  }
		  
		  
			$x = 0;
			$y = 0;

			if($gen == 1 && $maxWidth > 0 && $maxHeight > 0)
			{
				$resize_ratio = $maxWidth/$maxHeight;
				$src_ratio = $srcWidth/$srcHeight;
				if($src_ratio >= $resize_ratio)
				{
					$x = ($srcWidth - ($resize_ratio * $srcHeight)) / 2;
					$width = ($height * $srcWidth) / $srcHeight;
				}
				else
				{
					$y = ($srcHeight - ( (1 / $resize_ratio) * $srcWidth)) / 2;
					$height = ($width * $srcHeight) / $srcWidth;
				}
			}

            //
            if(function_exists("imagecopyresampled"))
                imagecopyresampled($thumbImg, $srcImg, 0, 0, $x, $y, $width, $height, $srcWidth,$srcHeight);
            else
                imagecopyresized($thumbImg, $srcImg, 0, 0, $x, $y, $width, $height,  $srcWidth,$srcHeight);
           if(strpos(strtolower($image),".gif")){
				  $bgcolor=imagecolorallocate($thumbImg,0,0,0);
				  $bgcolor=imagecolortransparent($thumbImg,$bgcolor);
				  imagegif($thumbImg,$thumbname);
			
			  }else if(strpos(strtolower($image),".png")){
				  imagepng($thumbImg,$thumbname);
			  }else{ 
				  imageinterlace($thumbImg,$interlace);
				  imagejpeg($thumbImg,$thumbname,100);
			  }
		  
            //
            imagedestroy($thumbImg);
            imagedestroy($srcImg);

			return array('url'=>$thumburl,'path'=>$thumbname);
         }
         return false;
    }

	public function water($source,$water,$alpha=80,$position="0")
    {
        //
        if(!file_exists($source)||!file_exists($water))
            return false;

        //
        $sInfo = Image::getImageInfo($source);
        $wInfo = Image::getImageInfo($water);

        //
        if($sInfo["0"] < $wInfo["0"] || $sInfo['1'] < $wInfo['1'])
            return false;

        //
		$sCreateFun="imagecreatefrom".$sInfo['type'];
		if(!function_exists($sCreateFun))
			$sCreateFun = 'imagecreatefromjpeg';
		$sImage=$sCreateFun($source);

        $wCreateFun="imagecreatefrom".$wInfo['type'];
		if(!function_exists($wCreateFun))
			$wCreateFun = 'imagecreatefromjpeg';
        $wImage=$wCreateFun($water);

        //
        imagealphablending($wImage, true);

        switch (intval($position))
        {
        	case 0: break;
        	//
        	case 1:
        		$posY=0;
		        $posX=0;

		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;

        	case 2:
        		$posY=0;
		        $posX=$sInfo[0]-$wInfo[0];

		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;

        	case 3:
        		$posY=$sInfo[1]-$wInfo[1];
		        $posX=0;

		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;

        	case 4:
		        $posY=$sInfo[1]-$wInfo[1];
		        $posX=$sInfo[0]-$wInfo[0];

		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;

        	case 5:
		        $posY=$sInfo[1]/2-$wInfo[1]/2;
		        $posX=$sInfo[0]/2-$wInfo[0]/2;

		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;
        }


        @unlink($source);

        imagejpeg($sImage,$source,100);
        imagedestroy($sImage);
    }
}

if(!function_exists('image_type_to_extension'))
{
	function image_type_to_extension($imagetype)
	{
		if(empty($imagetype))
			return false;

		switch($imagetype)
		{
			case IMAGETYPE_GIF    : return '.gif';
			case IMAGETYPE_JPEG   : return '.jpeg';
			case IMAGETYPE_PNG    : return '.png';
			case IMAGETYPE_SWF    : return '.swf';
			case IMAGETYPE_PSD    : return '.psd';
			case IMAGETYPE_BMP    : return '.bmp';
			case IMAGETYPE_TIFF_II : return '.tiff';
			case IMAGETYPE_TIFF_MM : return '.tiff';
			case IMAGETYPE_JPC    : return '.jpc';
			case IMAGETYPE_JP2    : return '.jp2';
			case IMAGETYPE_JPX    : return '.jpf';
			case IMAGETYPE_JB2    : return '.jb2';
			case IMAGETYPE_SWC    : return '.swc';
			case IMAGETYPE_IFF    : return '.aiff';
			case IMAGETYPE_WBMP   : return '.wbmp';
			case IMAGETYPE_XBM    : return '.xbm';
			default               : return false;
		}
	}
}
?>