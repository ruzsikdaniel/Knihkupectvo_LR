document.addEventListener('DOMContentLoaded', function () {
    console.log('addBookToCart.js načítaný'); // TEST


    // nacitaj a over .add-to-cart
    const button = document.querySelectorAll('.add-to-cart');
    if(!button.length)
        return;

    // pozri ktory .add-to-cart bol kliknuty
    button.forEach(button => {
        button.addEventListener('click', function (){
            const bookId = this.getAttribute('data-book-id');   // najdi data-book-id atribut knihy

            // posli POST spravu na backend
            fetch('/cart/add', {
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
            .then(response =>
                response.json().then(data => ({
                    ok: response.ok,
                    status: response.status,
                    body: data
                }))
            )
            .then(({ ok, body }) => {
                if (!ok) {
                    alert(body.message || 'Chyba pri pridávaní do košíka.');
                    return;
                }

                alert(body.message);
            })

            // zachyt error pocas JSON komunikacie
            .catch(error => {
                console.error('Chyba pri pridávaní do košíka:', error);
                alert('Nepodarilo sa spojiť so serverom.')
            });
        });
    })
});
