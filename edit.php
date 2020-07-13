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
                            <input class="form-control container-sm" type="text" placeholder='Name' name="name" size="20">
                            <input class="form-control-file container-sm" type="file" name="myimage" placeholder="Your Image">
                            <div class="container-sm">
                                <input class="btn btn-primary mb-2 container-sm" type="submit" value="Submit changes" name='update'>
                            </div>
                </form>
           </div>
        <?php
        if(isset($_POST['update'])){
            $id=$_GET['id'];
            $dog = $_POST['name'];
            $image = $_FILES["myimage"]["name"];

            if(!$dog || !$image){

              echo 'All fields are required!';
            }
            else{
                $data=simplexml_load_file('data.xml');
                foreach($data->date as $date){
                    if($date->id==$id){
                       $date->name=$dog;
                       $date->image="Images/".$image;
                       }
                    }
                $handle=fopen("data.xml","wb");
                fwrite($handle,$data->asXML());
                fclose($handle);
                if(move_uploaded_file($_FILES["myimage"]["tmp_name"],'Images/'.$image) or die( "Could not copy file!")){
                    header('location:loggedin.php');
                }
                else{
                    echo 'Something went wrong!';
                }
                 
            }
        }
         ?>
    </body>
</html>