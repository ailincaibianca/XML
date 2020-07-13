<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/layout.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
    </head>
    <body class="bg-warning">
        <div class="form-container col-md-5">
            <form method = "post" enctype="multipart/form-data">
                        <input class="form-control container-sm" type="text" placeholder='Username' name="username" >
                        <input class="form-control container-sm" type="password" placeholder='Password' name="password" >
                        <div class="container-sm">
                            <input class="btn btn-primary mb-2 container-sm" type="submit" value="Log in" name='login'>
                        </div>
            </form>
        </div>
        <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $foundUser=false;
            $passwordOK=false;
            $data=simplexml_load_file('users.xml');
                foreach($data->user as $date){
                    if($date->username==$username){
                       $foundUser=true;
                       if($date->password==$password){
                           $passwordOK=true;
                       }
                    }
                }

            if(!$username || !$password){

              echo 'All fields are required!';
            }
            elseif (!$foundUser) {
                
            echo "<div class=\"alert alert-light alert-dismissible fade show\" role=\"alert\" align=\"center\">
            <p>There is no such user in our database! Perhaps you wanted to <a href=\"register.php\">register</a>?</p>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
            </div>";
            }
            elseif(!$passwordOK){
                echo "<div class=\"alert alert-light alert-dismissible fade show\" role=\"alert\" align=\"center\">
                    <p>Incorrect password!</p>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                    </div>";
            }
            else{
                echo "<div class=\"bg-warning\" style=\"position:fixed; padding:0; margin:0; top:0; left:0; width: 100%; height: 100%\" align=\"center\">
                    <p>Welcome, ".$username."!</p>
                    <p>Go back to our <a href=\"loggedin.php\">main page</a>, and make changes to the database!</p>
                    </div>";
            }
        }
         ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
