<div class="modal fade" id="dish{{$dish['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close text-left" data-dismiss="modal" aria-label="Close">
                <svg class="d-sm-none" xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13">
                    <g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width=".5">
                        <path d="M1 0l13 13M14 0L1 13"/>
                    </g>
                </svg>
                <svg class="d-none d-sm-inline-block" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                        <path d="M1 1l18 18M19 1L1 19"/>
                    </g>
                </svg>                                
            </button>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0 dish-img" style="background-image: url({{ esc_url($dish['thumbnail']) }})">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center dish-header">
                            <div class="d-inline-block position-relative">
                                <div class="d-none d-md-inline-block desktop-icons-div">
                                    @component('partials.dish-type-icons', ['dish' => $dish])
                                    @endcomponent
                                </div>
                                <h4>{{ $dish['name'] }}</h4>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <p>{{ $dish['ingredients'] }}</p>
                        </div>
                        <div class="col-12 text-center p-3 d-md-none">
                            @component('partials.dish-type-icons', ['dish' => $dish])
                            @endcomponent
                        </div>
                        <div class="text-center price-div col-12"> 
                            <div class="row">
                                <div class="col-4 p-0 text-right left-hr">
                                    <hr>
                                </div>
                                <div class="col-4 p-0">
                                    <span>
                                        <span>&#8362;</span>
                                        {{$dish['price']}}
                                    </span> 
                                </div>
                                <div class="col-4 p-0 text-left right-hr">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <h5> Choose a side </h5>
                        </div>
                        <div class="col-12 radio-input-div">
                            <form>
                            @foreach ($dish['asides'] as $key=>$aside)
                                <div class="control-group">
                                    <label class="control control-radio">
                                        {{$aside['aside']}}
                                            <input type="radio" @if($key == 01)checked='checked'@endif name="aside" id="{{strtolower($aside['aside'])}}" value="{{$aside['aside']}}"/>
                                        <div class="control_indicator"></div>
                                    </label>
                                </div>
                            @endforeach
                            </form>
                        </div>
                        <div class="col-12 text-center changes-h5-div">
                            <h5>Changes</h5>
                        </div>
                        <div class="col-12 checkbox-input-div text-left">
                            <div class="control-group">
                                @foreach($dish['changes'] as $change)
                                    <label class="control control-checkbox">
                                        {{$change['changes']}}
                                            <input type="checkbox" name="changes" value="{{$change['changes']}}"/>
                                        <div class="control_indicator"></div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <h5>Quantity</h5>
                        </div>
                        <div class="col-12 quantity-div">
                            <div class="qty">
                                <span class="minus">&#x2014;</span>
                                <input type="number" class="count" id="dish-{{$dish['id']}}" name="qty" value="1">
                                <span class="plus">	&#xff0b; </span>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" class="btn add-to-bag"
                                    data-id="{{$dish['id']}}"
                                    data-price="{{$dish['price']}}"
                                    data-name="{{ $dish['name'] }}">ADD TO BAG</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>