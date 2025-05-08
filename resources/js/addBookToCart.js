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

            // check for correct response
            .then(response => {
                if (!response.ok)
                    throw new Error('HTTP chyba: ' + response.status);
                return response.json();
            })

            // show feedback to user for adding book to cart
            .then(data => {
                alert(data.message);
                // TODO: print amount of books in cart to #cart-button
            })

            // catch error during adding process
            .catch(error => {
                console.error('Chyba pri pridávaní do košíka:', error);
                alert('Chyba pri pridávaní do košíka.')
            });
        });
    })
});
