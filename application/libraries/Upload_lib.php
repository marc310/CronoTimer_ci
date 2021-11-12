<?php
/**
 * Name:    CodeX Upload Library
 * Author:  Marcelo Motta
 *          marcelomotta.dev@gmail.com
 *
 *
 * Created:  17.01.2020
 *
 * Description:  This helps controller to upload with some extra functions
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-CodeX-Upload
 * @author     Marcelo Motta
 * @link       Private Repository: marcelomotta.com
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

define('RENAME_F', 1); 

/**
 * Class Upload Library
 */
class Upload_lib
{
    /**
     * __construct
     *
     * @author Marcelo Motta
     */
	public function __construct()
	{
        
    }
    
    public function sendFile()
    {
        $upload_dir = array( 
            'img' => 'editor/', 
        );
        
        $config_url = 'uploads/';
        
        $imgset = array( 
            // 'maxsize' => 2000, 
            // 'maxwidth' => 1024, 
            // 'maxheight' => 800, 
            'minwidth' => 10, 
            'minheight' => 10, 
            'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'), 
        ); 
        
        $re = ''; 
        if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) { 
        
            define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));   
        
            // Get filename without extension 
            
            $site = site_url($config_url);
            // $site = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'].'/';
            $sepext = explode('.', strtolower($_FILES['upload']['name'])); 
            $type = end($sepext);    /** gets extension **/ 
            $arquivo = $_FILES['upload']['name'];
            
            // Upload directory 
            $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio']; 
            $upload_dir = trim($upload_dir, '/') .'/'; 
        
            // Validate file type 
            if(in_array($type, $imgset['type'])){ 
                // Image width and height 
                // list($width, $height) = getimagesize($_FILES['upload']['tmp_name']); 
        
                // if(isset($width) && isset($height)) { 
                //     if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']){ 
                //         $re .= '\\n Width x Height = '. $width .' x '. $height .' \\n The maximum Width x Height must be: '. $imgset['maxwidth']. ' x '. $imgset['maxheight']; 
                //     } 
        
                //     if($width < $imgset['minwidth'] || $height < $imgset['minheight']){ 
                //         $re .= '\\n Width x Height = '. $width .' x '. $height .'\\n The minimum Width x Height must be: '. $imgset['minwidth']. ' x '. $imgset['minheight']; 
                //     } 
        
                //     if($_FILES['upload']['size'] > $imgset['maxsize']*1000){ 
                //         $re .= '\\n Maximum file size must be: '. $imgset['maxsize']. ' KB.'; 
                //     } 
                // } 
            }else{ 
                $re .= 'The file: '. $_FILES['upload']['name']. ' has not the allowed extension type.'; 
            } 
            
            // File upload path 
            // $f_name = $this->setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0); 
            $f_name = $this->setFName(site_url('uploads/' . $upload_dir), F_NAME, ".$type", 0); 
            $uploadpath = $config_url . $upload_dir . $f_name; 

            // If no errors, upload the image, else, output the errors 
            if($re == ''){ 
                if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) { 
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum']; 
                    $filename = compress_image($arquivo, "uploads/editor" . $f_name, 80);
                    $url = $site . $upload_dir . $f_name; 
                    $msg = F_NAME .'.'. $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB'; 
                    $re = in_array($type, $imgset['type']) ? "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>":'<script>var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\' \', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();dialog.hide();</script>'; 
                }else{ 
                    $re = '<script>alert("Unable to upload the file")</script>'; 
                } 
            }else{ 
                $re = '<script>alert("'. $re .'")</script>'; 
            } 
        } 
        
        // Render HTML output 
        @header('Content-type: text/html; charset=utf-8'); 
        echo $re;
    }

    /** 
     * Set filename 
     * If the file exists, and RENAME_F is 1, set "img_name_1" 
     * 
     * $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename 
     */ 
    public function setFName($p, $fn, $ex, $i){ 
        if(RENAME_F ==1 && file_exists($p .$fn .$ex)){ 
            return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1)); 
        }else{ 
            return $fn .$ex; 
        } 
    }
    
    
    /**
    * Manage uploadImage
    *
    * @return Response
    */
    // public function resizeImage($filename)
    // {
    //   $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;
    //   $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
    //   $config_manip = array(
    //       'image_library' => 'gd2',
    //       'source_image' => $source_path,
    //       'new_image' => $target_path,
    //       'maintain_ratio' => TRUE,
    //       'width' => 500,
    //   );
   
    //   $this->load->library('image_lib', $config_manip);
    //   if (!$this->image_lib->resize()) {
    //       echo $this->image_lib->display_errors();
    //   }
   
    //   $this->image_lib->clear();
    // }


}