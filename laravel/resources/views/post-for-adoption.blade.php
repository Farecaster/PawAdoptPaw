@extends('layout.app')
@section('content')

    <div class="d-flex justify-content-center align-items-center postform">
        <div class="py-2 text-center">
            <h2>Adoption Form</h2>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center postform">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('post-for-adoption.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container border p-3">
                <h4 class="mb-3">Pet Details</h4>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="name">Pet Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="age">Age:</label>
                        <input type="text" id="age" name="age" class="form-control" required
                            value="{{ old('age') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="species">Species:</label>
                        <select id="species" name="species" class="form-control" required>
                            <option value="" {{ old('species') == '' ? 'selected' : '' }}>Choose...</option>
                            <option value="Dog" {{ old('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                            <option value="Cat" {{ old('species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="breed">Breed:</label>
                        <input type="text" id="breed" name="breed" class="form-control" required
                            value="{{ old('breed') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="" {{ old('species') == '' ? 'selected' : '' }}>Choose...</option>
                            <option value="Male" {{ old('species') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('species') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="region">Region:</label>
                        <select id="region" name="region" class="form-control" required>
                            <option value="" {{ old('region') == '' ? 'selected' : '' }}>Choose...</option>
                            <option value="Abra" {{ old('region') == 'Abra' ? 'selected' : '' }}>Abra</option>
                            <option value="Agusan del Norte" {{ old('region') == 'Agusan del Norte' ? 'selected' : '' }}>Agusan del Norte</option>
                            <option value="Agusan del Sur" {{ old('region') == 'Agusan del Sur' ? 'selected' : '' }}>Agusan del Sur</option>
                            <option value="Aklan" {{ old('region') == 'Aklan' ? 'selected' : '' }}>Aklan</option>
                            <option value="Albay" {{ old('region') == 'Albay' ? 'selected' : '' }}>Albay</option>
                            <option value="Antique" {{ old('region') == 'Antique' ? 'selected' : '' }}>Antique</option>
                            <option value="Apayao" {{ old('region') == 'Apayao' ? 'selected' : '' }}>Apayao</option>
                            <option value="Aurora" {{ old('region') == 'Aurora' ? 'selected' : '' }}>Aurora</option>
                            <option value="Basilan" {{ old('region') == 'Basilan' ? 'selected' : '' }}>Basilan</option>
                            <option value="Bataan" {{ old('region') == 'Bataan' ? 'selected' : '' }}>Bataan</option>
                            <option value="Batanes" {{ old('region') == 'Batanes' ? 'selected' : '' }}>Batanes</option>
                            <option value="Batangas" {{ old('region') == 'Batangas' ? 'selected' : '' }}>Batangas</option>
                            <option value="Benguet" {{ old('region') == 'Benguet' ? 'selected' : '' }}>Benguet</option>
                            <option value="Biliran" {{ old('region') == 'Biliran' ? 'selected' : '' }}>Biliran</option>
                            <option value="Bohol" {{ old('region') == 'Bohol' ? 'selected' : '' }}>Bohol</option>
                            <option value="Bukidnon" {{ old('region') == 'Bukidnon' ? 'selected' : '' }}>Bukidnon</option>
                            <option value="Bulacan" {{ old('region') == 'Bulacan' ? 'selected' : '' }}>Bulacan</option>
                            <option value="Cagayan" {{ old('region') == 'Cagayan' ? 'selected' : '' }}>Cagayan</option>
                            <option value="Camarines Norte" {{ old('region') == 'Camarines Norte' ? 'selected' : '' }}>Camarines Norte</option>
                            <option value="Camarines Sur" {{ old('region') == 'Camarines Sur' ? 'selected' : '' }}>Camarines Sur</option>
                            <option value="Camiguin" {{ old('region') == 'Camiguin' ? 'selected' : '' }}>Camiguin</option>
                            <option value="Capiz" {{ old('region') == 'Capiz' ? 'selected' : '' }}>Capiz</option>
                            <option value="Catanduanes" {{ old('region') == 'Catanduanes' ? 'selected' : '' }}>Catanduanes</option>
                            <option value="Cavite" {{ old('region') == 'Cavite' ? 'selected' : '' }}>Cavite</option>
                            <option value="Cebu" {{ old('region') == 'Cebu' ? 'selected' : '' }}>Cebu</option>
                            <option value="Compostela Valley" {{ old('region') == 'Compostela Valley' ? 'selected' : '' }}>Compostela Valley</option>
                            <option value="Cotabato" {{ old('region') == 'Cotabato' ? 'selected' : '' }}>Cotabato</option>
                            <option value="Davao del Norte" {{ old('region') == 'Davao del Norte' ? 'selected' : '' }}>Davao del Norte</option>
                            <option value="Davao del Sur" {{ old('region') == 'Davao del Sur' ? 'selected' : '' }}>Davao del Sur</option>
                            <option value="Davao Occidental" {{ old('region') == 'Davao Occidental' ? 'selected' : '' }}>Davao Occidental</option>
                            <option value="Davao Oriental" {{ old('region') == 'Davao Oriental' ? 'selected' : '' }}>Davao Oriental</option>
                            <option value="Dinagat Islands" {{ old('region') == 'Dinagat Islands' ? 'selected' : '' }}>Dinagat Islands</option>
                            <option value="Eastern Samar" {{ old('region') == 'Eastern Samar' ? 'selected' : '' }}>Eastern Samar</option>
                            <option value="Guimaras" {{ old('region') == 'Guimaras' ? 'selected' : '' }}>Guimaras</option>
                            <option value="Ifugao" {{ old('region') == 'Ifugao' ? 'selected' : '' }}>Ifugao</option>
                            <option value="Ilocos Norte" {{ old('region') == 'Ilocos Norte' ? 'selected' : '' }}>Ilocos Norte</option>
                            <option value="Ilocos Sur" {{ old('region') == 'Ilocos Sur' ? 'selected' : '' }}>Ilocos Sur</option>
                            <option value="Iloilo" {{ old('region') == 'Iloilo' ? 'selected' : '' }}>Iloilo</option>
                            <option value="Isabela" {{ old('region') == 'Isabela' ? 'selected' : '' }}>Isabela</option>
                            <option value="Kalinga" {{ old('region') == 'Kalinga' ? 'selected' : '' }}>Kalinga</option>
                            <option value="La Union" {{ old('region') == 'La Union' ? 'selected' : '' }}>La Union</option>
                            <option value="Laguna" {{ old('region') == 'Laguna' ? 'selected' : '' }}>Laguna</option>
                            <option value="Lanao del Norte" {{ old('region') == 'Lanao del Norte' ? 'selected' : '' }}>Lanao del Norte</option>
                            <option value="Lanao del Sur" {{ old('region') == 'Lanao del Sur' ? 'selected' : '' }}>Lanao del Sur</option>
                            <option value="Leyte" {{ old('region') == 'Leyte' ? 'selected' : '' }}>Leyte</option>
                            <option value="Maguindanao" {{ old('region') == 'Maguindanao' ? 'selected' : '' }}>Maguindanao</option>
                            <option value="Marinduque" {{ old('region') == 'Marinduque' ? 'selected' : '' }}>Marinduque</option>
                            <option value="Masbate" {{ old('region') == 'Masbate' ? 'selected' : '' }}>Masbate</option>
                            <option value="Metro Manila" {{ old('region') == 'Metro Manila' ? 'selected' : '' }}>Metro Manila</option>
                            <option value="Misamis Occidental" {{ old('region') == 'Misamis Occidental' ? 'selected' : '' }}>Misamis Occidental</option>
                            <option value="Misamis Oriental" {{ old('region') == 'Misamis Oriental' ? 'selected' : '' }}>Misamis Oriental</option>
                            <option value="Mountain Province" {{ old('region') == 'Mountain Province' ? 'selected' : '' }}>Mountain Province</option>
                            <option value="Negros Occidental" {{ old('region') == 'Negros Occidental' ? 'selected' : '' }}>Negros Occidental</option>
                            <option value="Negros Oriental" {{ old('region') == 'Negros Oriental' ? 'selected' : '' }}>Negros Oriental</option>
                            <option value="Northern Samar" {{ old('region') == 'Northern Samar' ? 'selected' : '' }}>Northern Samar</option>
                            <option value="Nueva Ecija" {{ old('region') == 'Nueva Ecija' ? 'selected' : '' }}>Nueva Ecija</option>
                            <option value="Nueva Vizcaya" {{ old('region') == 'Nueva Vizcaya' ? 'selected' : '' }}>Nueva Vizcaya</option>
                            <option value="Occidental Mindoro" {{ old('region') == 'Occidental Mindoro' ? 'selected' : '' }}>Occidental Mindoro</option>
                            <option value="Oriental Mindoro" {{ old('region') == 'Oriental Mindoro' ? 'selected' : '' }}>Oriental Mindoro</option>
                            <option value="Palawan" {{ old('region') == 'Palawan' ? 'selected' : '' }}>Palawan</option>
                            <option value="Pampanga" {{ old('region') == 'Pampanga' ? 'selected' : '' }}>Pampanga</option>
                            <option value="Pangasinan" {{ old('region') == 'Pangasinan' ? 'selected' : '' }}>Pangasinan</option>
                            <option value="Quezon" {{ old('region') == 'Quezon' ? 'selected' : '' }}>Quezon</option>
                            <option value="Quirino" {{ old('region') == 'Quirino' ? 'selected' : '' }}>Quirino</option>
                            <option value="Rizal" {{ old('region') == 'Rizal' ? 'selected' : '' }}>Rizal</option>
                            <option value="Romblon" {{ old('region') == 'Romblon' ? 'selected' : '' }}>Romblon</option>
                            <option value="Samar" {{ old('region') == 'Samar' ? 'selected' : '' }}>Samar</option>
                            <option value="Sarangani" {{ old('region') == 'Sarangani' ? 'selected' : '' }}>Sarangani</option>
                            <option value="Siquijor" {{ old('region') == 'Siquijor' ? 'selected' : '' }}>Siquijor</option>
                            <option value="Sorsogon" {{ old('region') == 'Sorsogon' ? 'selected' : '' }}>Sorsogon</option>
                            <option value="South Cotabato" {{ old('region') == 'South Cotabato' ? 'selected' : '' }}>South Cotabato</option>
                            <option value="Southern Leyte" {{ old('region') == 'Southern Leyte' ? 'selected' : '' }}>Southern Leyte</option>
                            <option value="Sultan Kudarat" {{ old('region') == 'Sultan Kudarat' ? 'selected' : '' }}>Sultan Kudarat</option>
                            <option value="Sulu" {{ old('region') == 'Sulu' ? 'selected' : '' }}>Sulu</option>
                            <option value="Surigao del Norte" {{ old('region') == 'Surigao del Norte' ? 'selected' : '' }}>Surigao del Norte</option>
                            <option value="Surigao del Sur" {{ old('region') == 'Surigao del Sur' ? 'selected' : '' }}>Surigao del Sur</option>
                            <option value="Tarlac" {{ old('region') == 'Tarlac' ? 'selected' : '' }}>Tarlac</option>
                            <option value="Tawi-Tawi" {{ old('region') == 'Tawi-Tawi' ? 'selected' : '' }}>Tawi-Tawi</option>
                            <option value="Zambales" {{ old('region') == 'Zambales' ? 'selected' : '' }}>Zambales</option>
                            <option value="Zamboanga del Norte" {{ old('region') == 'Zamboanga del Norte' ? 'selected' : '' }}>Zamboanga del Norte</option>
                            <option value="Zamboanga del Sur" {{ old('region') == 'Zamboanga del Sur' ? 'selected' : '' }}>Zamboanga del Sur</option>
                            <option value="Zamboanga Sibugay" {{ old('region') == 'Zamboanga Sibugay' ? 'selected' : '' }}>Zamboanga Sibugay</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" class="form-control" required
                            value="{{ old('description') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="img">Image:</label>
                        <input type="file" id="img" name="img" class="form-control-file form-control" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Post" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection



{{-- @extends('layout.app')

@section('content')
    <section id="login" class="login section-padding">
        
        <div class="login-content">
            <h1 class="h2-content text-black">POST ADOPTION FORM</h1>
        </div>

        <div class="login-container">
            <form action="{{ route('post-for-adoption.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" name="pet_name" placeholder="Pet Name" id="pet_name" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="age" placeholder="Age" id="age" required>
                </div>
                <div class="mb-3">
                    <select name="species" id="species" required>
                        <option value="">Select Species</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" name="breed" placeholder="Breed" id="breed" required>
                </div>
                <div class="mb-3">
                    <select name="region" id="region" required>
                        <option value="">Select Region</option>
                        <!-- Add options for regions here -->
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" name="description" placeholder="Description" id="description" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="image" id="image" required>
                </div>
                <button type="submit" class="btn-login">Submit</button>
            </form>
            <div class="signup-link">
                <a href="{{ route('login') }}">
                    <p>Already have an account?</p>
                </a>
            </div>
        </div>
    </section>
@endsection --}}
