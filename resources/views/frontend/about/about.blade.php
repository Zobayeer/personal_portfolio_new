@php

$about = App\Models\about::find(1);
$multiImg = App\Models\multiImage::all();

@endphp


<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach($multiImg as $item)
                    <li>
                        <img class="dark" src="{{ asset($item->multi_img) }}">
                        <img class="light" src="{{ asset($item->multi_img) }}">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">About me</span>
                        <h2 class="title">{{ $about->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="assets/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $about->short_desc }}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
