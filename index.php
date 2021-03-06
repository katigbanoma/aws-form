<?php
  require 'vendor/autoload.php';

  use Aws\Ses\SesClient;
  use Aws\Credentials\Credentials;

  function getConfigs($filename){
    $str = file_get_contents($filename);
    $nu = json_decode($str);

    return $nu;
  }

  function createCredentials($nu){
    $creds = new Credentials(
      $nu->key,
      $nu->secret
    );

    return $creds;
  }

  function send_email($recipient, $sender, $body, $subject) {
    $nu=getConfigs("./key.json");
    $creds=createCredentials($nu);

    $client = SesClient::factory(array(
      'version'=> 'latest',
      'region' => 'us-east-1',
      'credentials' => $creds
    ));

    $request = array();
    $request['Source'] = $sender;
    $request['Destination']['ToAddresses'] = $recipient;
    $request['Message']['Subject']['Data'] = $subject;
    $request['Message']['Body']['Text']['Data'] = $body;

    try {
       $result = $client->sendEmail($request);
       $messageId = $result->get('MessageId');
       echo("Email sent! Message ID: $messageId"."\n");

     } catch (Exception $e) {
       echo("The email was not sent. Error message: ");
       echo($e->getMessage()."\n");
     }
  }

       // return 405 if request method is GET
       if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         header('HTTP/ 405 Method not allowed');
         echo json_encode(array('message' => 'Method not allowed'));
         http_response_code(405);
         die();
       }

        //checking required request if it's not set
        $sender = $_REQUEST['sender'];
        if(!$sender){
          header('HTTP/ 400 Bad Request');
          echo json_encode(array('message' => 'Sender not included'));
          http_response_code(400);
          die();
        }

        $subject = $_REQUEST['subject'];
          if (!$subject) {
            header('HTTP/ 400 Bad Request');
            echo json_encode(array('message' => 'The subject of the message is not included'));
            http_response_code(400);
            die();
          }

        $body = $_REQUEST['body'];
          if (!$body) {
            header('HTTP/ 400 Bad Request');
            echo json_encode(array('message' => 'Body of message is not included'));
            http_response_code(400);
            die();
          }

        $recepients = $_FILES['recepient'];
        if (!$recepients) {
          header('HTTP/ 400 Bad Request');
          echo json_encode(array('message' => 'Recipient not included'));
          http_response_code(400);
          die();
        }

        $errors = array();
        $file_name = $_FILES['recepient']['name'];
        $file_size = $_FILES['recepient']['size'];
        $file_tmp = $_FILES['recepient']['tmp_name'];
        $file_type = $_FILES['recepient']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['recepient']['name'])));

        $extentions = array("csv");

        if(in_array($file_ext,$extentions) === false){
           $errors[]="extension not allowed, please choose a csv file.";
        }

        if($file_size > 2097152){
           $errors[]='File size must not be more than exactly 2 MB';
        }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"email_csv/".$file_name);
        }

        # This segment reads the csv uploaded files
        $file = fopen("email_csv/{$file_name}","r");
        $emails = fgetcsv($file);

        try {
          send_email($emails, $sender, $subject, $body);
        } catch(Exception $e) {
          var_dump($e);
          die();
        }

        fclose($file);
 ?>
