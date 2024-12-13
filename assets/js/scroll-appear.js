const observerOptions = {
    root: null,
    rootMargin: '0px 0px -15% 0px',
    threshold: 0
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('appear');
        }
    });
}, observerOptions);

document.querySelectorAll('[data-scroll-appear]').forEach((item) => {
    observer.observe(item);
});
