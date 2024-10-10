        </main>
        <footer class="text-white">
            <div class="bg-black flex flex-col items-center gap-6 justify-center px-6 py-9">
                <div class="flex flex-col items-center justify-between gap-3 sm:flex-row sm:w-full max-w-3xl">
                    <div class="w-full">
                        <img class="h-9" src="<?php echo get_template_directory_uri(); ?>/assets/images/amplify-logo-white-active.png" alt="Amplify">
                    </div>
                    <span>x</span>
                    <div class="w-full flex justify-center sm:justify-end">
                        <img class="h-24" src="<?php echo get_template_directory_uri(); ?>/assets/images/kdg-logo-white.png" alt="Karel de Grote Universiy of Applied Sciences and Arts">
                    </div>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <h2 class="font-medium text-body-base">All Pages</h2>
                    <nav>
                        <ul class="text-neutral flex gap-3">
                            <?php
                                $themeLocations = get_nav_menu_locations();

                                $footerMenuObj = get_term( $themeLocations['footer'], 'nav_menu' );
                                $footerMenuItems = wp_get_nav_menu_items( $footerMenuObj->name );

                                if (empty($footerMenuItems)) {
                                    echo '<li><a href="/wp-admin/nav-menus.php">Assign a menu</a></li>';
                                } else {
                                    foreach ($footerMenuItems as $footerMenuItem) :
                            ?>

                            <li>
                                <a href="<?php echo $footerMenuItem->url; ?>" class="text-body-base hover:text-neutral-200">
                                    <?php echo $footerMenuItem->title; ?>
                                </a>
                            </li>

                            <?php 
                                    endforeach; 
                                } 
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="bg-[#0D1117] py-6 px-12 flex flex-col gap-6 items-center text-body-sm text-[#FBFBFB] md:flex-row md:justify-between">
                <p class="max-w-40 text-center md:max-w-full md:w-full md:text-left">© 2024 Tim Noelmans. All rights reserved.</p>
                <div data-lucan class="*:bg-[#ED4545] *:aspect-square *:rounded-full *:w-[6px] flex gap-[6px]">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <p class="max-w-52 text-center md:max-w-full md:w-full md:text-right">
                    Website designed & developer by 
                    <a href="https://www.linkedin.com/in/tim-noelmans/" class="underline underline-offset-4 inline-flex gap-1 items-center">
                        Tim Noelmans
                        <svg class="mt-1" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5256 8.48734C12.5256 8.37854 12.5689 8.27418 12.6458 8.19725C12.7227 8.12031 12.8271 8.07709 12.9359 8.07709C13.0447 8.07709 13.1491 8.12031 13.226 8.19725C13.3029 8.27418 13.3462 8.37854 13.3462 8.48734V11.3591C13.3462 11.7944 13.1733 12.2118 12.8655 12.5195C12.5578 12.8273 12.1404 13.0002 11.7051 13.0002H5.14103C4.7058 13.0002 4.2884 12.8273 3.98065 12.5195C3.67289 12.2118 3.5 11.7944 3.5 11.3591V4.79503C3.5 4.35981 3.67289 3.94241 3.98065 3.63465C4.2884 3.3269 4.7058 3.15401 5.14103 3.15401H8.01282C8.12163 3.15401 8.22598 3.19723 8.30292 3.27417C8.37985 3.35111 8.42308 3.45546 8.42308 3.56427C8.42308 3.67307 8.37985 3.77742 8.30292 3.85436C8.22598 3.9313 8.12163 3.97452 8.01282 3.97452H5.14103C4.92341 3.97452 4.71471 4.06097 4.56084 4.21484C4.40696 4.36872 4.32051 4.57742 4.32051 4.79503V11.3591C4.32051 11.5768 4.40696 11.7855 4.56084 11.9393C4.71471 12.0932 4.92341 12.1797 5.14103 12.1797H11.7051C11.9227 12.1797 12.1314 12.0932 12.2853 11.9393C12.4392 11.7855 12.5256 11.5768 12.5256 11.3591V8.48734ZM8.32462 8.7655C8.28713 8.80616 8.24181 8.83883 8.19138 8.86154C8.14095 8.88424 8.08645 8.89652 8.03116 8.89762C7.97586 8.89873 7.92092 8.88865 7.86962 8.86797C7.81832 8.8473 7.77173 8.81647 7.73265 8.77734C7.69357 8.73821 7.66281 8.69157 7.64221 8.64025C7.62161 8.58892 7.61161 8.53396 7.61279 8.47866C7.61397 8.42337 7.62633 8.36889 7.6491 8.31849C7.67188 8.26809 7.70461 8.22282 7.74533 8.18539L12.7759 3.15401H10.4744C10.3656 3.15401 10.2612 3.11079 10.1843 3.03385C10.1073 2.95691 10.0641 2.85256 10.0641 2.74375C10.0641 2.63495 10.1073 2.5306 10.1843 2.45366C10.2612 2.37672 10.3656 2.3335 10.4744 2.3335H13.3462C13.5638 2.3335 13.7725 2.41994 13.9263 2.57382C14.0802 2.72769 14.1667 2.9364 14.1667 3.15401V6.0258C14.1667 6.13461 14.1234 6.23896 14.0465 6.3159C13.9696 6.39284 13.8652 6.43606 13.7564 6.43606C13.6476 6.43606 13.5433 6.39284 13.4663 6.3159C13.3894 6.23896 13.3462 6.13461 13.3462 6.0258V3.74478L8.32462 8.7655Z" fill="#FBFBFB"/>
                        </svg>
                    </a>
                </p>
            </div>
        </footer>
        <?php wp_footer(); ?>
        <!-- 
                        Hello there!

            ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣴⣾⣖⣬⣴⢿⣿⣿⣿⣶⣿⣕⡜⡣⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠀⠀⢀⢞⣽⣿⢟⡵⣿⣿⣿⣿⠿⠟⠛⠛⠱⣶⣍⣂⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠀⠀⣌⣿⣿⣿⣿⣿⡿⣱⠿⠃⠀⠀⠀⠀⠀⠙⣿⣧⢁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠀⢰⣴⢿⣿⡿⣷⡯⠛⠀⠀⠀⠀⠀⠀⠀⠀⠀⢹⣿⠹⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⢀⣿⣿⣿⣽⣫⣷⢶⣤⠄⠀⠀⠀⠀⢠⢠⢢⢸⣿⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠘⢻⢟⢿⣛⡆⣡⣶⣶⣦⣀⣠⠀⣴⣺⣖⠆⠙⢱⠇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠘⣿⣛⣫⠀⡓⠁⠀⠀⠙⣿⣿⡇⠘⠄⠀⠀⠀⡌⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠀⠹⣿⣯⠂⡨⡁⠀⠀⠨⣟⣋⢃⡀⡄⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠈⡿⣟⡡⠡⢢⡀⣠⣿⣿⣲⣷⠧⡚⡄⡀⢰⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠀⠀⠡⣻⢳⡀⣯⢃⣋⠹⠶⠶⡶⠒⢂⢑⡎⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⠀⠀⠀⠀⣘⣜⣗⡦⣼⣿⣄⡐⡶⠦⢄⣺⡇⣭⢆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⡀⢤⠄⠒⢆⡿⣿⢹⣷⡽⣇⠈⢿⣿⣝⢤⢇⣷⡻⢢⣿⡈⢢⠄⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
            ⠀⢀⠄⠘⢘⡏⢱⢙⢼⢿⣿⣮⣢⣜⣯⣿⠓⢿⢀⣿⣿⣿⠇⢎⡽⣖⣬⢑⠀⠀⠀⠀
            ⠀⠀⠀⠀⠀⢸⠈⠈⠈⣿⣿⣿⣷⣭⣶⣶⣿⣿⡟⠁⠚⡜⣱⣙⠂⢶⡛⣲⡃
        -->
    </div>
</body>
</html>