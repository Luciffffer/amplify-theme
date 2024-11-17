<?php

get_header();

require_once 'partials/functions/page-starter.php';

ob_start();

?>

<h1 class="font-heading text-heading-lg text-center"><?php the_title(); ?></h1>

<?php 

pageStarter(ob_get_clean());

?>

<section class="px-6 py-12">
    <div class="w-full mx-auto max-w-7xl">
        <?php the_content(); ?>
    </div>
</section>

<?php

get_footer(); 

?>