@extends('layouts.main')

@section('title', 'Admin - Zmeniť knihu')

@section('content')

    <section id="book-add">
        <form action="/add" method="POST">
            <div id="book-add-galery">
                <div id="book-add-galery-foto" class="col-5 col-lg-4">
                    <div class="d-flex flex-column">
                        <section id="item-gallery">
                            <div id="add-foto-center">
                                <label for="foto-add" id="foto-add-label">+</label>
                                <input id="foto-add" name="foto-books" type="file" accept="image/jpeg, image/png, image/jpg" style="display: none;">
                            </div>
                            <div id="thumbnail-gallery">
                                <img src="/images/thumb.jpg" alt="Obalka knihy" id="foto-1" class="img-fluid book-thumbnail">
                                <img src="/images/thumb.jpg" alt="Miniatúra 1" id="foto-2" class="img-fluid book-thumbnail">
                                <img src="/images/thumb.jpg" alt="Miniatúra 2" id="foto-3" class="img-fluid book-thumbnail">
                                <img src="/images/thumb.jpg" alt="Miniatúra 3" id="foto-4" class="img-fluid book-thumbnail">
                                <img src="/images/thumb.jpg" alt="Miniatúra 4" id="foto-5" class="img-fluid book-thumbnail">
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-6 col-sm-7" id="item-page-add">
                    <section id="item-page">
                        <h1>Základné údaje</h1>
                        <div id="item-title">
                            <dl>
                                <dt><label for="add-book-title">Názov knihy:</label></dt>
                                <dd><input id = "add-book-title" type="text" maxlength="20"></dd>
                                <dt><label for="add-book-author">Autor knihy:</label></dt>
                                <dd><input id="add-book-author" type="text" maxlength="20"></dd>
                            </dl>
                        </div>
                    </section>
                    <section id="item-details">
                        <dl id="book-details">
                            <dt>Žáner:</dt>
                            <dd id="book-genre"><input id = "add-book-genre" type="text" maxlength="30"></dd>

                            <dt>Jazyk:</dt>
                            <dd id="book-lang"><input id = "add-book-lang" type="text" maxlength="14"></dd>

                            <dt>Počet strán:</dt>
                            <dd id="book-pages"><input id = "add-book-pages" type="text" maxlength="20"></dd>

                            <dt>Vydavateľstvo:</dt>
                            <dd id="book-publisher"><input id = "add-book-publisher" type="text" maxlength="15"></dd>

                            <dt>Rok vydania:</dt>
                            <dd id="book-year"><input id = "add-book-year" type="text" minlength="4" maxlength="4"></dd>

                            <dt><label for="book-more">Popis:</label></dt>
                            <dd><textarea id="book-more" rows="5" cols="25" maxlength="1500" required></textarea></dd>
                        </dl>
                        <div id="category-header">
                            <dl>
                                <dt>
                                    <p id="category-name">Kategória</p>
                                </dt>
                                <dd id="book-publisher"><input id = "add-book-publisher" type="text" placeholder="Kategória 1"></dd>
                                <dd id="book-publisher"><input id = "add-book-publisher" type="text" placeholder="Kategória 2"></dd>
                                <dd id="book-publisher"><input id = "add-book-publisher" type="text" placeholder="Kategória 3"></dd>
                            </dl>
                        </div>
                    </section>
                    <div id="item-status">
                        <div id="item-stock">
                            <div class="book-about-add">
                                <label for="stock"><b>Stav</b></label>
                                <br>
                                <label for="ano" id="ano-stock">je na sklade</label>
                                <input id="ano" type="radio" value="1" name="stock">
                                <input id="number-ano" type="number" placeholder="Pocet" value="3" name="stock">
                            </div>
                            <div class="book-about-add">
                                <label for="nie" id="nie-stock">nie je na sklade</label>
                                <input id="nie" type="radio" value="2" name="stock" class="col">
                            </div>
                        </div>
                        <div id="item-price">
                            <p><b>Cena:</b></p>
                            <div class="book-about-add">
                                <input id="item-count" type="number" min="1" max="10000" value="1">
                                <label for="book-price-gross">€</label>

                            </div>
                            <div class="book-about-add">
                                <input class="item-count" type="number" min="1" max="100000" value="1">
                                <label for="book-price-net">€ bez DPH</label>
                            </div>
                        </div>
                        <section id="submit">
                            <button id="change-book">Vymazať z katalogu</button>
                            <button id="delete-book">Pridať zmeny</button>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </section>

<script>
    let newimage = document.getElementById("foto-add");
    newimage.onchange = function(){
        let foto1 = document.getElementById("foto-1"); //main foto
        let foto2 = document.getElementById("foto-2"); //miniatura 1
        let foto3 = document.getElementById("foto-3"); //miniatura 2
        let foto4 = document.getElementById("foto-4"); //miniatura 3
        let foto5 = document.getElementById("foto-5"); //miniatura 4

        /*check if we have already have a foto*/
        if(foto1.src.includes("thumb")){
            foto1.src = URL.createObjectURL(newimage.files[0]);
        }
        else if(foto2.src.includes("thumb")){
            foto2.src = URL.createObjectURL(newimage.files[0]);
        }
        else if(foto3.src.includes("thumb")){
            foto3.src = URL.createObjectURL(newimage.files[0]);
        }
        else if(foto4.src.includes("thumb")){
            foto4.src = URL.createObjectURL(newimage.files[0]);
        }
        else if(foto5.src.includes("thumb")){
            foto5.src = URL.createObjectURL(newimage.files[0]);
        }
    }
</script>
@endsection
