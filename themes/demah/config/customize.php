<?php

/**
 * @var \Juzaweb\Support\Theme\Customize $customize
 */

use Juzaweb\Support\Theme\CustomizeControl;

$customize->addPanel('header', [
    'title' => 'Theme Option',
    'priority' => 1,
]);

$customize->addSection('socials', [
    'title' =>'Socials',
    'priority' => 10,
    'panel' => 'header',
]);

$customize->addControl(new CustomizeControl($customize, 'facebook', [
    'label' =>'Facebook',
    'section' => 'socials',
    'settings' => 'facebook',
    'type' => 'text',
]));

$customize->addControl(new CustomizeControl($customize, 'twitter', [
    'label' =>'Twitter',
    'section' => 'socials',
    'settings' => 'twitter',
    'type' => 'text',
]));

$customize->addControl(new CustomizeControl($customize, 'instagram', [
    'label' =>'Instagram',
    'section' => 'socials',
    'settings' => 'instagram',
    'type' => 'text',
]));

$customize->addControl(new CustomizeControl($customize, 'snapchat', [
    'label' =>'snapchat',
    'section' => 'socials',
    'settings' => 'snapchat',
    'type' => 'text',
]));


$customize->addControl(new CustomizeControl($customize, 'whatsapp', [
    'label' =>'Whatsapp',
    'section' => 'socials',
    'settings' => 'whatsapp',
    'type' => 'text',
]));

$customize->addControl(new CustomizeControl($customize, 'email', [
    'label' =>'Email',
    'section' => 'socials',
    'settings' => 'email',
    'type' => 'text',
]));



