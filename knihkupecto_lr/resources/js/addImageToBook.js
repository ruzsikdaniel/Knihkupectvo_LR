document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image-upload');
    const gallery = document.getElementById('thumbnail-gallery');

    if (!imageInput || !gallery) {
        console.warn('Chýba element #image-upload alebo #thumbnail-gallery.');
        return;
    }

    imageInput.addEventListener('change', function () {
        for (const file of this.files) {
            if (!file.type.startsWith('image/')) {
                console.error(`Súbor ${file.name} nie je obrázok.`);
                continue;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'm-1');
                img.style.maxWidth = '100px';
                gallery.appendChild(img);
            };

            reader.onerror = function () {
                console.error(`Chyba pri načítaní súboru ${file.name}.`);
            };

            reader.readAsDataURL(file);
        }
    });
});
