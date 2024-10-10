<?php

get_header();

?>

<section class="px-6 pt-16 text-white bg-black relative ">
    <div class="max-w-7xl mx-auto flex flex-col jusitfy-center gap-20 relative">
        <div aria-hidden="true" class="w-64 aspect-square absolute -top-96 left-1/2 -translate-x-1/2 md:left-14">
            <div class="relative w-full h-full">
                <div class="w-full h-full bg-white bg-opacity-50 rounded-full blur-[670px]"></div>
            </div>
        </div>
        <div class="py-24 flex flex-col gap-12 items-center">
            <h1 class="font-heading text-heading-lg text-center">
                Error 404: Page Not Found
            </h1>
            <p class="text-center text-body-base">
                The page you are looking for does not exist.<br/>Please check the URL or go back to the homepage.
            </p>
            <a 
                href="<?php echo home_url(); ?>"
                class="block font-button-base px-6 py-3 w-fit text-center text-white primary-button-colors rounded-md font-medium"
            >
                Go home
            </a>
        </div>
    </div>
</section>

<?php 

get_footer(); 

?>