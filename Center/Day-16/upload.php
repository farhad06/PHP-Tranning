<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container" style='margin-top:15px'>
        <?php
        // print("<pre>");
        // print_r($_FILES);
        $imageName = $_FILES['image']['name'];
        $imageType = $_FILES['image']['type'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        //if folder not exist in my current directory then it create a new folder using this name.
        //if (!image_exists('Images')) mkdir('Images');
        if ($imageName == '') {
            echo " ";
        } else {
            if ($imageType == 'image/png' || $imageType == 'image/jpg' || $imageType == 'image/jpeg' || $imageType == 'image/gif') {
                if ($imageSize <= 500000) {
                    move_uploaded_file($imageTemp, 'assects/' . $imageName);
                    //echo"<script>alert('Image Uploaded');</script>";
                    echo "<h4 class='alert alert-primary' role=alert'>Image Uploaded Successfully!</h4>";
                } else {
                    echo "<h4 class='alert alert-danger' role=alert'>Upload Image Under 500KB!</h4>";
                }
            } else {
                echo "<h4 class='alert alert-danger' role=alert'>Only JPEG/JPG/PNG/GIF Images Supported!</h4>";
            }
        }

        //code for upload pdf
        $pdfName = $_FILES['pdf']['name'];
        $pdfType = $_FILES['pdf']['type'];
        $pdfTemp = $_FILES['pdf']['tmp_name'];
        $pdfSize = $_FILES['pdf']['size'];
        if ($pdfName == '') {
            echo " ";
        } else {
            if ($pdfType == 'application/pdf') {
                if ($pdfSize <= 1000000) {
                    move_uploaded_file($pdfTemp, 'assects/' . $pdfName);
                    echo "<h4 class='alert alert-primary' role=alert'>PDF Uploaded Successfully!</h4>";
                } else {
                    echo "<h4 class='alert alert-danger' role=alert'>PDF Should be 1MB!</h4>";
                }
            } else {
                echo "<h4 class='alert alert-danger' role=alert'>Uploaded file should be (.pdf) extension.</h4>";
            }
        }
    ?>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-info" href="file-upload-home-task.php">Back</a>
            </div>
        </div>
    </div>
</body>

</html>