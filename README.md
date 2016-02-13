# codeigniter-multi-upload
creating multi upload file using library on codeigniter

This is a tutorial for multi uploading file on codeigniter version 3.x

## Please prepare the following files :
  - Download **Codeigniter version 3.0.3 or higher** [here](http://www.codeigniter.com/download)
  - Download **Library MY_Upload** [here](https://drive.google.com/file/d/0BxScoYVh5qjSU0pLdWliZzQwbDQ/view?usp=sharing)

## Please follow this instructions :
- Don't forget to set in autoload.php "form" and "url" helper.
```sh
$this->load->helper(array('form', 'url'));
```
- Copy **MY_Upload.php** library to **application/libraries** folder
- Create uploads folder in root codeigniter
- Copy following script to the controller folder and save with name **upload.php** :
```sh
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

 public function __construct()
  {
      parent::__construct();
      $this->load->helper(array('form', 'url'));
  }

 public function index()
 {
    $this->load->view('upload_form_multi_2');
 }
 
 function do_upload_multi()
 {        
    $this->load->library('upload');

    //Configure upload.
    $this->upload->initialize(array(
        "allowed_types" => "gif|jpg|png|jpeg",
        "upload_path"   => "./uploads/"
    ));
      
    //Perform upload.
    if($this->upload->do_upload("images")) {
        $uploaded = $this->upload->data();
        echo '<pre>';
        var_export($uploaded);
        echo '</pre>';
    }
    else{
        die('UPLOAD FAILED');
    } 
 }
}
```
- Create **upload_form_multi_2.php**, save to views folder
```sh 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<HTML>
<head>
<title>Welcome to CodeIgniter 3.X | Multiple Upload File</title>
</head>
<body>

<?php echo form_open_multipart('upload/do_upload_multi_2');?>

<h2>For Multiple Upload Codeigniter 3.X</h2>
<div style="border: 1px dotted #000;margin:10px 0;padding:10px;">
<input type="file" name="images[]" />
<input type="file" name="images[]"/>
<input type="file" name="images[]"/>
</div>

<br /><br />

<input type="submit" value="upload" name="upload" />

</form>

</body>
</HTML>
```
- please upload some pictures, if successful images will be uploaded in the folder uploads 
  

