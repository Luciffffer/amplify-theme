<?php

function pageStarter(string $innerContent = '') {
    ?>

    <section class="px-6 pt-16 text-white bg-black relative">
        <div aria-hidden="true" class="h-full w-full aspect-square absolute top-0 left-0 overflow-hidden">
            <div class="w-full h-full px-6">
                <div class="relative w-full h-full max-w-7xl mx-auto">
                    <div class="w-[1000px] aspect-square absolute -translate-x-1/2 -translate-y-1/2 top-0 left-12">
                        <div class="relative w-full h-full">
                            <div class="w-full h-full bg-radial-gradient-hero blur-3xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto flex flex-col gap-20 relative">
            <div class="py-40 md:py-32 flex flex-col gap-12 items-center w-full">
                <?php echo $innerContent; ?>
            </div>
        </div>
    </section>

    <?php
}