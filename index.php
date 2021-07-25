<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<section>
    <h1>Upload file</h1>

    <?php

    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">  <!--enctype specifies how the data should be encoded-->
    <input type="file" name="file">
    <input type="submit" value="upload" name="submit">   
    </form>

    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] === "wrongFileType"){
                echo "<h3 class='center_align_error'>Sorry your file type is not accepted!</h3>";
            }

            else if($_GET["error"] === "tryAgain"){
                echo "<h3 class='center_align_error'>sorry there was an error try again!</h3>";
            }
        }

        if(isset($_GET["success"])){
            if($_GET["success"] === "uploadedSuccesfully"){
                echo "<h3 class='center_align_success'>Your file has been succesfully uploaded!</h3>";
            }
        }
    ?>

    </section>

</body>
</html>