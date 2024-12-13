<section class="my-48 px-6">

    <div id="youtube-player" class="max-w-7xl mx-auto aspect-[16/9]">
        <div id="player"></div>
    </div>

</section>

<script defer>

    const youtubeApiScript = document.createElement('script');
    youtubeApiScript.src = 'https://www.youtube.com/iframe_api';
    document.head.appendChild(youtubeApiScript);

    let player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('youtube-player', {
            height: '100%',
            width: '100%',
            videoId: '758wNLIr_4k',
            playerVars: {
                'playsinline': 1
            }
        });
    }

</script>

<!-- <section class="my-48 lg:px-6 lg:mt-0" data-slide-container>
    <div class="max-w-7xl mx-auto aspect-[1/4] relative bg-black lg:bg-transparent lg:aspect-[1/2]" data-slide-sticky>

        <div class="h-screen bg-black sticky top-0 overflow-hidden lg:bg-transparent lg:flex lg:items-center">

            <div class="relative h-full w-full lg:aspect-[16/9] lg:h-auto lg:bg-black">

                <div aria-hidden="true" class="h-full w-full aspect-square absolute top-0 left-0 overflow-hidden">
                    <div class="w-full h-full px-6">
                        <div class="relative w-full h-full max-w-7xl mx-auto">
                            <div class="w-[1000px] aspect-square absolute translate-x-1/2 translate-y-1/2 bottom-0 right-12">
                                <div class="relative w-full h-full">
                                    <div class="w-full h-full bg-radial-gradient-hero blur-3xl"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="sr-only">Who we are</h2>

                <div
                    class="uppercase font-heading font-bold text-[17vw] text-[#E8DBF8] opacity-25 whitespace-nowrap overflow-hidden absolute h-[23vw] flex top-6 pointer-events-none md:h-[14vw] md:text-[7vw] xl:rotate-90 xl:origin-top-left xl:top-0 xl:left-32" 
                    aria-hidden
                    data-scroll-move-left
                >
                    <span class="h-[23vw] md:h-[14vw] flex gap-[5vw] md:gap-[3vw] items-center" style="transform: translateX(0%);">
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                </div>

                <div
                    class="uppercase font-heading font-bold text-[17vw] text-[#E8DBF8] opacity-25 whitespace-nowrap overflow-hidden absolute h-[23vw] flex bottom-6 pointer-events-none md:h-[14vw] md:text-[7vw]" 
                    aria-hidden
                    data-scroll-move-right
                >
                    <span class="h-[23vw] md:h-[14vw] flex gap-[5vw] md:gap-[3vw] items-center" style="transform: translateX(-19%);">
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                        WHO WE 
                        <span class="font-extralight italic">
                            ARE
                        </span>
                </div>

                <div data-page-1 class="text-white absolute top-1/2 -translate-y-1/2 px-6 w-full">
                    
                    <div class="flex flex-col gap-9 max-w-xl mx-auto">
                        <h3 class="font-heading text-heading-sm">Artists are central</h3>
                        <p>
                            At Amplify, everything revolves around supporting artists and their music. We understand how challenging it can be for new and emerging artists to gain the attention they deserve in the competitive music world. This is where we provide a solution. <span class="text-primary-300">Amplify shines a spotlight on unknown talent</span> by offering them a platform where they can take center stage.
                        </p>
                        <a 
                            href="over"
                            class="font-button-base px-6 py-3 w-fit text-center text-black bg-white rounded-md font-medium flex items-center gap-3 stroke-black"
                        >
                            Read more
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12L13 18M19 12L13 6M19 12L5 12" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                </div>

                <div data-page-2 class="absolute top-1/2 -translate-y-1/2 px-6">

                    <div id="player"><p>This is a video</p></div>

                </div>

                <div data-slide-control class="flex items-center absolute bottom-48 -translate-x-1/2 left-1/2 lg:bottom-[5%]">
                    <button
                        class="aspect-square w-5 group flex items-center justify-center"
                        aria-label="Select short introduction"
                        aria-selected="true"
                    >
                        <div class="aspect-square w-2 rounded-full bg-neutral-600 group-aria-selected:bg-white transition-colors duration-300"></div>
                    </button>
                    <button
                        class="aspect-square w-5 group flex items-center justify-center"
                        aria-label="Select long introduction"
                        aria-selected="false"
                    >
                        <div class="aspect-square w-2 rounded-full bg-neutral-600 group-aria-selected:bg-white transition-colors duration-300"></div>
                    </button>
                </div>                

            </div>

        </div>

    </div>
</section>

<script defer>

const slideContainer = document.querySelector('[data-slide-container]');
const slideSticky = document.querySelector('[data-slide-sticky]');
const slidePages = slideSticky.querySelectorAll('[data-page-1], [data-page-2]');
const slideControls = slideSticky.querySelectorAll('[data-slide-control] button');

const scrollMoveLeft = document.querySelector('[data-scroll-move-left] > span');
const scrollMoveRight = document.querySelector('[data-scroll-move-right] > span');
const translateXLeft = scrollMoveLeft.style.transform.match(/-?\d+/);
const translateXRight = scrollMoveRight.style.transform.match(/-?\d+/);

// check if slideContainer is at the top of the viewport after scroll
let isSticking = false;

window.addEventListener('scroll', () => {
    scrollText(window.scrollY);

    if (slideContainer.getBoundingClientRect().top <= 0 && slideContainer.getBoundingClientRect().bottom >= window.innerHeight) {
        isSticking = true;
    } else {
        isSticking = false;
    }
    
});

// move scroll-move-left and scroll-move-right elements on scroll
function scrollText(scrollY) {
    if (isSticking) {

        const distanceToTop =  slideContainer.getBoundingClientRect().top;

        let newTranslateXLeft = (parseInt(translateXLeft[0]) + distanceToTop * 0.1) % 50;
        let newTranslateXRight = (parseInt(translateXRight[0]) - distanceToTop * 0.1) % 50;

        newTranslateXRight = newTranslateXRight > 0 ? newTranslateXRight - 50 : newTranslateXRight;

        // set new translatex values
        scrollMoveLeft.style.transform = `translateX(${newTranslateXLeft}%)`;
        scrollMoveRight.style.transform = `translateX(${newTranslateXRight}%)`;
    }
}


</script> -->