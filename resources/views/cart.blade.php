@extends('layout')

@section('title', 'Panier')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Accueil</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Panier</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)

            <h2>{{ Cart::count() }} article(s) dans votre panier</h2>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <!--<div class="cart-table-description">{{ $item->model->details }}</div>-->
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Supprimer</button>
                            </form>

                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Sauvegarder</button>
                            </form>
                        </div>
                        <div>
                          <select class="quantity" data-id="{{ $item->rowId }}">
                              @for ($i = 1; $i < 5 + 1 ; $i++)
                                  <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                              @endfor
                              {{-- <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                              <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                              <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                              <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                              <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option> --}}
                            </select>
                        </div>
                        <div>{{ presentPrice($item->subtotal) }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

            <!--<a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="#">
                    <input type="text">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div>  end have-code-container -->

            <div class="cart-totals">
                <div class="cart-totals-left">

                </div>

                <div class="cart-totals-right">
                    <div>
                      <!--  Sous total <br>
                        Taxes (13%)<br>-->
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        <!--{{ presentPrice(Cart::subtotal()) }} <br>
                        {{ presentPrice(Cart::tax()) }} <br>-->
                        <span class="cart-totals-total">{{ presentPrice(Cart::subtotal()) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">Continuer votre shopping</a>
                <a href="/404" class="button">Procéder au paiement</a>
            </div>

            @else

                <h3>Il y a aucun article dans votre panier !</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button button-continue">Continuer votre shopping</a>
                <div class="spacer"></div>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{ Cart::instance('saveForLater')->count() }} article(s) sauvegardé(s) pour plus tard</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <!--<div class="cart-table-description">{{ $item->model->details }}</div>-->
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Supprimer</button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Ajouter au panier</button>
                            </form>
                        </div>

                        <div>{{ $item->model->presentPrice() }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3 class="no-save">Vous avez aucun article sauvegardé.</h3>

            @endif

        </div>

    </div> <!-- end cart-section -->


@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection
