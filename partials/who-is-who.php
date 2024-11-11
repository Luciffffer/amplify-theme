<?php $users = get_users( array( 'orderby' => 'registered', 'order' => 'ASC' ) ); ?>
<section class="px-6 my-32">
    <div class="max-w-7xl mx-auto flex flex-col gap-16">
        <div class="text-center flex flex-col gap-6">
            <h2 id="who-is-who" class="font-heading text-heading-base">Wie Zijn De Schrijvers?</h2>
            <p class="max-w-sm mx-auto">Onze filosofie is gemakkelijk: schrijf wat je echt voelt in je hart!</p>
        </div>
        <div class="flex flex-col gap-6">
            <div 
                data-author-container 
                class="grid overflow-x-scroll snap-mandatory snap-x scrollbar-hide scroll-smooth md:!grid-author-responsive md:gap-16" 
                style="grid-template-columns: repeat(<?php echo sizeof($users); ?>, 100%);"
            >
                <?php foreach ($users as $index => $user) : ?>

                    <a 
                        href="#"
                        data-key="<?php echo $index; ?>"
                        data-author
                        <?php if ($index == 0) echo 'data-selected'; ?> 
                        class="w-full snap-start group md:w-fit"
                        data-name="<?php echo $user->display_name; ?>"
                        data-quote="<?php echo get_the_author_meta( 'quote', $user->ID ); ?>"
                        data-description="<?php echo get_the_author_meta( 'whois-description', $user->ID ); ?>"
                        data-fun-fact="<?php echo get_the_author_meta( 'fun-fact', $user->ID ); ?>"
                        data-spotify="<?php echo get_the_author_meta( 'spotify', $user->ID ); ?>"
                        data-linkedin="<?php echo get_the_author_meta( 'linkedin', $user->ID ); ?>"
                    >
                        <div class="flex flex-col gap-6 mx-auto max-w-xs">
                            <div class="relative">
                                <?php echo get_avatar( $user->ID, 300, '', $user->display_name, array( 'class' => 'w-full aspect-square' ) ); ?>
                                <div class="w-full h-full absolute bg-black top-0 left-0 mix-blend-color group-data-[selected]:bg-primary transition-colors duration-500"></div>
                            </div>
                            <div>
                                <h3 class="text-body-lg font-bold"><?php echo $user->display_name; ?></h3>
                                <?php 
                                    $roles = get_the_author_meta( 'whois-roles', $user->ID );
                                    if ($roles) : 
                                ?>
                                    <p class="italic"><?php echo $roles; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                                    </a>

                <?php endforeach; ?>
            </div>
            <div class="flex gap-6 items-center justify-center md:hidden">
                <button data-author-back aria-label="Previous author">
                    <svg width="36" height="36" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 6.5L9 12.5L15 18.5" stroke="#19191D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div data-author-select class="flex gap-3">
                    <?php foreach ($users as $index => $user) : ?>
                        <button 
                            data-key="<?php echo $index; ?>" 
                            <?php if ($index == 0) echo 'data-selected'; ?>
                            aria-label="Select <?php echo $user->display_name; ?>"
                            class="aspect-square w-3 rounded-full bg-neutral-100 data-[selected]:bg-black"
                        ></button>
                    <?php endforeach; ?>
                </div>
                <button data-author-next aria-label="Next aurthor" class="rotate-180">
                    <svg width="36" height="36" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 6.5L9 12.5L15 18.5" stroke="#19191D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex flex-col gap-12 max-w-xl mx-auto w-full">
            <div>
                <span class="font-heading text-heading-xxl text-primary">"</span>
                <p class="text-heading-sm font-heading -mt-9 flex flex-col gap-3">
                    <span data-author-quote><?php echo get_the_author_meta( 'quote', $users[0]->ID ); ?></span>
                    <span data-author-name class="block text-primary text-body-base font-sans font-bold">- <?php echo $users[0]->display_name ?></span>
                </p>
            </div>
            <div class="flex flex-col gap-9">
                <p data-author-description><?php echo get_the_author_meta( 'whois-description', $users[0]->ID ); ?></p>
                <p class="flex flex-col gap-3">
                    <span class="font-bold">Leuk feitje:</span>
                    <span data-author-funfact><?php echo get_the_author_meta( 'fun-fact', $users[0]->ID ); ?></span>
                </p>
            </div>
            <div class="flex gap-3">
                <a 
                    data-author-spotify
                    href="<?php echo get_the_author_meta( 'spotify', $users[0]->ID ); ?>" 
                    aria-label="<?php echo $users[0]->display_name ?>'s Spotify"
                    class="<?php if (empty(get_the_author_meta( 'spotify', $users[0]->ID ))) echo "hidden" ?>"
                >
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.8 21.8C29.4 18 18.7 17.6 12.6 19.5C11.6 19.8 10.6 19.2 10.3 18.3C10 17.3 10.6 16.3 11.5 16C18.6 13.9 30.3 14.3 37.7 18.7C38.6 19.2 38.9 20.4 38.4 21.3C37.9 22 36.7 22.3 35.8 21.8ZM35.6 27.4C35.1 28.1 34.2 28.4 33.5 27.9C28.1 24.6 19.9 23.6 13.6 25.6C12.8 25.8 11.9 25.4 11.7 24.6C11.5 23.8 11.9 22.9 12.7 22.7C20 20.5 29 21.6 35.2 25.4C35.8 25.7 36.1 26.7 35.6 27.4ZM33.2 32.9C32.8 33.5 32.1 33.7 31.5 33.3C26.8 30.4 20.9 29.8 13.9 31.4C13.2 31.6 12.6 31.1 12.4 30.5C12.2 29.8 12.7 29.2 13.3 29C20.9 27.3 27.5 28 32.7 31.2C33.4 31.5 33.5 32.3 33.2 32.9ZM24 4C21.3736 4 18.7728 4.51732 16.3463 5.52241C13.9198 6.5275 11.715 8.00069 9.85786 9.85786C6.10714 13.6086 4 18.6957 4 24C4 29.3043 6.10714 34.3914 9.85786 38.1421C11.715 39.9993 13.9198 41.4725 16.3463 42.4776C18.7728 43.4827 21.3736 44 24 44C29.3043 44 34.3914 41.8929 38.1421 38.1421C41.8929 34.3914 44 29.3043 44 24C44 21.3736 43.4827 18.7728 42.4776 16.3463C41.4725 13.9198 39.9993 11.715 38.1421 9.85786C36.285 8.00069 34.0802 6.5275 31.6537 5.52241C29.2272 4.51732 26.6264 4 24 4Z"
                            fill="#8640DC" />
                    </svg>
                </a>
                <a 
                    data-author-linkedin
                    href="<?php echo get_the_author_meta( 'linkedin', $users[0]->ID ); ?>" 
                    aria-label="<?php echo $users[0]->display_name ?>'s LinkedIn"
                >
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="48" height="48" fill="#FBFCFD" />
                        <path
                            d="M38 6C39.0609 6 40.0783 6.42143 40.8284 7.17157C41.5786 7.92172 42 8.93913 42 10V38C42 39.0609 41.5786 40.0783 40.8284 40.8284C40.0783 41.5786 39.0609 42 38 42H10C8.93913 42 7.92172 41.5786 7.17157 40.8284C6.42143 40.0783 6 39.0609 6 38V10C6 8.93913 6.42143 7.92172 7.17157 7.17157C7.92172 6.42143 8.93913 6 10 6H38ZM37 37V26.4C37 24.6708 36.3131 23.0124 35.0903 21.7897C33.8676 20.5669 32.2092 19.88 30.48 19.88C28.78 19.88 26.8 20.92 25.84 22.48V20.26H20.26V37H25.84V27.14C25.84 25.6 27.08 24.34 28.62 24.34C29.3626 24.34 30.0748 24.635 30.5999 25.1601C31.125 25.6852 31.42 26.3974 31.42 27.14V37H37ZM13.76 17.12C14.6511 17.12 15.5058 16.766 16.1359 16.1359C16.766 15.5058 17.12 14.6511 17.12 13.76C17.12 11.9 15.62 10.38 13.76 10.38C12.8636 10.38 12.0039 10.7361 11.37 11.37C10.7361 12.0039 10.38 12.8636 10.38 13.76C10.38 15.62 11.9 17.12 13.76 17.12ZM16.54 37V20.26H11V37H16.54Z"
                            fill="#19191D" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    const authorSelect = document.querySelector('[data-author-select]');
    const authorBack = document.querySelector('[data-author-back]');
    const authorNext = document.querySelector('[data-author-next]');
    const authors = document.querySelectorAll('[data-author]');
    const authorContainer = document.querySelector('[data-author-container]');

    let selected = 0;
    let timeout;

    // select specific author
    authorSelect.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON') {
            const key = e.target.getAttribute('data-key');
            selected = parseInt(key);
            authorContainer.scrollLeft = selected * authorContainer.offsetWidth;
        }
    });

    // select next author
    authorNext.addEventListener('click', () => {
        if (selected < authors.length - 1) {
            selected++;
            authorContainer.scrollLeft = selected * authorContainer.offsetWidth;
        }
    });

    // select previous author
    authorBack.addEventListener('click', () => {
        if (selected > 0) {
            selected--;
            authorContainer.scrollLeft = selected * authorContainer.offsetWidth;
        }
    });

    // scroll to selected author
    authorContainer.addEventListener('scroll', () => {
        const index = Math.round(authorContainer.scrollLeft / authorContainer.offsetWidth);
        if (index !== selected) {
            selected = index;
            clearTimeout(timeout);

            authors.forEach(author => {
                author.removeAttribute('data-selected');
            });
            authorSelect.querySelectorAll('button').forEach(button => {
                button.removeAttribute('data-selected');
            });
            
            authorSelect.querySelectorAll('button')[selected].setAttribute('data-selected', '');
            timeout = setTimeout(() => {
                authors[selected].setAttribute('data-selected', '');
                displayAuthorData(
                    authors[selected].dataset.name,
                    authors[selected].dataset.quote,
                    authors[selected].dataset.description,
                    authors[selected].dataset.funFact,
                    authors[selected].dataset.spotify,
                    authors[selected].dataset.linkedin
                );
            }, 400);
        }
    });

    // click change
    authorContainer.addEventListener('click', (e) => {
        e.preventDefault();
        const directChild = e.target.closest('[data-author]');
        if (directChild && directChild.parentElement === authorContainer) {
            const index = parseInt(directChild.dataset.key);
            if (index !== selected) {
                selected = index;
                authorContainer.scrollLeft = selected * authorContainer.offsetWidth;
                
                authors.forEach(author => {
                    author.removeAttribute('data-selected');
                });
                authorSelect.querySelectorAll('button').forEach(button => {
                    button.removeAttribute('data-selected');
                });

                authorSelect.querySelectorAll('button')[selected].setAttribute('data-selected', '');
                authors[selected].setAttribute('data-selected', '');

                displayAuthorData(
                    authors[selected].dataset.name,
                    authors[selected].dataset.quote,
                    authors[selected].dataset.description,
                    authors[selected].dataset.funFact,
                    authors[selected].dataset.spotify,
                    authors[selected].dataset.linkedin
                );
            } else {
                // scroll to quote
                const quote = document.querySelector('[data-author-quote]');
                quote.scrollIntoView({ behavior: 'smooth' });
            }
            
        }
    });

    // display author data
    function displayAuthorData(name, quote, description, funFact, spotify, linkedin) {
        document.querySelector('[data-author-name]').textContent = `- ${name}`;
        document.querySelector('[data-author-quote]').textContent = quote || 'No quote available';
        document.querySelector('[data-author-description]').textContent = description || 'No description available';
        document.querySelector('[data-author-funfact]').textContent = funFact || 'No fun fact available';

        if (spotify) {
            document.querySelector('[data-author-spotify]').classList.remove('hidden');
            document.querySelector('[data-author-spotify]').href = spotify;
        } else {
            document.querySelector('[data-author-spotify]').classList.add('hidden');
        }
        
        document.querySelector('[data-author-linkedin]').href = linkedin || '#';
    }
</script>