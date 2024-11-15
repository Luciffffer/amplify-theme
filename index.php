<?php

get_header();

require_once 'partials/functions/page-starter.php';

ob_start();

?>

<h1 class="font-heading text-heading-lg text-center"><?php the_title(); ?></h1>

<?php 

pageStarter(ob_get_clean());

get_footer(); 

?>