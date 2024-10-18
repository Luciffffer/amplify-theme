<?php

get_header();
global $wp;

setup_postdata($post);

// $allComments = get_comments(array(
//     'post_id' => get_the_ID(),
//     'status' => 'approve'
// ));

$topLayerComments = get_comments(array(
    'post_id' => get_the_ID(),
    'parent' => 0
));

function recursiveChildrenComments($commentId) {
    $childrenComments = get_comments(array(
        'post_id' => get_the_ID(),
        'parent' => $commentId
    ));

    $commentsArray = [];

    foreach ($childrenComments as $comment) {
        array_push($commentsArray, $comment);
        $commentsArray = [...$commentsArray, ...recursiveChildrenComments($comment->comment_ID)];
    }

    return $commentsArray;
}

foreach ($topLayerComments as $comment) {
    $comment->comment_children = recursiveChildrenComments($comment->comment_ID);
}
?>

<section>

    <div class="px-6 pt-16 text-white bg-black relative ">
        <div class="max-w-7xl mx-auto flex flex-col jusitfy-center gap-16 relative">
            <div aria-hidden="true" class="w-64 aspect-square absolute -top-40 -translate-x-1/2 left-14">
                <div class="relative w-full h-full">
                    <div class="w-full h-full bg-white bg-opacity-50 rounded-full blur-[670px]"></div>
                </div>
            </div>
            <div class="pt-24 flex flex-col gap-12 items-center">
                <h1 class="font-heading text-heading-lg text-center"><?php the_title(); ?></h1>

                <?php 
                    $terms = get_the_terms( get_the_ID(), 'genre' );
                    if (!empty($terms) && !is_wp_error($terms)) :                          
                ?>

                    <ul class="text-button-base flex flex-wrap justify-center gap-3">
                        <?php foreach ($terms as $term) : ?>

                            <li class="rounded-md px-6 py-2 border-2 white-border-button-colors">
                                <a href="<?php echo get_term_link( $term ); ?>">
                                    <?php echo $term->name; ?>
                                </a>
                            </li>
                        
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>

            </div>

            <div class="max-w-[24.1rem] w-full flex mx-auto aspect-[2/3] rounded-3xl -mb-48 relative">
                <div data-cover-left class="w-full h-full conic-gradient-artist-cover-left rounded-l-3xl"></div>
                <div data-cover-right class="w-full h-full conic-gradient-artist-cover-right rounded-r-3xl"></div>
                <div 
                    style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"
                    class="bg-cover bg-white absolute max-w-sm aspect-[2/3] rounded-3xl w-[99%] left-1/2 -translate-x-1/2 top-1/2 shadow-card -translate-y-1/2"
                ></div>
            </div>

        </div>
    </div>

    <div class="pt-64 px-6">
        <div class="max-w-7xl mx-auto flex flex-col gap-9">

            <div class="flex justify-between items-center">
                <div aria-label="Author and article information" class="flex gap-3">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 48, '', '', array( 'class' => 'rounded-full aspect-square w-12' ) ); ?>
                    <div class="flex flex-col">
                        <p><?php echo (empty(get_the_author_meta( 'display_name' )) ? "Unknown" : get_the_author_meta( 'display_name' )); ?></p>
                        <p class="text-body-sm italic"><?php echo get_the_date(); ?></p>
                    </div>
                </div>
           
                <style>
                    .sfsi_widget {
                        height: fit-content !important;
                        min-height: auto !important;
                    }

                    .sfsi_wDiv {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 1rem;
                        margin-top: 1rem;
                        width: 100% !important;
                        margin: 0;
                    }

                    .sfsi_wicons {
                        width: 1.5rem !important;
                        height: 1.5rem !important;
                        margin: 0 !important;
                        background-size: cover;
                        background-repeat: no-repeat;
                    }

                    .sfsi_wicons * {
                        width: 1.5rem !important;
                        height: 1.5rem !important;
                    }

                    .sfsi_wicons img {
                        display: none;
                    }

                    .sfsi_wDiv .sfsi_wicons:first-child {
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/facebook-icon.svg');
                    }

                    .sfsi_wDiv .sfsi_wicons:nth-child(2) {
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/x-icon.svg');
                    }

                    .sfsi_wDiv .sfsi_wicons:nth-child(3) {
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp-icon.svg');
                    }
                </style>
                <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
                 
                </ul>
            </div>

            <hr class="h-[2px] bg-black rounded-full">

            <div id="article-content" class="flex flex-col gap-6">
                <?php the_content(); ?>
                <hr aria-hidden="true" class="h-[2px] rounded-full bg-black" style="padding: 0 !important;">
            </div>
        </div>
    </div>

