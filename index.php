<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <title>A-W-S</title>
  </head>
  <body>
    <div style="margin:10px auto; border:1px solid #ccc; width:400px; text-align:center;">
      <form method="post" action="index.php">
        <p>Receipient Email:</p>
        <p><input type="text" name="receiver" placeholder="Receiver email:"></p>

        <p>Subject:</p>
        <p><input type="text"  name="subject"  placeholder="Subject of email:"></p>

        <p>Mail Body:</p>
        <textarea  name="body" rows="6" cols="50"></textarea>
        <p><button type="submit" name="sub" class="btn btn-default">Submit</button></p>
      </form>
    </div>
            <?php
            if($_REQUEST['receiver'] && $_REQUEST['subject'] && $_REQUEST['body'] && $_REQUEST['sub']){
            $to = $_REQUEST['receiver'];
            $subject = $_REQUEST['subject'];
            $txt = $_REQUEST['body'];
            $headers = "From: tech@tm30.net" . "\r\n" . "CC: tofunmi@tm30.net";
            mail('$to','$subject','$txt','$headers');
          }
            ?>
  </body>
</html>
