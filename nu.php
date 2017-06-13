<form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="email_csv" />
         <input type="submit"/>
      </form>
<?php
/*require 'vendor/autoload.php';

use Aws\Credentials\Credentials;
use Aws\Ses\SesClient;


$testCreds = new Credentials(
  'AKIAIA34FTQJLBDY62UQ',
  'rfejiANBvwlcaUu3YsVXSITIl1qbR8dzAYBMxCDG'
);

$pass = SesClient::generateSmtpPassword($testCreds);
var_dump($pass);


// Get the current response code and set a new one
var_dump(http_response_code(404));

// Get the new response code
var_dump(http_response_code());
*/
//header("location:http_response_code(400)");
// $sender = $_REQUEST['sender'];
// if(!$sender){
//   header("location:http_response_code(400)");
// }
/*header('HTTP/ 400 Bad Request');
echo json_encode(array('message'=>'Sender Missing'));
http_response_code(400);
*/

/*$file = fopen('email.csv', 'r');
print_r(fgetcsv($file));
fclose($file);*/



/*if(isset($_FILES['email_csv'])){
      $errors= array();
      $file_name = $_FILES['email_csv']['name'];
      $file_size =$_FILES['email_csv']['size'];
      $file_tmp =$_FILES['email_csv']['tmp_name'];
      $file_type=$_FILES['email_csv']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['email_csv']['name'])));

      $extentions= array("csv");

      if(in_array($file_ext,$extentions) === false){
         $errors[]="extension not allowed, please choose a csv file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must not be more than exactly 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"email_csv/".$file_name);
         echo "Upload Successful";
      }else{
         print_r($errors);
      }
   }
   */


   $file = fopen("email_csv/email.csv","r");
   $filee = fgetcsv($file);
   foreach ($filee as $res){
     #$sendee = $res;
     echo "$res<br>";
   }
   #echo $res[1];
   #echo $sendee;
   #print_r(fgetcsv($file));
   fclose($file);
?>
