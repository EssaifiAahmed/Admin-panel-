<?php
    include 'Admin/login.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!---BOOTSTRAP 4.3-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./CSS/logincss.css">
    </head>
    <body>
        <div class="col-md-6 mx-auto cardlogin">
          <!-- form card login -->
          <div class="card rounded-0">
              <div class="card-header">
                  <h3 class="mb-0">Login</h3>
              </div>
              <div class="card-body">
                  <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                      <div class="form-group">
                          <label for="uname1">Username</label>
                          <input type="email" class="form-control form-control-lg rounded-0" name="uname1" id="uname1" required="required">
                          <div class="invalid-feedback">Oops, you missed this one.</div>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control form-control-lg rounded-0" name="password" id="pwd1" required="required">
                          <div class="invalid-feedback">Enter your password too!</div>
                      </div>
                      <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                  </form>
              </div>
              <!--/card-block-->
          </div>
          <!-- /form card login -->
      </div>
    </body>
</html>