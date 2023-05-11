@switch(Route::current()->getName())
    @case('Shipping.PilihDocking')
        <div class="row justify-content-center">
            <div class="col-12 col-lg-3 mb-3 ">
                <a class="btn btn-lg btn-secondary " style="width:100%;" href="{{'/prod/shipping/scan/from/SHIPPING'}}"><i class="fa-solid fa-truck-ramp-box"></i> SHIPPING AOP</a>
            </div>
            <div class="col-12 col-lg-3 mb-3 ">
                <a class="btn btn-lg btn-secondary " style="width:100%;" href="{{'/prod/shipping/scan/from/FSCM'}}"><i class="fa-solid fa-truck-ramp-box"></i> FSCM</a>
            </div>
            <div class="col-12 col-lg-3 mb-3 ">
                <a class="btn btn-lg btn-secondary " style="width:100%;" href="{{'/prod/shipping/scan/from/DELSI'}}"><i class="fa-solid fa-truck-ramp-box"></i> DELTA SILICON</a>
            </div>
            <div class="col-12 col-lg-3 mb-3 ">
                <a class="btn btn-lg btn-secondary " style="width:100%;" href="{{'/prod/shipping/scan/from/NUSAMETAL'}}"><i class="fa-solid fa-truck-ramp-box"></i> NUSAMETAL</a>
            </div>
        </div>
        @break
    @case(2)

        @break
    @default

@endswitch
