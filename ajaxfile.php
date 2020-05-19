<?php

$type = $_GET['type'];
$CKEditor = $_GET['CKEditor'];
$funcNum  = $_GET['CKEditorFuncNum'];


if($type == 'image'){

    $allowed_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

    if(in_array(strtolower($file_extension),$allowed_extension)){

        if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name'])){

            if(isset($_SERVER['HTTPS'])){
                $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
            }
            else{
                $protocol = 'http';
            }
            $url = $protocol."://".$_SERVER['SERVER_NAME'] ."/ckeditor_fileupload/uploads/".$_FILES['upload']['name'];

            echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
        }

    }

    exit;
}

if($type == 'file'){

    $allowed_extension = array(
        "doc",
        "pdf",
        "docx"
    );

    $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

    if(in_array(strtolower($file_extension),$allowed_extension)){

        if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name'])){
            if(isset($_SERVER['HTTPS'])){
                $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
            }
            else{
                $protocol = 'http';
            }

            $url = $protocol."://".$_SERVER['SERVER_NAME'] ."/ckeditor_fileupload/uploads/".$_FILES['upload']['name'];

            echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
        }

    }

    exit;
}
