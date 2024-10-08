const hamburgerOpen = document.querySelector('[data-hamburger-open]');
const hamburgerClose = document.querySelector('[data-hamburger-close]');
const hamburgerMenu = document.querySelector('[data-hamburger-menu]');
const nav = document.querySelector('nav');
const site = document.querySelector('#site');

let isOpen = false;
let isAnimating = false;

const overlay = document.createElement('div');
overlay.classList.add('hamburger-overlay');

hamburgerOpen.addEventListener('click', (e) => {
    if (isAnimating) return;

    e.preventDefault();
    isOpen = true;
    isAnimating = true;

    site.style.pointerEvents = 'none';
    site.ariaHidden = true;
    site.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';

    document.body.appendChild(overlay);
    document.body.appendChild(hamburgerMenu);
    hamburgerMenu.classList.remove('hidden');

    setTimeout(() => {
        overlay.style.transitionDuration = '0.6s';
        hamburgerMenu.style.transitionDuration = '0.7s';
        overlay.style.transform = 'translateX(0)';
        hamburgerMenu.style.transform = 'translateX(0)';

        document.addEventListener('keydown', keydownHandler);
        setTimeout(() => {
            hamburgerClose.focus();
            isAnimating = false;
        }, 700);
    }, 1);
})

const keydownHandler = (e) => {
    if (e.key === 'Escape') {
        hamburgerClose.focus();
    }
}

hamburgerClose.addEventListener('click', (e) => {
    if (isAnimating) return;

    e.preventDefault();
    isOpen = false;
    isAnimating = true;

    overlay.style.transitionDuration = '0.7s';
    hamburgerMenu.style.transitionDuration = '0.6s';
    overlay.style.transform = 'translateX(100%)';
    hamburgerMenu.style.transform = 'translateX(100%)';
    document.removeEventListener('keydown', keydownHandler);

    setTimeout(() => {
        hamburgerMenu.classList.add('hidden');
        nav.appendChild(hamburgerMenu);
        overlay.remove();
        site.style.overflow = 'auto';
        site.style.pointerEvents = 'auto';
        site.ariaHidden = false;
        document.body.style.overflow = 'auto';
        hamburgerOpen.focus();
        isAnimating = false;
    }, 700);
})

window.addEventListener('resize', (e) => {
    if (isOpen) {
        hamburgerClose.click();
    }
});