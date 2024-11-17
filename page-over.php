<?php

get_header();

require_once get_template_directory() . '/partials/functions/page-starter.php';

ob_start();

?>

<h1 class="font-heading text-heading-lg text-center flex flex-col gap-3">
    Wij Zijn
    <svg  class="w-[90vw] max-w-80" viewBox="0 0 333 75" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M319.582 11.2429C320.191 10.0937 321.385 9.375 322.685 9.375H327.04C329.653 9.375 331.351 12.1268 330.178 14.4618L315.217 44.2592C314.972 44.7481 314.844 45.2876 314.844 45.8347V62.1138C314.844 64.053 313.272 65.625 311.333 65.625H307.371C305.432 65.625 303.86 64.053 303.86 62.1138V45.8379C303.86 45.2888 303.731 44.7473 303.484 44.2569L288.461 14.4673C287.284 12.1319 288.981 9.375 291.596 9.375H295.947C297.244 9.375 298.435 10.0897 299.046 11.2339L306.243 24.7295C307.567 27.2122 311.127 27.207 312.444 24.7206L319.582 11.2429Z" fill="#FBFCFD"/>
        <path d="M274.537 9.375C276.476 9.375 278.048 10.947 278.048 12.8862V17.0977C278.048 19.0369 276.476 20.609 274.537 20.609H255.904C253.964 20.609 252.392 22.181 252.392 24.1202V27.449C252.392 29.3882 253.964 30.9602 255.904 30.9602H270.065C272.004 30.9602 273.576 32.5323 273.576 34.4715V38.683C273.576 40.6222 272.004 42.1942 270.065 42.1942H255.904C253.964 42.1942 252.392 43.7662 252.392 45.7054V62.1138C252.392 64.053 250.82 65.625 248.881 65.625H244.92C242.98 65.625 241.408 64.053 241.408 62.1138V12.8862C241.408 10.947 242.98 9.375 244.92 9.375H274.537Z" fill="#FBFCFD"/>
        <path d="M233.562 17.706C233.562 19.3093 232.262 20.609 230.659 20.609C229.056 20.609 227.756 21.9086 227.756 23.5119V51.4882C227.756 53.0914 229.056 54.3911 230.659 54.3911C232.262 54.3911 233.562 55.6908 233.562 57.294V62.1138C233.562 64.053 231.99 65.625 230.051 65.625H214.399C212.46 65.625 210.888 64.053 210.888 62.1138V57.3332C210.888 55.7083 212.205 54.3911 213.83 54.3911C215.455 54.3911 216.772 53.0738 216.772 51.4489V23.5511C216.772 21.9262 215.455 20.609 213.83 20.609C212.205 20.609 210.888 19.2917 210.888 17.6668V12.8862C210.888 10.947 212.46 9.375 214.399 9.375H230.051C231.99 9.375 233.562 10.947 233.562 12.8862V17.706Z" fill="#FBFCFD"/>
        <path d="M179.054 9.375C180.993 9.375 182.565 10.947 182.565 12.8862V50.8798C182.565 52.819 184.137 54.3911 186.077 54.3911H199.531C201.471 54.3911 203.043 55.9631 203.043 57.9023V62.0336C203.043 63.9728 201.471 65.5448 199.531 65.5448H175.093C173.153 65.5448 171.581 63.9727 171.581 62.0335V12.8862C171.581 10.947 173.153 9.375 175.093 9.375H179.054Z" fill="#FBFCFD"/>
        <path d="M129.45 12.8862C129.45 10.947 131.022 9.375 132.961 9.375H147.26C156.361 9.375 163.736 16.998 163.736 26.3062C163.736 35.6143 156.361 43.1571 147.26 43.1571H143.945C142.006 43.1571 140.434 44.7291 140.434 46.6684V62.1138C140.434 64.053 138.862 65.625 136.923 65.625H132.961C131.022 65.625 129.45 64.053 129.45 62.1138V12.8862ZM140.434 28.4119C140.434 30.3511 142.006 31.9232 143.945 31.9232H147.26C150.241 31.9232 152.752 29.4356 152.752 26.3062C152.752 23.1767 150.241 20.609 147.26 20.609H143.945C142.006 20.609 140.434 22.181 140.434 24.1202V28.4119Z" fill="#FBFCFD"/>
        <path d="M47.2866 65.625C45.9142 65.625 44.6675 64.8254 44.0952 63.578L41.1877 57.2406C40.6154 55.9931 39.3687 55.1935 37.9963 55.1935H19.673C18.3394 55.1935 17.1209 55.949 16.5279 57.1435L13.2858 63.675C12.6928 64.8695 11.4743 65.625 10.1407 65.625H5.67084C3.06318 65.625 1.36538 62.883 2.52771 60.5487L27.304 10.7912C27.7361 9.92351 28.6219 9.375 29.5913 9.375C30.5878 9.375 31.4934 9.95436 31.9111 10.8591L54.8947 60.642C55.9689 62.9687 54.2694 65.625 51.7068 65.625H47.2866ZM25.6549 38.8903C24.4993 41.2241 26.1973 43.9595 28.8015 43.9595H29.6025C32.1599 43.9595 33.8595 41.313 32.7954 38.9874L32.4107 38.1466C31.1809 35.4587 27.3828 35.4005 26.0712 38.0495L25.6549 38.8903Z" fill="#FBFCFD"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M109.438 35.9601V44.5725C104.054 45.0486 99.8321 49.5703 99.8321 55.0779C99.8321 60.9028 104.554 65.6248 110.379 65.6248C115.913 65.6248 120.452 61.3626 120.891 55.9418C120.898 55.8939 120.903 55.8449 120.906 55.7948C120.911 55.694 120.917 55.5858 120.926 55.4687L120.98 13.0442C120.983 11.0185 119.341 9.375 117.315 9.375C117.068 9.375 116.821 9.40007 116.579 9.44983L94.2691 14.0287C93.3391 14.2195 92.3801 14.2199 91.4499 14.0296L69.05 9.44792C68.813 9.39943 68.5716 9.375 68.3296 9.375C66.3441 9.375 64.7346 10.9846 64.7346 12.9701V44.5753C59.3653 45.0659 55.1597 49.5808 55.1597 55.0779C55.1597 60.9028 59.8817 65.6248 65.7065 65.6248C71.3753 65.6248 75.9998 61.1525 76.2435 55.5437C76.2481 55.4933 76.2518 55.4428 76.2545 55.3924C76.2717 55.0716 76.2815 54.7083 76.2815 54.2969V35.9601C76.2815 32.4122 78.9264 29.42 82.4589 29.0896C85.7904 28.778 89.8279 28.4727 92.8596 28.4727C95.8913 28.4727 99.9288 28.778 103.26 29.0896C106.793 29.42 109.438 32.4122 109.438 35.9601Z" fill="#8640DC"/>
    </svg>
    <span class="sr-only">Amplify</span>
