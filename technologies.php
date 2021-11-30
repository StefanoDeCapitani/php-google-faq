<?php
$tabs = [
    [
        "text" => "Introduzione",
        "tag" => "h2",
        "link" => "http://localhost:8888/php-google-faq/index.php",
        "active" => false,
    ],
    [
        "text" => "Norme sulla privacy",
        "tag" => "h2",
        "link" => "http://localhost:8888/php-google-faq/privacy.php",
        "active" => false,
    ],
    [
        "text" => "Termini di servizio",
        "tag" => "h2",
        "link" => "http://localhost:8888/php-google-faq/terms.php",
        "active" => false,
    ],
    [
        "text" => "Tecnologie",
        "tag" => "h2",
        "link" => "http://localhost:8888/php-google-faq/technologies.php",
        "active" => true,
    ],
    [
        "text" => "Domande frequenti",
        "tag" => "h2",
        "link" => "http://localhost:8888/php-google-faq/faq.php",
        "active" => false,
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Google Faq</title>
</head>
<body>
    <header>
        <img src="https://www.gstatic.com/images/branding/googlelogo/svg/googlelogo_clr_74x24px.svg" alt="">
        <h1>Privacy e termini</h1>
        <nav>
            <ul>
                <?php
                    foreach($tabs as $tab){
                        $tab_name = $tab['text'];
                        $link = $tab['link'];
                        $tag = $tab['tag'];
                        $tab_active_class = $tab['active'] ? "active" : "";

                    echo "<li class='$tab_active_class'><a href='$link'>";
                    echo "<$tag>$tab_name</$tag>";
                    echo "</a></li>";
                    }
                ?>
            </ul>
        </nav>
</header>
</body>
</html>