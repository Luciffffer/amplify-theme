<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
</head>
<body class="text-black text-body-base bg-black">
    <div id="site" class="bg-white">
        <a 
            class="sr-only bg-white box-border text-black focus:p-2 focus:not-sr-only focus:absolute focus:left-4 focus:top-4 <?php if ( is_admin_bar_showing() ) echo 'top-[46px] min-[783px]:!top-8' ?>" 
            href="#content"
        >
            Skip to content
        </a>
        <header class="z-40 absolute top-0 w-full h-16 flex justify-center px-6 text-white <?php if ( is_admin_bar_showing() ) echo 'top-[46px] min-[783px]:!top-8' ?> ">
            <div class="max-w-7xl w-full flex justify-between items-center">
                <a href="/" aria-label="Home">
                    <svg class="h-6 w-fit" width="333" height="75" viewBox="0 0 333 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M319.582 11.2429C320.191 10.0937 321.385 9.375 322.685 9.375H327.04C329.653 9.375 331.351 12.1268 330.178 14.4618L315.217 44.2592C314.972 44.7481 314.844 45.2876 314.844 45.8347V62.1138C314.844 64.053 313.272 65.625 311.333 65.625H307.371C305.432 65.625 303.86 64.053 303.86 62.1138V45.8379C303.86 45.2888 303.731 44.7473 303.484 44.2569L288.461 14.4673C287.284 12.1319 288.981 9.375 291.596 9.375H295.947C297.244 9.375 298.435 10.0897 299.046 11.2339L306.243 24.7295C307.567 27.2122 311.127 27.207 312.444 24.7206L319.582 11.2429Z"
                            fill="#FBFCFD" />
                        <path
                            d="M274.537 9.375C276.476 9.375 278.048 10.947 278.048 12.8862V17.0977C278.048 19.0369 276.476 20.609 274.537 20.609H255.904C253.964 20.609 252.392 22.181 252.392 24.1202V27.449C252.392 29.3882 253.964 30.9602 255.904 30.9602H270.065C272.004 30.9602 273.576 32.5323 273.576 34.4715V38.683C273.576 40.6222 272.004 42.1942 270.065 42.1942H255.904C253.964 42.1942 252.392 43.7662 252.392 45.7054V62.1138C252.392 64.053 250.82 65.625 248.881 65.625H244.92C242.98 65.625 241.408 64.053 241.408 62.1138V12.8862C241.408 10.947 242.98 9.375 244.92 9.375H274.537Z"
                            fill="#FBFCFD" />
                        <path
                            d="M233.562 17.706C233.562 19.3093 232.262 20.609 230.659 20.609C229.056 20.609 227.756 21.9086 227.756 23.5119V51.4882C227.756 53.0914 229.056 54.3911 230.659 54.3911C232.262 54.3911 233.562 55.6908 233.562 57.294V62.1138C233.562 64.053 231.99 65.625 230.051 65.625H214.399C212.46 65.625 210.888 64.053 210.888 62.1138V57.3332C210.888 55.7083 212.205 54.3911 213.83 54.3911C215.455 54.3911 216.772 53.0738 216.772 51.4489V23.5511C216.772 21.9262 215.455 20.609 213.83 20.609C212.205 20.609 210.888 19.2917 210.888 17.6668V12.8862C210.888 10.947 212.46 9.375 214.399 9.375H230.051C231.99 9.375 233.562 10.947 233.562 12.8862V17.706Z"
                            fill="#FBFCFD" />
                        <path
                            d="M179.054 9.375C180.993 9.375 182.565 10.947 182.565 12.8862V50.8798C182.565 52.819 184.137 54.3911 186.077 54.3911H199.531C201.471 54.3911 203.043 55.9631 203.043 57.9023V62.0336C203.043 63.9728 201.471 65.5448 199.531 65.5448H175.093C173.153 65.5448 171.581 63.9727 171.581 62.0335V12.8862C171.581 10.947 173.153 9.375 175.093 9.375H179.054Z"
                            fill="#FBFCFD" />
                        <path
                            d="M129.45 12.8862C129.45 10.947 131.022 9.375 132.961 9.375H147.26C156.361 9.375 163.736 16.998 163.736 26.3062C163.736 35.6143 156.361 43.1571 147.26 43.1571H143.945C142.006 43.1571 140.434 44.7291 140.434 46.6684V62.1138C140.434 64.053 138.862 65.625 136.923 65.625H132.961C131.022 65.625 129.45 64.053 129.45 62.1138V12.8862ZM140.434 28.4119C140.434 30.3511 142.006 31.9232 143.945 31.9232H147.26C150.241 31.9232 152.752 29.4356 152.752 26.3062C152.752 23.1767 150.241 20.609 147.26 20.609H143.945C142.006 20.609 140.434 22.181 140.434 24.1202V28.4119Z"
                            fill="#FBFCFD" />
                        <path
                            d="M47.2866 65.625C45.9142 65.625 44.6675 64.8254 44.0952 63.578L41.1877 57.2406C40.6154 55.9931 39.3687 55.1935 37.9963 55.1935H19.673C18.3394 55.1935 17.1209 55.949 16.5279 57.1435L13.2858 63.675C12.6928 64.8695 11.4743 65.625 10.1407 65.625H5.67084C3.06318 65.625 1.36538 62.883 2.52771 60.5487L27.304 10.7912C27.7361 9.92351 28.6219 9.375 29.5913 9.375C30.5878 9.375 31.4934 9.95436 31.9111 10.8591L54.8947 60.642C55.9689 62.9687 54.2694 65.625 51.7068 65.625H47.2866ZM25.6549 38.8903C24.4993 41.2241 26.1973 43.9595 28.8015 43.9595H29.6025C32.1599 43.9595 33.8595 41.313 32.7954 38.9874L32.4107 38.1466C31.1809 35.4587 27.3828 35.4005 26.0712 38.0495L25.6549 38.8903Z"
                            fill="#FBFCFD" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M109.438 35.9601V44.5725C104.054 45.0486 99.8321 49.5703 99.8321 55.0779C99.8321 60.9028 104.554 65.6248 110.379 65.6248C115.913 65.6248 120.452 61.3626 120.891 55.9418C120.898 55.8939 120.903 55.8449 120.906 55.7948C120.911 55.694 120.917 55.5858 120.926 55.4687L120.98 13.0442C120.983 11.0185 119.341 9.375 117.315 9.375C117.068 9.375 116.821 9.40007 116.579 9.44983L94.2691 14.0287C93.3391 14.2195 92.3801 14.2199 91.4499 14.0296L69.05 9.44792C68.813 9.39943 68.5716 9.375 68.3296 9.375C66.3441 9.375 64.7346 10.9846 64.7346 12.9701V44.5753C59.3653 45.0659 55.1597 49.5808 55.1597 55.0779C55.1597 60.9028 59.8817 65.6248 65.7065 65.6248C71.3753 65.6248 75.9998 61.1525 76.2435 55.5437C76.2481 55.4933 76.2518 55.4428 76.2545 55.3924C76.2717 55.0716 76.2815 54.7083 76.2815 54.2969V35.9601C76.2815 32.4122 78.9264 29.42 82.4589 29.0896C85.7904 28.778 89.8279 28.4727 92.8596 28.4727C95.8913 28.4727 99.9288 28.778 103.26 29.0896C106.793 29.42 109.438 32.4122 109.438 35.9601Z"
                            fill="#FBFCFD" />
                    </svg>
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

                    <div data-hamburger-menu class="hidden duration-700 absolute z-[1000000] top-0 left-0 min-h-screen w-full bg-white transition-transform translate-x-full md:!translate-x-0 md:bg-transparent md:static md:h-full md:min-h-0 md:block">
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

                                    $navItems = wp_get_nav_menu_items( $globalMenuObj->name );

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

                                <?php } ?>

                                
                                <hr class="w-[2px] h-6 bg-white rounded-full hidden md:block" />
                                <div class="flex md:gap-3 flex-col gap-6 md:flex-row w-full max-w-xs">
                                    
                                    <li>
                                        <a 
                                            href="<?php echo get_post_type_archive_link('artists'); ?>" 
                                            class="flex items-center justify-center w-full text-button-lg h-12 md:w-32 md:h-9 rounded-md md:text-button-base primary-button-colors"
                                        >
                                            Artists
                                        </a>
                                    </li>

                                    <li>
                                        <a 
                                            href="<?php echo get_post_type_archive_link('webinars'); ?>" 
                                            class="flex items-center justify-center w-full text-button-lg h-12 md:w-32 md:h-9 rounded-md md:text-button-base black-button-colors md:white-button-colors"
                                        >
                                            Webinars
                                        </a>
                                    </li>
                                    
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main id="content">

