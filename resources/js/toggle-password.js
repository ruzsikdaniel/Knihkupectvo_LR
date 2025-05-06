document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('uncover-pass');
    const passwordField = document.getElementById('password');
    const icon = toggleBtn?.querySelector('img');

    if (toggleBtn && passwordField) {
        toggleBtn.addEventListener('click', function () {
            const isHidden = passwordField.type === 'password';
            passwordField.type = isHidden ? 'text' : 'password';

            if (icon) {
                icon.src = isHidden ? '/images/eye-slash-icon.png' : '/images/eye-icon.png';
                icon.alt = isHidden ? 'Skryť heslo' : 'Zobraziť heslo';
            }
        });
    }
});
