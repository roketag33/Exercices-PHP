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
        <label for="dices">Number of dices</label>
        <input type="number" name="dices" id="dices" require step="1">

        <div>
            <input type="submit" value="submit">
        </div>
    </form>

    <?php
        if(isset($_GET['dices'])) {
            $dices = $_GET['dices'];

            for ($i=0; $i < $dices; $i++) { 
                $dice = rand(1, 6);
                echo $dice . " ";
            }
        }
    ?>
</body>
</html>