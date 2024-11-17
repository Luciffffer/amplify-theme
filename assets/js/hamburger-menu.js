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
    window.scrollTo(0, 0);

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
            site.style.display = 'none';
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

    site.style.display = 'block';

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


// footer animation
const dots = document.querySelectorAll('[data-lucan] > *');
const randomOrder = Array.from({ length: 20 }, () => Math.floor(Math.random() * 4));
let i = 0;
console.log(randomOrder);

setInterval(() => {
    dots.forEach((dot, index) => {
        if (randomOrder[i] === index) {
            dot.style.animation = 'lucifer-footer-animation 1000ms forwards';
        } else {
            dot.style.animation = 'lucifer-footer-animation 1000ms reverse';
        }
    });
    i++;
    if (i === 20) i = 0;
}, 2000);