<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
</head>
<body class="bg-white text-black text-body-base">
    <div id="site">
        <a 
            class="sr-only bg-white box-border text-black focus:p-2 focus:not-sr-only focus:absolute focus:left-4 focus:top-4 <?php if ( is_admin_bar_showing() ) echo 'top-[46px] min-[783px]:!top-8' ?>" 
            href="#content"
        >
            Skip to content
        </a>
        <header class="absolute top-0 w-full h-16 flex justify-center px-6 text-white <?php if ( is_admin_bar_showing() ) echo 'top-[46px] min-[783px]:!top-8' ?> ">
            <div class="max-w-7xl w-full flex justify-between items-center">
                <a href="/" aria-label="Home">
                    <?php
                        // logo
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                        if ( has_custom_logo() ) {
                            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="h-6" >';
                        } else {
                            echo '<span class="font-bold" >' . strtoupper(get_bloginfo( 'name' )) . '</span>';
                        }
                    ?>
                </a>
                <nav
                    aria-label="Primary navigation"
                    role="navigation"
                    class="h-full flex items-center"
                >
                    <button
                        class="aspect-square w-9 md:hidden"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="primary navigation"
                        type="button"
                        data-hamburger-open
                    >
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 27H30C30.825 27 31.5 26.325 31.5 25.5C31.5 24.675 30.825 24 30 24H6C5.175 24 4.5 24.675 4.5 25.5C4.5 26.325 5.175 27 6 27ZM6 19.5H30C30.825 19.5 31.5 18.825 31.5 18C31.5 17.175 30.825 16.5 30 16.5H6C5.175 16.5 4.5 17.175 4.5 18C4.5 18.825 5.175 19.5 6 19.5ZM4.5 10.5C4.5 11.325 5.175 12 6 12H30C30.825 12 31.5 11.325 31.5 10.5C31.5 9.675 30.825 9 30 9H6C5.175 9 4.5 9.675 4.5 10.5Z"
                                fill="#FBFCFD" />
                        </svg>
                    </button>

                    <div data-hamburger-menu class="hidden duration-700 absolute z-50 top-0 left-0 min-h-screen w-full bg-white transition-transform translate-x-full md:!translate-x-0 md:bg-transparent md:static md:h-full md:min-h-0 md:block">
                        <div class="relative md:h-full">
                            <div class="absolute top-0 left-0 w-full flex justify-between items-center px-6 h-16 md:hidden">
                                <a href="/" aria-label="Home">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/amplify-logo-black-active.png" alt="Amplify">
                                </a>

                                <button
                                    class="aspect-square w-9"
                                    aria-label="Close navigation"
                                    aria-expanded="true"
                                    aria-controls="primary navigation"
                                    type="button"
                                    data-hamburger-close
                                >
                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.1359 25.864L17.9999 18M25.8639 10.136L17.9999 18M17.9999 18L10.1359 10.136M17.9999 18L25.8639 25.864"
                                            stroke="#283442" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>    

                            <ul class="h-screen w-full text-black flex flex-col px-6 gap-12 justify-center items-center md:h-full md:static md:gap-9 md:items-center md:text-white md:flex-row md:px-0">

                                <?php
                                    $themeLocations = get_nav_menu_locations();

                                    $globalMenuObj = get_term( $themeLocations['global'], 'nav_menu' );
                                    $buttonsMenuObj = get_term( $themeLocations['global-buttons'], 'nav_menu' );

                                    $navItems = wp_get_nav_menu_items( $globalMenuObj->name );
                                    $navButtons = wp_get_nav_menu_items( $buttonsMenuObj->name ); 

                                    if (empty($navItems)) {
                                        echo '<li><a href="/wp-admin/nav-menus.php">Assign a menu</a></li>';
                                    } else {
                                ?>

                                <div class="flex-col py-12 flex gap-9 max-w-xs w-full md:gap-6 md:h-full border-l-2 border-black md:border-none md:flex-row md:py-0 md:max-w-full">
                                    <?php foreach ($navItems as $navItem) : ?>
                                        <?php $current = ( $navItem->object_id == get_queried_object_id() ) ?>
                                        <li <?php if ( $current ) echo 'class="bg-gradient-to-r md:bg-gradient-to-b from-primary-500 to-transparent to-15% md:to-25% border-l-[1px] md:border-t-[1px] border-primary md:border-l-0"'; ?>>
                                            <a 
                                                href="<?php echo $navItem->url; ?>" 
                                                class="text-body-lg h-full md:text-body-base block text-center content-center <?php if ( $current ) echo 'font-medium'; ?>"
                                            >
                                                <?php echo $navItem->title; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </div>

                                <?php 
                                    }

                                    if (!empty($navButtons)) :
                                ?>
                                <hr class="w-[2px] h-6 bg-white rounded-full hidden md:block" />
                                <div class="flex md:gap-3 flex-col gap-6 md:flex-row w-full max-w-xs">
                                    <?php for ($i = 0; $i < count($navButtons); $i++) : ?>
                                    <li>
                                        <a 
                                            href="<?php echo $navButtons[$i]->url; ?>" 
                                            class="flex items-center justify-center w-full text-button-lg h-12 md:w-32 md:h-9 rounded-md md:text-button-base <?php echo ($i == 0) ? 'primary-button-colors' : 'black-button-colors md:white-button-colors'; ?>"
                                        >
                                            <?php echo $navButtons[$i]->title; ?>
                                        </a>
                                    </li>
                                    <?php endfor; ?>
                                </div>
                                <?php 
                                    endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main id="content">

