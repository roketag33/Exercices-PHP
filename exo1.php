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
        <label for="user">developer single (minutes)</label>
        <input type="number" name="user" id="user">

        <label for="peer">developer peer (minutes)</label>
        <input type="number" name="peer" id="peer">

        <input type="submit" value="submit">
    </form>
    <?php
        if(isset($_GET['user']) && isset($_GET['peer'])) {
            // Calculing peer programming
            $user = $_GET['user'];
            $peer = $_GET['peer'];

            $peerTime = (($peer * 2) - $user) / $user;
            $peerTimePercent = $peerTime * 100;

            echo "Peer programming time: " . $peerTimePercent . "%";
        }
        
    ?>
</body>
</html>