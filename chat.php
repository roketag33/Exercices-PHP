<?php
session_start();
define('FILE', "messages.txt");

if(isset($_SESSION['user'])){
    if (isset($_POST['pseudo']) && $_POST['pseudo'] != '' && isset($_POST['message'])) {

        $pseudo = htmlentities($_POST['pseudo']);
        $message = htmlentities($_POST['message']);
        addMessage($pseudo, $message);
    }

}else{
    if(isset($_POST['pseudo']) && $_POST['pseudo'] != '' && isset($_POST['email'])){

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['user'] = htmlentities($_POST['pseudo']);
            //setcookie('user', htmlentities($_POST['pseudo']));
        } else {
            // nada
        }
    }
}

function getMessages()
{
    $messages = file_get_contents(FILE, true);
    return $messages;
}

function addMessage($pseudo, $content)
{
    $message  = "<div>";
    $message .= "<span>" . $pseudo . " : </span>";
    $message .= $content;
    $message .= "</div>\r\n";

    $fichier = fopen(FILE, 'a');
    fwrite($fichier, $message);
    fclose($fichier);
}


?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon chat</title>
    <meta name="description" content="mon chat">
    <style>
        body {
            background-color: #eee;
        }

        #content {
            background-color: #fff;
            width: 768px;
            margin: auto;
        }

        #content > * {
            padding: 15px;
        }

        h1 {
            text-transform: uppercase;
            color: midnightblue;
        }

        #pseudo, #chat {
            display: block;
            margin-bottom: 10px;
        }

        #chat {
            margin: 15px 0;
        }

        #chat > div {
            margin-bottom: 5px;
            padding-bottom: 5px;
            border-bottom: 1px dashed #999999;
        }

        #chat > div > span {
            font-weight: bold;
            color: midnightblue;
        }

        @media (max-width: 768px) {
            #content {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<form method="post">
    <input name="pseudo" type="text" placeholder="Pseudo" value="Alexandre" size="10">
    <input name="email" type="email" placeholder="Email" value="aclain@cesi.fr" size="10">
    <button type="submit">Se connecter</button>
</form>
<?php
if(isset($_SESSION['user'])){
?>
<div id="content">
    <h1>Mon chat</h1>
    <form method="post">
        <input name="pseudo" type="hidden" placeholder="Pseudo" value="<?= $_SESSION['user'] ?>" size="10">
        <input name="message" type="text" placeholder="Message" value="mon message trop bien !! <?= time() ?>" size="50">
        <button type="submit">Envoyer</button>
    </form>
    <div id="chat">
        <?= getMessages() ?>
    </div>
</div>
<?php
}
?>
</body>
</html>