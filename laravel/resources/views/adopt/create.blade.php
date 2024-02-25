@extends('layout.app')

@section('content')
    <div class="container">
        <div class="form-container1">
            <h1 class="mb-4">Pet Adoption Application Form</h1>
            <form action="{{ route('pet.adopt.store', ['pet' => $pet]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" id="contactName" name="name" required
                        value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="contactAddress" name="address" required
                        value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="contactCity" name="city" required
                        value="{{ old('city') }}">
                </div>

                <div class="form-group">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="tel" class="form-control" id="contactNumber" name="contact_number"
                        placeholder="+639" required value="{{ old('contact_number') }}">
                </div>

                <div class="form-group">
                    <h2>Veterinary Information:</h2>
                    <p>Are you committed to providing regular veterinary care for your pet, including vaccinations and
                        preventative medications?</p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="veterinaryInformation"
                            name="veterinary_information" value="true" required>
                        <label class="form-check-label" for="veterinaryInformation">Yes, I am committed.</label>
                    </div>
                </div>

                <div class="form-group">
                    <h2>Declaration:</h2>
                    <p>By checking this box, I acknowledge that adopting a pet is a long-term commitment. I understand the
                        financial, emotional, and time responsibilities involved in caring for a pet. I agree to provide a
                        loving and safe environment for my adopted pet and to prioritize their well-being.</p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="veterinaryInformation" name="adoption_agreement"
                            value="true" required>
                        <label class="form-check-label" for="veterinaryInformation">I acknowledge and agree to the
                            terms.</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reason">Why do you want to adopt a pet?</label>
                    <textarea class="form-control" id="additionalComments" name="additional_comment" rows="4"
                        placeholder="Any additional comments or questions">{{ old('additional_comment') }}</textarea>
                </div>

                <button type="submit" class="btn btn-dark" id="submitAdoptionRequest">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

@endsection
