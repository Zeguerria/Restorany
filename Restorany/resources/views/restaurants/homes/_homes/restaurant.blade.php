<!--::exclusive_item_part start::-->
<section class="exclusive_item_part blog_item_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="section_tittle">
                    <p>Restorany Vous</p>
                    <h2>Ouvre ses Portes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($restaurants as $key => $value)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="{{asset($value->le_profil)}}" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>{{$value->nom}}</h3>
                            <p>{{$value->description}}</p>
                            <a href="#" class="btn_3">Consulter <img src="{{asset('restos/img/icon/left_2.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-sm-6 col-lg-4">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="img/food_item/food_item_2.png" alt="">
                    </div>
                    <div class="single_blog_text">
                        <h3>Cremy Noodles</h3>
                        <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                        <a href="#" class="btn_3">Read More <img src="img/icon/left_2.svg" alt=""></a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-lg-4">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="img/food_item/food_item_3.png" alt="">
                    </div>
                    <div class="single_blog_text">
                        <h3>Honey Meat</h3>
                        <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                        <a href="#" class="btn_3">Read More <img src="img/icon/left_2.svg" alt=""></a>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-6 col-lg-4 d-none d-sm-block d-lg-none">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="{{asset('restos/img/food_item/food_item_1.png')}}" alt="">
                    </div>
                    <div class="single_blog_text">
                        <h3>Cremy Noodles</h3>
                        <h3>Cremy Noodles</h3>
                        <h3>Cremy Noodles</h3>
                        <h3>Cremy Noodles</h3>
                        <h3>Cremy Noodles</h3>
                        <h3>Cremy Noodles</h3>
                        <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                        <a href="#" class="btn_3">Read More <img src="img/icon/left_2.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::exclusive_item_part end::-->
