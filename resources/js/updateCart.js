document.addEventListener('DOMContentLoaded', () => {
    console.log("updateCart.js načítaný");

    document.querySelectorAll('.item-count').forEach(input => {
        input.addEventListener('change', function () {
            const bookId = this.dataset.bookId;
            const quantity = parseInt(this.value);

            fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    book_id: bookId,
                    quantity: quantity
                })
            })
                .then(res => {
                    if (!res.ok) throw new Error("Chyba servera");
                    return res.json();
                })
                .then(data => {
                    document.querySelectorAll(`.item-count[data-book-id="${bookId}"]`).forEach(
                        el => {
                            el.value = quantity;
                        });

                    document.querySelectorAll(`#item-total-${bookId}`).forEach(el => {
                        el.innerText = 'Suma: ' + data.item_total + ' €';
                    });

                    ['total-price-lg', 'total-price-md'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.innerText = 'Suma: ' + data.cart_total + ' €';
                    });
                })
                .catch(error => {
                    console.error("Chyba pri update cart:", error);
                    alert("Nepodarilo sa aktualizovať košík.");
                });
        });
    });
});
