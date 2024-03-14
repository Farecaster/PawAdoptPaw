@extends('layout.app')

<!--Pet profile section-->
@section('content')
    <section id="tips" class="tips section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h1><b>Tips</b></h1>
                        <p>Here are some tips on how to take good care of your pets</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="tip">
                            <div class="tip-img">
                                <img src="{{ asset('assets/bengal.jpg') }}" alt="...">
                                <div class="icon"><a href="https://www.thesprucepets.com/first-time-dog-owners-tips-1117335"><i class="bi bi-lightbulb"></i></a></div>
                            </div>
                            
                            
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="tip">
                            <div class="tip-img">
                                <img src="{{ asset('assets/tre.jpg') }}" alt="...">
                                <div class="icon"><a href="https://www.wikihow.pet/Take-Care-of-a-Dog"><i class="bi bi-lightbulb"></i></a></div>
                            </div>
                         
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="tip">
                            <div class="tip-img">
                                <img src="{{ asset('assets/german.jpg') }}" alt="...">
                                <div class="icon"><a href="https://www.pawlicy.com/blog/dog-care-tips/"><i class="bi bi-lightbulb"></i></a></div>
                            </div>
                            
                        </div>
                    </div>   
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
