<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <div>
            <label for="baseKey">base number</label>
            <input type="number" name="baseKey" id="baseKey">
    
            <label for="resultKey">multiplier</label>
            <input type="number" name="resultKey" id="resultKey">
        </div>
        
        <div>
            <label for="nextKey">next base number</label>
            <input type="number" name="nextKey" id="nextKey">

            <?php
                // Cross multiplication
                if(isset($_GET['baseKey']) && isset($_GET['resultKey']) && isset($_GET['nextKey'])) {
                    $baseKey = $_GET['baseKey'];
                    $resultKey = $_GET['resultKey'];
                    $nextKey = $_GET['nextKey'];

                    $crossMultiplication = ($nextKey * $resultKey) / $baseKey;
                    echo "next base number: " . $crossMultiplication;
                }
            ?>
        </div>

        <div>
            <input type="submit" value="submi">
        </div>
    </form>
</body>
</html>