</h1>

<?php

$pageStarterContent = ob_get_clean();
pageStarter($pageStarterContent);

?>

<div class="sm:px-6">
    <nav 
        aria-label="Page navigation"
        role="navigation"
        class="max-w-2xl mx-auto w-full drop-shadow-2xl bg-white sm:rounded-3xl -translate-y-1/2"
    >
        <ul class="flex h-full text-body-base sm:text-body-lg font-semibold">
            <li class="w-full">
                <a href="#our-story" class="h-full py-2 flex items-center justify-center gap-3 group *:transition-colors">
                    <svg class="aspect-square w-9 stroke-black group-hover:stroke-neutral-800 group-active:stroke-neutral-700" width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24.75 38C22.0137 36.4202 18.9097 35.5885 15.75 35.5885C12.5903 35.5885 9.48635 36.4202 6.75 38V12C9.48635 10.4202 12.5903 9.58846 15.75 9.58846C18.9097 9.58846 22.0137 10.4202 24.75 12M24.75 38C27.4863 36.4202 30.5903 35.5885 33.75 35.5885C36.9097 35.5885 40.0137 36.4202 42.75 38V12C40.0137 10.4202 36.9097 9.58846 33.75 9.58846C30.5903 9.58846 27.4863 10.4202 24.75 12M24.75 38V12"
                            stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="text-black group-hover:text-neutral-800 group-active:text-neutral-700">Over Ons</span>
                </a>
            </li>
            <div class="py-3">
                <hr aria-hidden="true" class="w-[2px] h-full bg-black block rounded-full">
            </div>
            <li class="w-full">
                <a href="#who-is-who" class="h-full flex items-center justify-center gap-3 group *:transition-colors">
                    <svg class="aspect-square w-9 fill-black group-hover:fill-neutral-800 group-active:fill-neutral-700" width="49" height="48" viewBox="0 0 49 48" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.75 16C12.75 14.9391 13.1714 13.9217 13.9216 13.1716C14.6717 12.4214 15.6891 12 16.75 12C17.8109 12 18.8283 12.4214 19.5784 13.1716C20.3286 13.9217 20.75 14.9391 20.75 16C20.75 17.0609 20.3286 18.0783 19.5784 18.8284C18.8283 19.5786 17.8109 20 16.75 20C15.6891 20 14.6717 19.5786 13.9216 18.8284C13.1714 18.0783 12.75 17.0609 12.75 16ZM16.75 8C14.6283 8 12.5934 8.84285 11.0931 10.3431C9.59285 11.8434 8.75 13.8783 8.75 16C8.75 18.1217 9.59285 20.1566 11.0931 21.6569C12.5934 23.1571 14.6283 24 16.75 24C18.8717 24 20.9066 23.1571 22.4069 21.6569C23.9071 20.1566 24.75 18.1217 24.75 16C24.75 13.8783 23.9071 11.8434 22.4069 10.3431C20.9066 8.84285 18.8717 8 16.75 8ZM32.75 18C32.75 17.4696 32.9607 16.9609 33.3358 16.5858C33.7109 16.2107 34.2196 16 34.75 16C35.2804 16 35.7891 16.2107 36.1642 16.5858C36.5393 16.9609 36.75 17.4696 36.75 18C36.75 18.5304 36.5393 19.0391 36.1642 19.4142C35.7891 19.7893 35.2804 20 34.75 20C34.2196 20 33.7109 19.7893 33.3358 19.4142C32.9607 19.0391 32.75 18.5304 32.75 18ZM34.75 12C33.1587 12 31.6326 12.6321 30.5074 13.7574C29.3821 14.8826 28.75 16.4087 28.75 18C28.75 19.5913 29.3821 21.1174 30.5074 22.2426C31.6326 23.3679 33.1587 24 34.75 24C36.3413 24 37.8674 23.3679 38.9926 22.2426C40.1179 21.1174 40.75 19.5913 40.75 18C40.75 16.4087 40.1179 14.8826 38.9926 13.7574C37.8674 12.6321 36.3413 12 34.75 12ZM4.75 33C4.75 30.24 6.99 28 9.75 28H23.75C26.51 28 28.75 30.24 28.75 33V33.192C28.7473 33.3378 28.7366 33.4834 28.718 33.628C28.681 33.9782 28.6208 34.3257 28.538 34.668C28.2679 35.7742 27.7856 36.8175 27.118 37.74C25.422 40.072 22.262 42 16.75 42C11.238 42 8.078 40.072 6.382 37.74C5.50812 36.5275 4.95748 35.1123 4.782 33.628L4.75 33.188V33ZM8.75 33.104L8.758 33.212C8.76867 33.3267 8.79933 33.4987 8.85 33.728C8.958 34.18 9.178 34.784 9.618 35.388C10.418 36.492 12.258 38 16.75 38C21.242 38 23.078 36.492 23.882 35.388C24.3629 34.7154 24.6619 33.9301 24.75 33.108V33C24.75 32.7348 24.6446 32.4804 24.4571 32.2929C24.2696 32.1054 24.0152 32 23.75 32H9.75C9.48478 32 9.23043 32.1054 9.04289 32.2929C8.85536 32.4804 8.75 32.7348 8.75 33V33.104ZM34.746 40C33.33 39.9947 32.086 39.8613 31.014 39.6C31.7426 38.444 32.2612 37.1684 32.546 35.832C33.1647 35.9387 33.898 35.9947 34.746 36C38.306 36 39.658 34.912 40.186 34.252C40.4754 33.8841 40.6679 33.4495 40.746 32.988V32.968C40.7377 32.7084 40.6287 32.4622 40.442 32.2815C40.2554 32.1008 40.0058 31.9999 39.746 32H32.694C32.5358 30.5687 32.035 29.1966 31.234 28H39.75C42.51 28 44.75 30.24 44.75 33V33.068C44.7465 33.1924 44.7371 33.3165 44.722 33.44C44.5638 34.6506 44.0768 35.7947 43.314 36.748C41.838 38.588 39.194 40 34.75 40"
                             />
                    </svg>
                    <span class="text-black group-hover:text-neutral-800 group-active:text-neutral-700">Wie Is Wie</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<section class="text-black px-6 py-16 md:py-32">
    <div class="max-w-7xl mx-auto flex flex-col gap-16">
        <h2 id="our-story" class="font-heading text-heading-base text-center">Over Ons</h2>
        <div class="flex flex-col gap-32">
            <div class="flex flex-col gap-12 md:grid grid-cols-2 items-center justify-center lg:gap-32">
                <div class="flex flex-col gap-9 w-full max-w-lg mx-auto">
                    <h3 class="font-heading text-heading-sm">Artiesten staan centraal</h3>
                    <p>
                        Bij Amplify draait alles om het ondersteunen van artiesten en hun muziek. We begrijpen hoe moeilijk het kan zijn voor nieuwe en opkomende artiesten om de aandacht te krijgen die ze verdienen in de competitieve muziekwereld. Hier bieden wij een oplossing voor. <span class="text-primary">Amplify zet onbekend talent in de schijnwerpers</span> door hen een platform te geven waar ze in het middelpunt van de belangstelling kunnen staan.
                    </p>
                    <p>
                        Onze website biedt een breed aanbod aan blogs waarin we artiesten en hun muziek bespreken. Gebruikers kunnen reageren en hun mening delen. Zo komen er discussies en interactie tot leven die een ruimte creëren waarin mensen vrij en met respect hun passie voor muziek kunnen uiten.
                    </p>
                </div>
                <img class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/images/artist-guitar.jpg" alt="A man playing guitar">
            </div>
            <div class="flex flex-col gap-12 md:grid grid-cols-2 items-center justify-center lg:gap-32">
                <div class="flex flex-col gap-9 max-w-lg mx-auto">
                    <h3 class="font-heading text-heading-sm">Meer dan alleen nieuwe muziek ontdekken</h3>
                    <p>
                        Bij ons draait het niet alleen om het ontdekken van nieuwe muziek, maar vooral om het  <span class="text-primary">opbouwen van een community.</span> Je kunt blogs lezen, jouw mening geven, en in contact komen met anderen die net zo gepassioneerd zijn over muziek als jij. Wij geloven sterk in gelijke kansen, want elke artiest verdient erkenning voor het harde werk en creativiteit die ze in hun muziek steken.
                    </p>
                    <p>
                        Onze missie is om de barrières van de muziekindustrie te doorbreken door artiesten van alle achtergronden een platform te bieden waarop ze hun fanbase kunnen opbouwen en hun muziek kunnen delen. <span class="text-primary">We streven naar een toekomst waarin elke stem wordt gehoord, hoe klein die ook is!</span>
                    </p>
                </div>
                <img class="md:-order-1" src="<?php echo get_template_directory_uri(); ?>/assets/images/people-dancing-hiphop.webp" alt="A group of people dancing to hiphop">
            </div>
        </div>
    </div>
</section>

<?php require_once get_template_directory() . '/partials/who-is-who.php'; ?>

<?php

get_footer();

?>