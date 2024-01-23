@extends('layout.app');

@section('content');
<section id="pet" class="pet section-padding">
    <div class="container ">
        <div class="row g-3 justify-content-center">
            <div class="row row-cols-1 row-cols-lg-4 g-4 py-5">
                <a href="Chloe.html">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/siamese.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chloe</h5>
                                <p class="card-title"> A vocal and affectionate Siamese cat. </p>
                            </div>
                            <div class="d-flex justify-content-around mb-3">
                                <button class="btn btn-primary">Click for more</button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="oliver.html">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/mainecoon.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Oliver</h5>
                                <p class="card-title"> A gentle giant with a laid-back demeanor..</p>
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
                            <img src="assets/persian.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cleo</h5>
                                <p class="card-title"> A litter-trained regal and elegant Persian cat. </p>
                            </div>
                            <div class="d-flex justify-content-around mb-3">
                                <button class="btn btn-primary">Click for more</button>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/bengal.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Milo</h5>
                            <p class="card-title"> An adventurous and playful Bengal cat. </p>
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
                            <img src="assets/ragdoll.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Lina</h5>
                                <p class="card-title"> A laid-back and affectionate Ragdoll cat. </p>
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