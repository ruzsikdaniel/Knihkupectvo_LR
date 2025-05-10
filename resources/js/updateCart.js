document.addEventListener('DOMContentLoaded', () => {
    // nacitaj a over .item-count
    const counter = document.querySelectorAll('.item-count');
    if(!counter.length)
        return;

    // pozri ktory .item-count bol zmeneny
    counter.forEach(counter => {
        counter.addEventListener('change', function () {
            // najdi knihu a pocet
            const bookId = this.getAttribute('data-book-id');
            const quantity = parseInt(this.value);

            // posli POST spravu na backend
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

            // ziskaj JSON odpoved a spracuj
            .then(res => {
                if (!res.ok) throw new Error("Chyba servera");
                return res.json();
            })
            .then(data => {
                // najdi vsetky knihy, pre ktore sa ma zmenit pocet
                document.querySelectorAll(`.item-count[data-book-id="${bookId}"]`).forEach(
                    el => {
                        // aktualizuj pocet
                        el.value = quantity;
                    });

                // aktualizuj celkovu cenu pre knihu
                document.querySelectorAll(`#item-total-${bookId}`).forEach(el => {
                    el.innerText = 'Suma: ' + data.item_total + ' €';
                });

                // aktualizuj celkovu cenu kosika
                ['total-price-lg', 'total-price-md'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.innerText = 'Suma: ' + data.cart_total + ' €';
                });
            })
            // zachyt error pocas JSON komunikacie
            .catch(error => {
                console.error("Chyba pri update cart:", error);
                alert("Nepodarilo sa aktualizovať košík.");
            });
        });
    });
});
