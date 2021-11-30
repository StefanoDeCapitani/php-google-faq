<?php
$tabs = [
    [
        "text" => "Introduzione",
        "tag" => "h2",
        "attributes" => [
            "href" => "http://localhost:8888/php-google-faq/index.php", 
            "class" => "a nav__link"
        ]
    ],
    [
        "text" => "Norme sulla privacy",
        "tag" => "h2",
        "attributes" => [
            "href" => "http://localhost:8888/php-google-faq/privacy.php", 
            "class" => "a nav__link active"
            ]
    ],
    [
        "text" => "Termini di servizio",
        "tag" => "h2",
        "attributes" => [
            "href" => "http://localhost:8888/php-google-faq/terms.php", 
            "class" => "a nav__link"
            ]
    ],
    [
        "text" => "Tecnologie",
        "tag" => "h2",
        "attributes" => [
            "href" => "http://localhost:8888/php-google-faq/technologies.php", 
            "class" => "a nav__link"
            ]
    ],
    [
        "text" => "Domande frequenti",
        "tag" => "h2",
        "attributes" => [
            "href" => "http://localhost:8888/php-google-faq/faq.php", 
            "class" => "a nav__link"
            ]
    ],
];

function getDeepContent($elem){
    $text = $elem["text"];
    $tag = $elem["tag"];
    $attributes = $elem["attributes"];
    $children = $elem["children"];
    $content = "";

    $content .= "<$tag " . getHTMLAttributes($attributes) . ">"; 

    if(count($children) === 0) {
        $content .= $text;
    } else {
        $content .= substitutePlaceholdersWithChildrensContent($text, "#", $children);
    }
    $content .= "</$tag>";
    return $content;
}

function getHTMLAttributes($attributes){
    $HTML = "";
    if($attributes){
        foreach($attributes as $attr => $value){
            $HTML .= "$attr='$value'";
        }
    }
    return $HTML;
}

function substitutePlaceholdersWithChildrensContent($text, $placeholder, $children){
    $substrings = explode($placeholder, $text);
    $content = "";

    foreach($children as $id => $child){
        $content .= $substrings[$id];
        $content .= getDeepContent($child);
    } 
    if(count($children) < count($substrings)){
        $content .= end($substrings);
    }

    return $content;
}
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
<header class="header">
    <div class="header__heading">
        <img class="header__logo" src="https://www.gstatic.com/images/branding/googlelogo/svg/googlelogo_clr_74x24px.svg" alt="Google logo">
        <h1 class="header__title">Privacy e termini</h1>
    </div>
    <nav class="nav">
        <ul class="nav__ul">
            <?php
                foreach($tabs as $tab){
                    $tab_name = $tab['text'];
                    $tag = $tab['tag'];
                    $attributes = $tab['attributes'];

                echo "<li class='nav__list-item'><a " . getHTMLAttributes($attributes) . ">";
                echo "<$tag class='nav__tab-title'>$tab_name</$tag>";
                echo "</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>
<main>
    <div class="container">
        <h3>Fai click su "Domande frequenti" per vedere la pagina delle faq</h3>
    </div>
</main>
</body>
</html>