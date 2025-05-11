document.addEventListener('DOMContentLoaded', () => {

    console.log('removeBookFromCart.js načítaný'); // TEST

    // nacitaj a over .item-delete
    const button = document.querySelectorAll('.item-delete');
    if(!button.length)
        return;

    // pozri ktory .add-to-cart je kliknuty
    button.forEach(button => {
        button.addEventListener('click', function () {
            const bookId = this.getAttribute('data-book-id');   // najdi data-book-id atribut knihy

            // posli POST spravu na backend
            fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    book_id: bookId
                })
            })

            // ziskaj JSON odpoved a spracuj
            .then(res => res.json())
            .then(data => {
                // najdi element so spravnym #cart-item-${bookId}, a odstran ho
                const item = document.getElementById(`cart-item-${bookId}`);
                if(item)
                    item.remove();

                // aktualizuj celkovu sumu (obe formaty)
                document.querySelectorAll('.total-price-cart').forEach(el => {
                    el.innerText = 'Suma: ' + data.cart_total + ' €';
                });

                // aktualizuj pocet knih
                const count = document.getElementById('item-count');
                if(count)
                    count.innerText = data.item_count;

                // ak po vymazani knihy bude kosik prazdny, zobraz vypis
                if(data.item_count === 0)
                    document.getElementById('cart').innerHTML = '<p>Váš košík je prázdny.</p>';

                alert(data.message);
                window.location.href = '/cart'
            })
            // zachyt error pocas JSON komunikacie
            .catch(err => {
                console.error('Chyba pri odstraňovaní:', err);
                alert("Nepodarilo sa odstrániť produkt.");
            });
        });
    });
});
