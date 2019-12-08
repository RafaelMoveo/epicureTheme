<div class="col-6 col-md-4 col-xl-3 text-center">
    <div class="dish-content-div row">
        <a href="#dish{{$dish['id']}}" data-toggle="modal" data-target="#dish{{$dish['id']}}">
            <img src="{{ esc_url($dish['thumbnail']) }}" alt="Dish picture"/>
            <h4>{{ $dish['name'] }}</h4>
            <p>{{ $dish['ingredients'] }}</p>
            <div class="col-12 text-center">
                    @component('partials.dish-type-icons', ['dish' => $dish])
                    @endcomponent
            </div>
            <div class="text-center price-div col-12">
                <div class="row">
                    <div class="col-4 p-0">
                        <hr>
                    </div>
                    <div class="col-4 p-0">
                        <span> &#8362; {{ $dish['price'] }}</span> 
                    </div>
                    <div class="col-4 p-0">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @component('partials.dish-modal', ['dish' => $dish])
    @endcomponent
</div>