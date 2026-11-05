
// TAHAP 1 SIP-IB | PIC: Anggota 1. Echo hanya diaktifkan jika Reverb dikonfigurasi.
if (import.meta.env.VITE_REVERB_APP_KEY) {
    import('./echo');
}

document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('[data-sidebar-toggle]');
    const sidebar = document.querySelector('#sidebar');
    if (!menuButton || !sidebar) return;

    const setOpen = (isOpen) => {
        document.body.classList.toggle('sidebar-open', isOpen);
        menuButton.setAttribute('aria-expanded', String(isOpen));
    };

    menuButton.addEventListener('click', () => {
        setOpen(!document.body.classList.contains('sidebar-open'));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') setOpen(false);
    });

    document.addEventListener('click', (event) => {
        if (
            document.body.classList.contains('sidebar-open') &&
            !sidebar.contains(event.target) &&
            !menuButton.contains(event.target)
        ) {
            setOpen(false);
        }
    });
});
