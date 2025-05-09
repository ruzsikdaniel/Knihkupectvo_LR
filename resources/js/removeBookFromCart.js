document.addEventListener('DOMContentLoaded', () => {
    console.log("removeFromCart.js načítaný");

    document.querySelectorAll('.item-delete').forEach(button => {
        button.addEventListener('click', function () {
            const bookId = this.dataset.bookId;

            if (!bookId) {
                console.warn('Chýba data-book-id');
                return;
            }

            fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ book_id: bookId })
            })
                .then(res => res.json())
                .then(data => {
                    const item = document.getElementById(`cart-item-${bookId}`);
                    if (item) item.remove();

                    // aktualizuj celkovu sumu
                    ['total-price-lg', 'total-price-md'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.innerText = 'Suma: ' + data.cart_total + ' €';
                    });

                    const count = document.getElementById('item-count');
                    if (count) count.innerText = data.item_count;

                    if (data.item_count === 0) {
                        document.getElementById('cart').innerHTML = '<p>Váš košík je prázdny.</p>';
                    }

                    alert(data.message);
                })
                .catch(err => {
                    console.error('Chyba pri odstraňovaní:', err);
                    alert("Nepodarilo sa odstrániť produkt.");
                });
        });
    });
});