</section>

<section class="py-12 px-6">
    <div class="w-full mx-auto flex flex-col gap-9">
        <h2 class="font-heading text-heading-sm">Comments</h2>
        
        <div data-main-comment-container>
            <form data-comment-main-placeholder action="#" class="flex gap-3 items-start">
                <img aria-hidden src="<?php echo is_user_logged_in() ? get_avatar_url(get_current_user_id()) : get_avatar_url(0); ?>" alt="Default user picture" class="w-12 h-12 aspect-square rounded-full">
                
                <button data-comment-main-form-button class="w-full bg-neutral-50 rounded-md p-2 focus:outline-none active:bg-neutral-100 text-left text-neutral-500">
                    Leave a comment...
                </button>
            </form>

            <form data-comment-form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" class="flex w-full gap-3 hidden">
                
                <img aria-hidden src="<?php echo is_user_logged_in() ? get_avatar_url(get_current_user_id()) : get_avatar_url(0); ?>" alt="Default user picture" class="w-12 h-12 aspect-square rounded-full">

                <div class="flex flex-col gap-6 w-full">
                    <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
                    <input type="hidden" name="comment_parent" value="0" />

                    <div class="flex flex-col gap-3">
                        <div>
                            <label for="comment" class="sr-only">Comment</label>
                            <textarea
                                name="comment" 
                                id="comment" 
                                cols="30" 
                                rows="4" 
                                class="w-full bg-neutral-50 p-2 rounded-lg focus:outline-primary-50" 
                                placeholder="Comment"
                                required
                            ></textarea>
                            <span id="comment-error" class="text-red-500 text-body-sm hidden" data-comment-error></span>
                        </div>

                        <?php if (!is_user_logged_in()) : ?>
                            <div>
                                <label for="author" class="sr-only">Name</label>
                                <input 
                                    type="text" 
                                    name="author" 
                                    id="author" 
                                    class="w-full bg-neutral-50 rounded-md focus:outline-primary-50 p-2" 
                                    placeholder="Display name"
                                    required
                                >
                                <span id="author-error" class="text-red-500 text-body-sm hidden" data-author-error></span>
                            </div>

                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="w-full bg-neutral-50 rounded-md focus:outline-primary-50 p-2" 
                                    placeholder="Email"
                                    required
                                >
                                <span id="email-error" class="text-red-500 text-body-sm hidden" data-email-error></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="flex gap-1 flex-row-reverse justify-end items-center">
                        <button type="submit" class="primary-button-colors text-button-base px-6 py-2 rounded-md">Post Comment</button>
                        <button data-comment-cancel class="black-button-colors text-button-base px-6 py-2 rounded-md">Cancel</button>
                    </div>
                </div>

            </form>
        </div>

        <div>
            <?php if ($topLayerComments) : ?>
            
                <ul class="flex flex-col gap-6">
                    <?php foreach ($topLayerComments as $comment) : ?>
                        <li class="flex flex-col gap-6">
                            <div class="flex gap-3" id="comment-<?php echo $comment->comment_ID; ?>">
                                <img aria-hidden src="<?php echo get_avatar_url($comment->user_id); ?>" alt="User picture" class="w-12 h-12 aspect-square rounded-full">
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2">
                                        <p class="text-body-sm font-semibold"><?php echo $comment->comment_author; ?></p>
                                        <?php if ($comment->user_id == $post->post_author) : ?>
                                            <span class="text-body-sm text-primary">Author</span>
                                        <?php endif; ?>
                                        <p class="text-body-sm text-neutral-500"><?php echo convertDateTimeToHumanReadable($comment->comment_date); ?></p>
                                    </div>
                                    <p class="font-medium"><?php echo esc_html($comment->comment_content); ?></p>
                                    <button data-comment-reply data-main data-comment-id="<?php echo $comment->comment_ID ?>" class="text-body-sm text-neutral-500 w-fit">
                                        Reply
                                    </button>
                                </div>
                            </div>
                    
                            <ul class="flex flex-col gap-6 <?php if (empty($comment->comment_children)) echo "hidden"; ?>" aria-label="Reactions">
                                <?php foreach ($comment->comment_children as $childComment) : ?>
                                    <li class="pl-10 flex gap-3" id="comment-<?php echo $childComment->comment_ID; ?>">
                                        <img aria-hidden src="<?php echo get_avatar_url($childComment->user_id); ?>" alt="User picture" class="w-12 h-12 aspect-square rounded-full">
                                        <div class="flex flex-col gap-2">
                                            <div class="flex gap-2">
                                                <p class="text-body-sm font-semibold"><?php echo $childComment->comment_author; ?></p>
                                                <?php if ($childComment->user_id == $post->post_author) : ?>
                                                    <span class="text-body-sm text-primary">Author</span>
                                                <?php endif; ?>
                                                <p class="text-body-sm text-neutral-500"><?php echo convertDateTimeToHumanReadable($childComment->comment_date); ?></p>
                                            </div>
                                            <p class="font-medium"><?php echo esc_html($childComment->comment_content); ?></p>
                                            <button data-comment-reply data-child data-comment-id="<?php echo $childComment->comment_ID ?>" class="text-body-sm text-neutral-500 w-fit">
                                                Reply
                                            </button>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </li>
                    <?php endforeach; ?>
                </ul>

            <?php else : ?>
                <p class="text-center">No comments yet</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    // conic gradient animation
    const coverLeft = document.querySelector('[data-cover-left]');
    const coverRight = document.querySelector('[data-cover-right]');
    const startDegreeLeft = parseInt(getComputedStyle(coverLeft).getPropertyValue('--start-deg'));
    const startDegreeRight = parseInt(getComputedStyle(coverRight).getPropertyValue('--start-deg'));
    let counter = 0;

    window.addEventListener('load', e => {
        window.addEventListener('scroll', handleScollWithCoverAnimation);
    })

    function handleScollWithCoverAnimation(e) {
        if (window.scrollY > 200) {
            window.removeEventListener('scroll', handleScollWithCoverAnimation);
            const interval = setInterval(intervalFunc, 5);

            function intervalFunc() {
                
                if (counter < 45 || counter > 100) {
                    counter += 1;
                } else {
                    counter += 2;
                }

                setDegreeLeft(startDegreeLeft - counter);
                setDegreeRight(startDegreeRight + counter);

                if (counter >= 260) {
                    clearInterval(interval);
                    setDegreeLeft(startDegreeLeft);
                    setDegreeRight(startDegreeRight);
                    counter = 0;
                }
            }
        } 
    };

    function setDegreeLeft(degree) {
        coverLeft.style.setProperty('--start-deg', `${degree}deg`);
    }

    function setDegreeRight(degree) {
        coverRight.style.setProperty('--start-deg', `${degree}deg`);
    }
