<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <title>A-W-S</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-lg-3">
      <form method="post" action="same.php">
        <div class="form-group has-feedback">
          <label  for="inputGroupSuccess1">Receipient Email:</label>
            <div class="input-group">
              <span class="input-group-addon">@</span>
                <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
                  </div>
                    <!-- <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
                      <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
                        </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Subject:</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subject of email:">
                        </div>
                              <label class="control-label" for="inputGroupSuccess1">Mail Body:</label>
                                <textarea class="form-control" rows="3"></textarea>
                                  <button type="submit" class="btn btn-default" style="margin-top:4px;">Submit</button>
                                    </form>
                                      </div>
    <!--
    <div class="form-group">
      <label for="exampleInputPassword1">Sender's Mail</label>
      <span class="input-group-addon">@</span>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Sender's Mail">
    </div>
    <textarea class="form-control" rows="3"></textarea>
    <button type="submit" class="btn btn-default">Submit</button>
</form>-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
