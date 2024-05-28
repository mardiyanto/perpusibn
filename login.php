<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="tema/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="tema/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="tema/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="tema/assets/css/style.css" rel="stylesheet" />
      <link href="tema/assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="tema/assets/img/logo.png" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
						  <?php if(isset($_GET['salah']) && $_GET['salah'] == 'salah') {
		  echo "
		 <h3 class='panel-title'>
                    Maaf Login Salah !!
                </h3>";
		} else {
		  echo "<h3 class='panel-title'>
                    Masukan Username dan password
                </h3>
		  ";
		}
		?>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="log-member.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="USER" name="user"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit"  class="btn btn-lg btn-success btn-block">Login4</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="tema/assets/plugins/jquery-1.10.2.js"></script>
    <script src="tema/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="tema/assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>