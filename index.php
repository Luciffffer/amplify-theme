<?php

get_header();

?>

<section class="px-6 pt-16 text-white bg-black relative ">
    <div class="max-w-7xl mx-auto flex flex-col jusitfy-center gap-20 relative">
        <div aria-hidden="true" class="w-64 aspect-square absolute -top-40 left-1/2 -translate-x-1/2 md:left-14">
            <div class="relative w-full h-full">
                <div class="w-full h-full bg-white bg-opacity-50 rounded-full blur-[670px]"></div>
            </div>
        </div>
        <div class="py-24 flex flex-col gap-12 items-center">
            <h1 class="font-heading text-heading-lg text-center"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<?php 

get_footer(); 

?>