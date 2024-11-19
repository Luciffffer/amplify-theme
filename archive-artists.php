<?php

require_once get_template_directory() . '/partials/functions/page-starter.php';

$options = [
    'post_type' => 'artists',
    'posts_per_page' => -1,
];
$selectedGenre = null;
$selectedOrder = "newest";

if (!empty($_GET['genre'])) {
    $selectedGenre = get_term_by('slug', $_GET['genre'], 'genre');

    if (!$selectedGenre) {
        wp_redirect(get_post_type_archive_link('artists'));
        exit;
    }

    $options['tax_query'] = [
        [
            'taxonomy' => 'genre',
            'field' => 'id',
            'terms' => $selectedGenre->term_id,
            'hide_empty' => false
        ]
    ];
}

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

$artists = get_posts($options);

get_header();

ob_start();

?>

<h1 class="font-heading text-heading-lg text-center md:text-heading-xl">
    <?php echo ucfirst($selectedGenre->name ?? "All"); ?> Artists
</h1>

<?php

pageStarter(ob_get_clean());

?>

<section class="px-6 py-6">

    <form action="#" aria-label="Filters" class="max-w-7xl mx-auto">
        <ul class="flex flex-col gap-3 md:flex-row md:gap-6 items-center">

            <li class="hidden lg:block">
                <fieldset class="[&_input]:hidden">
                    <div class="flex justify-between items-center">
                        <div class="flex gap-3 [&>label]:border-2 [&>label]:border-black [&>label]:flex [&>label]:justify-center [&>label]:items-center [&>label]:w-max h-12 [&>label]:px-6 [&>label]:rounded-md [&>label]:text-button-base genre-radio [&>label]:transition-colors [&>label]:duration-200 [&>label]:cursor-pointer">
                            <label for="all">
                                All
                                <input type="radio" name="genre" id="all" value="" <?php if (!$selectedGenre) echo 'checked'; ?>>
                            </label>
                            <?php
                            // Get 3 genres based on the number of artists in each genre
                            $genres = get_terms([
                                'taxonomy' => 'genre',
                                'hide_empty' => false,
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'number' => 3
                            ]);

                            if ($selectedGenre) :
                                ?>
                                <label for="<?php echo $selectedGenre->slug; ?>">
                                    <?php echo $selectedGenre->name; ?>
                                    <input type="radio" name="genre" id="<?php echo $selectedGenre->slug; ?>" value="<?php echo $selectedGenre->slug; ?>" checked>
                                </label>
                                <?php
                            endif;

                            $foundDuplicate = false;
                            foreach ($genres as $key => $genre) {
                                if ($selectedGenre && $key == 2 && !$foundDuplicate) {
                                    break;
                                }

                                if ($selectedGenre && $selectedGenre->slug == $genre->slug) {
                                    $foundDuplicate = true;
                                    continue;
                                };
                                ?>
                                <label for="<?php echo $genre->slug; ?>">
                                    <?php echo $genre->name; ?>
                                    <input 
                                        type="radio" 
                                        name="genre" 
                                        id="<?php echo $genre->slug; ?>" 
                                        value="<?php echo $genre->slug; ?>" 
                                        <?php if ($selectedGenre && $selectedGenre->slug == $genre->slug) echo 'checked'; ?>>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </fieldset>
            </li>

            <script defer>

            const genreRadio = document.querySelector('.genre-radio');

            genreRadio.addEventListener('change', e => {
                const url = new URL(window.location.href);

                if (e.target.value === '') {
                    url.searchParams.delete('genre');
                } else {
                    url.searchParams.set('genre', e.target.value);
                }
                
                window.location.href = url.href;
            });

            </script>

            <hr aria-hidden class="hidden lg:block border-none w-[2px] h-6 bg-neutral-200">

            <li 
                class="*:stroke-neutral-600 flex px-6 gap-3 border border-neutral-600 rounded-md items-center focus-within:border-primary-300 relative h-12 w-full"
                data-genre-input-container
            >
                <svg fill="none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 21L15 15M3 10C3 10.9193 3.18106 11.8295 3.53284 12.6788C3.88463 13.5281 4.40024 14.2997 5.05025 14.9497C5.70026 15.5998 6.47194 16.1154 7.32122 16.4672C8.1705 16.8189 9.08075 17 10 17C10.9193 17 11.8295 16.8189 12.6788 16.4672C13.5281 16.1154 14.2997 15.5998 14.9497 14.9497C15.5998 14.2997 16.1154 13.5281 16.4672 12.6788C16.8189 11.8295 17 10.9193 17 10C17 9.08075 16.8189 8.1705 16.4672 7.32122C16.1154 6.47194 15.5998 5.70026 14.9497 5.05025C14.2997 4.40024 13.5281 3.88463 12.6788 3.53284C11.8295 3.18106 10.9193 3 10 3C9.08075 3 8.1705 3.18106 7.32122 3.53284C6.47194 3.88463 5.70026 4.40024 5.05025 5.05025C4.40024 5.70026 3.88463 6.47194 3.53284 7.32122C3.18106 8.1705 3 9.08075 3 10Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <input 
                    class="w-full focus:outline-none bg-transparent"
                    type="text"
                    placeholder="Find a genre..."
                    aria-expanded="false"
                    aria-controls="genre-results"
                >
                <hr class="block w-[1px] h-3 bg-neutral-600" aria-hidden="true">
                <svg width="22" height="24" viewBox="0 0 22 24" xmlns="http://www.w3.org/2000/svg">
                    <path 
                        d="M4.125 7H17.875M6.41667 12H15.5833M9.16667 17H12.8333" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <div
                    id="genre-results"
                    class="absolute top-full left-0 w-full bg-white rounded-md shadow-lg p-1 border border-neutral-300 hidden min-h-32 opacity-0 transition-all duration-200 max-h-80 overflow-y-scroll genre-results-scroll" 
                    data-genre-results-container
                    aria-live="polite"
                    role="listbox"
                >
                    <ul class="flex justify-center items-center h-full min-h-32 flex-col genre-results-ul *:w-full">

                        <div 
                            class="aspect-square !w-9 rounded-full conic-gradient-loader relative before:block before:aspect-square before:!w-[80%] before:rounded-full before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:bg-white animate-spin"
                        >
                            <span class="sr-only">Loading...</span>
                        </div>

                    </ul>
                </div>
            </li>

            <script defer>
            
            const genreContainer = document.querySelector('[data-genre-input-container]');
            const genreResultsContainer = genreContainer.querySelector('[data-genre-results-container]');
            let genreIsOpen = false;

            // Focus the input when the container is clicked
            genreContainer.addEventListener('click', () => {
                genreContainer.querySelector('input').focus();
            });

            // hide/unhide the results container
            genreContainer.addEventListener('click', openGenreContainer);
            genreContainer.addEventListener('focusin', openGenreContainer);
            
            function openGenreContainer() {
                if (genreIsOpen) return;
                window.addEventListener('click', windowClickHandler);
                window.addEventListener('focusin', windowFocusHandler);
                genreIsOpen = true;

                genreResultsContainer.classList.remove('hidden');

                setTimeout(() => {
                    genreResultsContainer.style.opacity = 1;
                    genreResultsContainer.style.transform = 'translateY(0.75rem)';
                    fetchAndDisplayGenres({ target: genreContainer.querySelector('input') });
                }, 10);
            }

            function closeGenreContainer() {
                if (!genreIsOpen) return;
                genreIsOpen = false;
                window.removeEventListener('click', windowClickHandler);
                window.removeEventListener('focusin', windowFocusHandler);

                genreResultsContainer.style.opacity = 0;
                genreResultsContainer.style.transform = 'translateY(0)';

                setTimeout(() => {
                    genreResultsContainer.classList.add('hidden');
                }, 200);
            }

            function windowClickHandler(e) {
                if (!genreContainer.contains(e.target)) {
                    closeGenreContainer();
                }
            }

            function windowFocusHandler(e) {
                if (!genreContainer.contains(e.target)) {
                    closeGenreContainer();
                }
            }

            // Fetch genres from the API
            let timeout = null;

            genreContainer.querySelector('input').addEventListener('input', fetchAndDisplayGenres);

            async function fetchAndDisplayGenres(e) {
                const input = e.target.value;

                clearTimeout(timeout);

                timeout = setTimeout(async () => {
                    const response = await fetch(`<?php echo get_rest_url(null, '/wp/v2/genre?search=') ?>${input}`);
                    const data = await response.json();

                    genreResultsContainer.querySelector('ul').innerHTML = '';

                    data.forEach(genre => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');

                        // match current url to see if a genre is already selected and change the url accordingly
                        const url = new URL(window.location.href);
                        const genreParam = url.searchParams.get('genre');

                        if (genreParam === genre.slug) {
                            url.searchParams.delete('genre');
                            a.classList.add('selected-genre');
                        } else if (genreParam) {
                            url.searchParams.set('genre', genre.slug);
                        } else {
                            url.searchParams.append('genre', genre.slug);
                        }

                        a.href = url.href;
                        a.textContent = genre.name;
                        a.textContent[0].toUpperCase();

                        li.appendChild(a);

                        const ul = genreResultsContainer.querySelector('ul');

                        if (genreParam === genre.slug) {
                            ul.prepend(li);
                        } else {
                            ul.appendChild(li);
                        }
                    });

                    if (data.length === 0) {
                        const li = document.createElement('li');
                        li.textContent = 'No genres found';
                        li.classList.add('text-neutral-500', 'px-6', 'py-2');
                        genreResultsContainer.querySelector('ul').appendChild(li);
                    }
                }, 200);
            }

            // accessibility

            genreContainer.addEventListener('keydown', e => {
                if (e.key === 'Escape') {
                    const input = genreContainer.querySelector('input');

                    if (input === document.activeElement) {
                        input.blur();
                        closeGenreContainer();
                        return;
                    }

                    genreContainer.querySelector('input').focus();
                }
            });
            </script>

            <hr aria-hidden class="hidden md:block border-none w-[2px] h-6 bg-neutral-200">

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
        foreach ($artists as $artist) :
            $artistMeta = get_post_meta($artist->ID, 'artist', true);
            $artistImage = get_the_post_thumbnail_url($artist->ID, 'medium');
            $artistName = $artist->post_title;
            $artistGenres = get_the_terms($artist->ID, 'genre');
            $artistLink = get_the_permalink($artist->ID);
            ?>
            <li class="flex flex-col gap-6 justify-between">
                <div class="flex flex-col gap-6">
                    <a href="<?php echo $artistLink; ?>">
                        <img src="<?php echo $artistImage; ?>" alt="<?php echo $artistName; ?>" class="w-full rounded-3xl shadow-card object-cover">
                    </a>
                    <div class="flex flex-col gap-3">
                        <h2 class="font-heading text-heading-sm">
                            <a href="<?php echo $artistLink; ?>"><?php echo $artistName; ?></a>
                        </h2>
                        <?php if ($artistGenres) : ?>
                            <ul class="flex flex-wrap gap-3 items-center">
                                <?php
                                foreach ($artistGenres as $genre) :
                                    ?>
                                    <li>
                                        <?php echo $genre->name; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo $artistLink ?>" class="w-full black-button-colors flex gap-3 justify-center items-center text-button-base rounded-md h-12">
                    Read more
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12L13 18M19 12L13 6M19 12L5 12" stroke="#FBFCFD" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
        <?php 
        endforeach; 
        
        if (empty($artists)) :
            ?>
            <li class="text-center text-neutral-600 py-48 col-span-full">
                No artists found
            </li>
            <?php
        endif;
        ?>

</section>

<?php

get_footer();

?>

