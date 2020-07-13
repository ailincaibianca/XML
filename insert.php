<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/layout.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
    </head>
    <body class="bg-warning">
        <div class="form-container col-md-5">
            <form class="formstyle" method = "post" enctype="multipart/form-data">
                        <input class="form-control container-sm" type="text" placeholder='ID' name="id" >
                        <input class="form-control container-sm" type="text" placeholder='Name' name="name" >
                        <input class="form-control-file container-sm" type="file" name="myimage" placeholder="Your Image">
                        <div class="container-sm">
                            <input class="btn btn-primary mb-2 container-sm" type="submit" value="Add new dog to database" name='add'>
                        </div>
            </form>
        </div>
        <?php
        if(isset($_POST['add'])){
            $id = $_POST['id'];
            $item = $_POST['name'];
            $image = $_FILES["myimage"]["name"];
            $uniqueId=true;
            $data=simplexml_load_file('data.xml');
                foreach($data->date as $date){
                    if($date->id==$id){
                       $uniqueId=False;
                       }
                    }

            if(!$item || !$image || !$id){

              echo 'All fields are required!';
            }
            elseif (!$uniqueId) {
                
            echo "<div class=\"alert alert-light alert-dismissible fade show\" role=\"alert\" align=\"center\">
            <p>The ID you filled in is already in use! Please enter another value!</p>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
            </div>";
            }
            else{
                $xml=simplexml_load_file('data.xml');
                $date=$xml->addChild('date');
                $date->addChild('id',$id);
                $date->addChild('name',$item);
                $date->addChild('image',"Images/".$image);
                $date->addChild('edit','edit.php?id='.$id);
                $date->addChild('delete','delete.php?id='.$id);
                $date->addChild('confirm','return confirm("Are you sure you want to delete this item?")');
                $date->addChild('back','index.php');
                file_put_contents('data.xml', $xml->asXML());
                if(move_uploaded_file($_FILES["myimage"]["tmp_name"],'Images/'.$image) or die( "Could not copy file!")){
                 header('location:loggedin.php');   
                }
                else{
                    echo 'Something went wrong!';
                }
            }
        }
         ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
