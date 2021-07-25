<?php

// Error handling

if(isset($_POST["submit"])){
    $file = $_FILES["file"];
    $name = $_FILES["file"]["name"]; // get file name
    $tmp_location = $_FILES["file"]["tmp_name"]; // get temporary the file location
    $size = $_FILES["file"]["size"]; // get the file size
    $error = $_FILES["file"]["error"]; // search for errors
    
    $tmp_extension = explode(".", $name); // splits the $name variable at the . punctuation mark

    $extension = strtolower(end($tmp_extension)); //set the extension to lower cases

    //create an array of allowed extensions

    $isAllowed = array("jpg", "jpeg", "png");

    if(in_array($extension, $isAllowed)){
        if($error === 0){
            // php measures file size in kb
            if($size < 100000){
                $newFileName = uniqid("", true) . " . " . $extension;  // to avoid file override when users submit files with the same name
                $fileDestination = "upload/" . $newFileName;
                move_uploaded_file($tmp_location, $fileDestination);
                header("location: index.php?success=uploadedSuccesfully");
                exit();
            } else{
                echo "sorry your file size is too large!";
                header("location: index.php?error=tooLarge");
                exit();
            }

        }else{
            echo "sorry there was an error try again!";
            header("location: index.php?error=tryAgain");
            exit();
        }

        }else{
        echo "sorry your file type is not accepted!";
        header("location: index.php?error=wrongFileType");
        exit();
    }
}