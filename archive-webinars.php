<?php

require_once get_template_directory() . '/partials/functions/page-starter.php';

$options = [
    'post_type' => 'webinars',
    'posts_per_page' => -1,
];

$selectedOrder = "newest";

if (!empty($_GET['order'])) {
    switch ($_GET['order']) {
        case 'oldest':
            $options['orderby'] = 'date';
            $options['order'] = 'ASC';
            $selectedOrder = "oldest";
            break;
        case 'a-z':
            $options['orderby'] = 'title';
            $options['order'] = 'ASC';
            $selectedOrder = "a-z";
            break;
        default:
            $options['orderby'] = 'date';
            $options['order'] = 'DESC';
            $selectedOrder = "newest";
            break;
    }
}

$posts = get_posts($options);

get_header();

ob_start();
?>

<h1 class="font-heading text-heading-lg text-center md:text-heading-xl">
    Webinars
</h1>

<?php

pageStarter(ob_get_clean());

?>

<section class="px-6 py-6">

    <form action="#" aria-label="Filters" class="max-w-7xl mx-auto">
        <ul class="flex flex-col gap-3 md:flex-row md:gap-6 items-center md:justify-end">

            <li class="w-full md:w-fit">
                <fieldset class="[&_input]:hidden">
                    <div class="flex justify-between items-center">
                        <legend class="text-neutral-600 md:sr-only">Sort by</legend>
                        <div 
                            class="order-radio"
                        >
                            <label for="newest">
                                Newest
                                <input type="radio" name="order" id="newest" value="newest" <?php if ($selectedOrder == "newest") echo 'checked'; ?>>
                            </label>
                            <label for="oldest">
                                Oldest
                                <input type="radio" name="order" id="oldest" value="oldest" <?php if ($selectedOrder == "oldest") echo 'checked'; ?>>
                            </label>
                            <label for="a-z">
                                A&#x2011;Z
                                <input type="radio" name="order" id="a-z" value="a-z" <?php if ($selectedOrder == "a-z") echo 'checked'; ?>>
                            </label>
                        </div>
                    </div>
                </fieldset>
            </li>

            <script defer>
            
            const orderRadio = document.querySelector('.order-radio');

            orderRadio.addEventListener('change', e => {
                const url = new URL(window.location.href);
                url.searchParams.set('order', e.target.value);
                window.location.href = url.href;
            });

            </script>

        </ul>
    </form>

    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 my-12 max-w-7xl mx-auto">
        <?php
        foreach ($posts as $post) :
            $webinarLink = get_permalink($post->ID);
            $postImage = get_the_post_thumbnail_url($post->ID, 'large');
            $title = $post->post_title;
            ?>
            <li class="flex flex-col gap-6 justify-between">
                <div class="flex flex-col gap-6">
                    <a href="<?php echo $webinarLink; ?>">
                        <img src="<?php echo $postImage; ?>" alt="<?php echo $title; ?>" class="w-full rounded-3xl shadow-card object-cover">
                    </a>
                    <div class="flex flex-col gap-3">
                        <h2 class="font-heading text-heading-sm">
                            <a href="<?php echo $webinarLink; ?>"><?php echo $title; ?></a>
                        </h2>
                    </div>
                </div>
                <a href="<?php echo $webinarLink ?>" class="w-full black-button-colors flex gap-3 justify-center items-center text-button-base rounded-md h-12">
                    Watch
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12L13 18M19 12L13 6M19 12L5 12" stroke="#FBFCFD" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
        <?php 
        endforeach; 
        
        if (empty($posts)) :
            ?>
            <li class="text-center text-neutral-600 py-48 col-span-full">
                No webinars found
            </li>
            <?php
        endif;
        ?>
    </ul>

</section>

<?php

get_footer();

?>