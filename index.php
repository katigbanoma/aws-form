<?php
  require 'vendor/autoload.php';

  use Aws\Ses\SesClient;
  use Aws\Credentials\Credentials;

  function send_email($recipients, $sender, $body, $subject) {
    $creds = new Credentials(
      'AKIAIA34FTQJLBDY62UQ',
      'rfejiANBvwlcaUu3YsVXSITIl1qbR8dzAYBMxCDG'
    );

    $client = SesClient::factory(array(
      'version'=> 'latest',
      'region' => 'us-east-1',
      'credentials' => array(
        'key' => 'AKIAIA34FTQJLBDY62UQ',
        'secret' => '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'
      )
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

        //checking required request if it's not set
        $sender = $_REQUEST['sender'];
        if(!$sender){
          header('HTTP/ 400 Bad Request');
          echo json_encode(array('message' => 'Sender not included'));
          http_response_code(400);
        }

        $subject = $_REQUEST['subject'];
          if (!$subject) {
            header('HTTP/ 400 Bad Request');
            echo json_encode(array('message' => 'The subject of the message is not included'));
            http_response_code(400);
          }

        $body = $_REQUEST['body'];
          if (!$body) {
            header('HTTP/ 400 Bad Request');
            echo json_encode(array('message' => 'Body of message is not included'));
            http_response_code(400);
          }

        $recepients = $_FILES['recepient'];
        if (!$recepients) {
        header('HTTP/ 400 Bad Request');
        echo json_encode(array('message' => 'Recipient not included'));
        http_response_code(400);
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
           echo "Upload Successful";
        }

        # This segment reads the csv uploaded files
        $file = fopen("email_csv/{$file_name}","r");
        $emails = fgetcsv($file);

        # Sends the emails
        foreach ($emails as $email){
          send_email();
        }
        fclose($file);
 ?>
