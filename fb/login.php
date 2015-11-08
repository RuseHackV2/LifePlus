<?php

require_once './vendor/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '750598631739997',
    'app_secret' => '53f13e568f3cf0d485538cf579438884',
//        'cookie'=>true,

    'default_graph_version' => 'v2.4',
        ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/Programming/life+/website/fb/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
