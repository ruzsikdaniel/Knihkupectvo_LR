document.addEventListener('DOMContentLoaded', function () {
    // load and verify #add-to-cart button
    const button = document.querySelectorAll('.add-to-cart');
    if(!button.length)
        return;

    button.forEach(button => {
        // button #add-to-cart is clicked
        button.addEventListener('click', function (){
            const bookId = this.getAttribute('data-book-id');   // get data-book-id attribute of book

            // send POST to backend route
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

            // collect the JSON response and
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

                alert(body.message); // úspešná hláška
                // TODO: aktualizuj počet kníh v #cart-button
            })

            // catch error during adding process
            .catch(error => {
                console.error('Chyba pri pridávaní do košíka:', error);
                alert('Nepodarilo sa spojiť so serverom.')
            });
        });
    })
});