</script>
<script>
    const commentForm = document.querySelector('[data-comment-form]');
    const commentMainFormButton = document.querySelector('[data-comment-main-form-button]');
    const commentMainPlaceholder = document.querySelector('[data-comment-main-placeholder]');

    commentForm.parentElement.removeChild(commentForm);

    // copy form & validation

    function copyForm() {
        const commentFormClone = commentForm.cloneNode(true);

        commentFormClone.querySelector('button[type="submit"]').addEventListener('click', e => {
            e.preventDefault();
            const commentTextArea = commentFormClone.querySelector('textarea');

            let valid = true;

            <?php if (!is_user_logged_in()) : ?>

            const aurthorInput = commentFormClone.querySelector('input[name="author"]');
            const emailInput = commentFormClone.querySelector('input[name="email"]');

            if (emailInput.value.trim().match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) === null) {
                emailInput.setAttribute('aria-invalid', 'true');
                emailInput.setAttribute('aria-describedby', 'email-error');
                emailInput.classList.add('border-2', 'border-red-300', "focus:border-red-400", "focus:!outline-none");
                
                const emailError = commentFormClone.querySelector('[data-email-error]');
                emailError.textContent = 'Invalid email';
                emailError.classList.remove('hidden');

                emailInput.focus();
                valid = false;
            } else if (emailInput.hasAttribute('aria-invalid')) {
                emailInput.classList.remove('border-2', 'border-red-300', "focus:border-red-400", "focus:!outline-none");
                emailInput.removeAttribute('aria-invalid');
                emailInput.removeAttribute('aria-describedby');
                commentFormClone.querySelector('[data-email-error]').classList.add('hidden');
            }

            if (aurthorInput.value.trim().length < 2 || aurthorInput.value.length >= 50) {
                aurthorInput.setAttribute('aria-invalid', 'true');
                aurthorInput.setAttribute('aria-describedby', 'author-error');
                aurthorInput.classList.add('border-2', 'border-red-300', "focus:border-red-400", "focus:!outline-none");
                
                const authorError = commentFormClone.querySelector('[data-author-error]');
                authorError.textContent = 'Name must be between 2 and 50 characters';
                authorError.classList.remove('hidden');

                aurthorInput.focus();
                valid = false;
            } else if (aurthorInput.hasAttribute('aria-invalid')) {
                aurthorInput.classList.remove('border-2', 'border-red-300', "focus:border-red-400", "focus:!outline-none");
                aurthorInput.removeAttribute('aria-invalid');
                aurthorInput.removeAttribute('aria-describedby');
                commentFormClone.querySelector('[data-author-error]').classList.add('hidden');
            }

            <?php endif; ?>

            if (commentTextArea.value.trim() === '' || commentTextArea.value.length >= 500) {
                commentTextArea.setAttribute('aria-invalid', 'true');
                commentTextArea.setAttribute('aria-describedby', 'comment-error');
                commentTextArea.classList.add('border-2', 'border-red-300', "focus:border-red-400", "focus:!outline-none");
                
                const commentError = commentFormClone.querySelector('[data-comment-error]');
                commentError.textContent = 'Comment must be between 1 and 500 characters';
                commentError.classList.remove('hidden');

                commentTextArea.focus();
                valid = false;
            } else if (commentTextArea.hasAttribute('aria-invalid')) {
                commentTextArea.classList.remove('border-2', 'border-red-300', "focus:border-red-400", "focus:!outline-none");
                commentTextArea.removeAttribute('aria-invalid');
                commentTextArea.removeAttribute('aria-describedby');
                commentFormClone.querySelector('[data-comment-error]').classList.add('hidden');
            }

            if (!valid) return;

            commentFormClone.submit();
        });

        return commentFormClone;
    }

    // add main comment

    const mainCommentContainer = document.querySelector('[data-main-comment-container]');

    commentMainFormButton.addEventListener('click', e => {
        e.preventDefault();
        commentMainPlaceholder.classList.add('hidden');
        const commentFormClone = copyForm();
        mainCommentContainer.appendChild(commentFormClone);
        commentFormClone.classList.remove('hidden');
        commentFormClone.querySelector('textarea').focus();

        // add cancel button event
        commentFormClone.querySelector('[data-comment-cancel]').addEventListener('click', e => {
            e.preventDefault();
            commentFormClone.parentElement.removeChild(commentFormClone);
            commentMainPlaceholder.classList.remove('hidden');
        });
    });


    // add child comment to comment

    const commentReplyButtons = document.querySelectorAll('[data-comment-reply]');

    function replyEventListener(e) {
        e.preventDefault();
        const commentId = e.target.getAttribute('data-comment-id');
        const commentFormClone = copyForm();
        const isMain = e.target.hasAttribute('data-main');

        commentFormClone.querySelector('input[name="comment_parent"]').value = commentId;
        commentFormClone.classList.remove('hidden');
        commentFormClone.classList.add('pl-10');
        
        // add form to the right position depending on if it's a reaction to a child comment or a main comment
        const ul = e.target.parentElement.parentElement.parentElement.querySelector('ul');
        if (isMain) {
            if (ul.classList.contains('hidden')) {
                ul.classList.remove('hidden');
            }

            ul.prepend(commentFormClone);
        } else {
            // add next to the child comment
            e.target.parentElement.parentElement.after(commentFormClone);
        }

        // manage event listeners
        e.target.removeEventListener('click', replyEventListener);
        const replyButton = e.target;
        commentFormClone.querySelector('[data-comment-cancel]').addEventListener('click', e => {
            e.preventDefault();
            commentFormClone.parentElement.removeChild(commentFormClone);
            replyButton.addEventListener('click', replyEventListener);
            if (isMain && ul.querySelectorAll('li').length === 0) {
                ul.classList.add('hidden');
            }
        });
    }

    commentReplyButtons.forEach(button => {
        button.addEventListener('click', replyEventListener);
    });

    // add child comment to child comment

    const childCommentReplyButtons = document.querySelectorAll('[data-child-comment-reply]');

</script>
<?php

get_footer();

?>