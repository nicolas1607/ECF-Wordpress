<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image" href="/img/favicon-32x32.png">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="main-header">
        <div class="container">
            <?php $choice = get_field('general_choice', 'option');
            $title = get_field('general_title', 'option');
            $logo = get_field('general_logo', 'option'); ?>
            <?php if ($choice == "2" && $logo) { ?>
                <div class="logo"><?php echo $logo ?></div>
            <?php } elseif ($choice == "1" && $title) { ?>
                <div class="logo"><?php echo $title ?></div>
            <?php } else { ?>
                <div class="logo"><?php bloginfo('name'); ?></div>
            <?php } ?>
            <?php wp_nav_menu(array(
                'theme_location'    => 'main',
                'container'         => 'nav',
                'container_class'   => 'main-nav',
                'menu_id'           => 'main-menu',
                'fallback_cb'       => false,
                'depth'             => 1
            )); ?>
            <?php get_search_form(); ?>
        </div>
    </header>
    <main class="main-content">