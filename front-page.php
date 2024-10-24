<?php
get_header();

// get post types
$artists = new WP_Query(
    array(
        'post_type' => 'artists',
        'posts_per_page' => -1,
    )
);

$artists = $artists->posts;

$podcasts = new WP_Query(
    array(
        'post_type' => 'podcasts',
        'posts_per_page' => -1,
    )
);

$podcasts = $podcasts->posts;

// begin editing html below
?>

<section class="px-6 pt-44 text-white bg-black relative">
    <div aria-hidden="true" class="h-full w-full aspect-square absolute top-0 left-0 overflow-hidden">
        <div class="w-full h-full px-6">
            <div class="relative w-full h-full max-w-7xl mx-auto">
                <div class="w-[1000px] aspect-square absolute -translate-x-1/2 -translate-y-1/2 top-48 left-1/2 md:top-[30%] md:left-[2rem]">
                    <div class="relative w-full h-full">
                        <svg class="absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36 66C34.35 66 32.938 65.413 31.764 64.239C30.59 63.065 30.002 61.652 30 60H42C42 61.65 41.413 63.063 40.239 64.239C39.065 65.415 37.652 66.002 36 66ZM24 57V51H48V57H24ZM24.75 48C21.3 45.95 18.562 43.2 16.536 39.75C14.51 36.3 13.498 32.55 13.5 28.5C13.5 22.25 15.688 16.938 20.064 12.564C24.44 8.19 29.752 6.002 36 6C42.248 5.998 47.561 8.186 51.939 12.564C56.317 16.942 58.504 22.254 58.5 28.5C58.5 32.55 57.488 36.3 55.464 39.75C53.44 43.2 50.702 45.95 47.25 48H24.75ZM26.55 42H45.45C47.7 40.4 49.438 38.425 50.664 36.075C51.89 33.725 52.502 31.2 52.5 28.5C52.5 23.9 50.9 20 47.7 16.8C44.5 13.6 40.6 12 36 12C31.4 12 27.5 13.6 24.3 16.8C21.1 20 19.5 23.9 19.5 28.5C19.5 31.2 20.113 33.725 21.339 36.075C22.565 38.425 24.302 40.4 26.55 42Z"
                                fill="#FBFCFD" />
                        </svg>
                        <div class="w-full h-full bg-radial-gradient-hero blur-3xl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto flex flex-col gap-20 md:flex-row relative">
        <div class="pt-32 flex flex-col gap-12 items-center md:items-end w-full">
            <h1 class="font-heading text-heading-lg text-center md:text-right xl:text-heading-xl xl:max-w-xl">Putting Artists In The Spotlight</h1>
            <a 
                href="#"
                class="block font-button-base px-6 py-3 w-fit text-center text-white primary-button-colors rounded-md"
            >
                Check out all artists
            </a>
        </div>
        <article class="w-full mx-auto max-w-md bg-white text-black rounded-3xl -mb-48 shadow-card p-6 flex flex-col gap-6 md:-mb-32">
            <div class="aspect-square w-full bg-no-repeat bg-left-top bg-contain rounded-3xl" style="background-image: url(<?php echo get_the_post_thumbnail_url($artists[0]->ID); ?>);"></div>
            <h2 class="font-heading text-heading-sm"><?php echo $artists[0]->post_title; ?></h2>
            <?php
            $genres = get_the_terms($artists[0]->ID, 'genre');
            if ($genres && !is_wp_error($genres)) :
            ?>
                <ul aria-label="Genres" class="flex gap-3 flex-wrap">
                    <?php
                    foreach ($genres as $genre) :
                    ?>
                        <li class="rounded-md px-6 py-2 border-2 black-border-button-colors">
                            <a href="<?php echo get_term_link( $genre ); ?>">
                                <?php echo $genre->name; ?>
                            </a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            <?php 
            endif; 
            ?>
            <a 
                class="h-12 flex items-center justify-center gap-3 font-button-base text-white black-button-colors rounded-md"
                href="<?php echo get_permalink($artists[0]->ID); ?>"
            >
                Read more
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12L13 18M19 12L13 6M19 12L5 12" stroke="#FBFCFD" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </article>
    </div>
</section>

<section class="my-72 px-6 md:my-48">
    <div class="max-w-7xl w-full mx-auto">
        <div class="flex justify-between items-center mx-auto flex-col gap-20 max-w-[80%] md:flex-row  md:flex-wrap lg:flex-nowrap">
            <div class="flex items-center gap-6">
                <span class="font-heading text-heading-xxl text-primary"><?php echo sizeof($artists) ?></span>
                <div class="flex flex-col">
                    <span class="italic text-body-lg font-light">Artist<?php if (sizeof($artists) != 1) echo "s"; ?></span>
                    <span class="text-heading-sm italic text-primary">Covered</span>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <span class="font-heading text-heading-xxl"><?php echo sizeof($podcasts) ?></span>
                <div class="flex flex-col">
                    <span class="italic text-body-lg font-light">Podcast<?php if (sizeof($podcasts) != 1) echo "s"; ?></span>
                    <span class="text-heading-sm italic">Recorded</span>
                </div>
            </div>
            <svg width="212" height="212" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M106 207C161.782 207 207 161.782 207 106C207 50.2177 161.782 5 106 5C50.2177 5 5 50.2177 5 106C5 161.782 50.2177 207 106 207Z"
                    stroke="#8640DC" stroke-width="10" stroke-linejoin="round" />
                <path d="M106 45.4002C72.5338 45.4002 45.4002 72.5339 45.4002 106M106 166.6C139.467 166.6 166.6 139.467 166.6 106"
                    stroke="#8640DC" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M106 126.2C111.357 126.2 116.495 124.072 120.283 120.284C124.072 116.496 126.2 111.358 126.2 106C126.2 100.643 124.072 95.505 120.283 91.7168C116.495 87.9286 111.357 85.8004 106 85.8004C100.643 85.8004 95.5046 87.9286 91.7164 91.7168C87.9281 95.505 85.7999 100.643 85.7999 106C85.7999 111.358 87.9281 116.496 91.7164 120.284C95.5046 124.072 100.643 126.2 106 126.2Z"
                    stroke="#8640DC" stroke-width="5" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
</section>

<?php
get_footer();
?>