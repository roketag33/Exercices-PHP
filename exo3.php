<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- send file -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="file">file</label>
            <input type="file" name="file" id="file">
        </div>

        <div>
            <input type="submit" value="submi">
        </div>
    </form>


    <div>
        <?php
            // Get the file
            if(isset($_POST['email']) && isset($_FILES['file'])) {
                $email = $_POST['email'];
                $file = $_FILES['file'];

                echo "email: " . $email . "<br>";
                var_dump($file);
                echo "file: " . $file['name'] . "<br>";
                echo "error: " . $file['error'] . "<br>";
                echo "temp name: " . $file['tmp_name'] . "<br>";

                $uploads_dir = '/uploads';

                // Download the file
                move_uploaded_file($file['tmp_name'], '/uploads' . $file['name']);

            }
        ?>
    </div>
</body>
</html>