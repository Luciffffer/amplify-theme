<?php

require_once get_template_directory() . '/partials/functions/page-starter.php';

// $options = null;

// if (!empty($_GET['genre'])) {
//     $selectedGenre = get_terms([
//         'taxonomy' => 'genre',
//         'slug' => $_GET['genre']
//     ]);

//     $options['tax_query'] = [
//         [
//             'taxonomy' => 'genre',
//             'field' => 'term_id',
//             'terms' => $selectedGenre[0]->term_id
//         ]
//     ];
// }

// if (!empty($_GET['order'])) {
//     $selectedOrder = $_GET['order'];
// }

// $artists = get_posts([
//     'post_type' => 'artists',
//     'posts_per_page' => -1,
//     'order' => $selectedOrder ?? 'ASC',
//     $options
// ]);

get_header();

ob_start();

?>

<h1 class="font-heading text-heading-lg text-center md:text-heading-xl">
    <!-- <?php // echo $selectedGenre[0]->name ?? "All"; ?> Artists -->
    Work In Progress
</h1>

<?php

pageStarter(ob_get_clean());

?>

<section class="px-6 py-32">

    <!-- <form action="#" aria-label="Filters">
        <ul>
            <li 
                class="*:stroke-neutral-600 flex px-6 py-3 gap-3 border border-neutral-600 rounded-md items-center focus-within:border-primary-300 relative"
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

            // Focus the input when the container is clicked
            genreContainer.addEventListener('click', () => {
                genreContainer.querySelector('input').focus();
            });

            // hide/unhide the results container when the input is focused
            genreContainer.addEventListener('focusin', () => {
                genreResultsContainer.classList.remove('hidden');

                setTimeout(() => {
                    genreResultsContainer.style.opacity = 1;
                    genreResultsContainer.style.transform = 'translateY(0.75rem)';
                    fetchAndDisplayGenres({ target: genreContainer.querySelector('input') });
                }, 10);
            });

            genreContainer.addEventListener('focusout', () => {
                setTimeout(() => {
                    
                    if (genreContainer.contains(document.activeElement)) {
                        return;
                    }

                    genreResultsContainer.style.opacity = 0;
                    genreResultsContainer.style.transform = 'translateY(0)';

                    setTimeout(() => {
                        genreResultsContainer.classList.add('hidden');
                    }, 200);

                }, 0);
            });

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
                        li.classList.add('text-neutral-500', 'px-3', 'py-2');
                        genreResultsContainer.querySelector('ul').appendChild(li);
                    }
                }, 200);
            }
            </script>

        </ul>
    </form> -->

</section>

<?php

get_footer();

?>

