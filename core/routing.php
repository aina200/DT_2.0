<?php

$pages = [
    'nav-bar' => './controllers/nav-bar_controller.php',
    'homepage' => './controllers/homepage_controller.php',
    'about' => './controllers/about_controller.php',
    'services' => './controllers/services_controller.php',
    'partenaires' => './controllers/partenaires_controller.php',
    // 'team' => './controllers/team_controller.php',
    'contact' => './controllers/contact_controller.php',
    'footer' => './controllers/footer_controller.php',
    'mentions' => './controllers/mentions_legales_controller.php',
];

$page = $pages['homepage'];

if (isset($_GET['page']) && in_array($_GET['page'], array_keys($pages))) {
    $page = $pages[$_GET['page']];
}
