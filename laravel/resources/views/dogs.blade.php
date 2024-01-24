@extends('layout.app')
@section('content')
    <section id="pet" class="pet section-padding">
        <div class="container ">
            <div class="row g-3 justify-content-center">
                <div class="row row-cols-1 row-cols-lg-4 g-4 py-5">
                    <a href="max.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/labrador1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Max</h5>
                                    <p class="card-title"> An energetic and friendly Labrador.</p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="bella.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/shihtzu.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Bella</h5>
                                    <p class="card-title"> A sweet and affectionate Shih Tzu.</p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="Duke.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/boxer.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Duke</h5>
                                    <p class="card-title"> A playful, friendly and energetic Boxer. </p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/border.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Luna</h5>
                                <p class="card-title"> A highly intelligent and energetic Border Collie. </p>
                            </div>
                            <div class="d-flex justify-content-around mb-3">
                                <button class="btn btn-primary">Click for more</button>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="pet-details.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/german.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Rocky</h5>
                                    <p class="card-title"> A loyal and intelligent German Shepherd. </p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
    </section>
@endsection
