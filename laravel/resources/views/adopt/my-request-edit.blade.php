@extends('layout.app')

@section('content')
    <div class="container d-flex justify-content-center postform">

        <form id="adoptionForm" action="" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="contactName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="contactName" name="name" placeholder="Enter your name"
                    required value="{{ $requests->name }}">
            </div>
            <div class="mb-3">
                <label for="contactAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="contactAddress" name="address"
                    placeholder="Enter your address" required value="{{ $requests->address }}"">
            </div>
            <div class="mb-3">
                <label for="contactCity" class="form-label">City</label>
                <input type="text" class="form-control" id="contactCity" name="city" placeholder="City" required
                    value="{{ $requests->city }}">
            </div>
            <div class="mb-3">
                <label for="contactNumber" class="form-label">Contact number</label>
                <input type="text" class="form-control" id="contactNumber" name="contact_number" placeholder="+639"
                    required value="{{ $requests->contact_number }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Veterinary Information:<br>Are you committed
                    to providing regular veterinary care for your pet,
                    including vaccinations and preventative medications?</label>
                <input type="checkbox" class="form-check-input" id="veterinaryInformation" name="veterinary_information"
                    value="true" required>
            </div>
            <div class="mb-3">
                <label class="form-label">By checking this box, I acknowledge that adopting a pet is a long-term
                    commitment. I
                    understand the financial, emotional, and time responsibilities involved in caring for a pet.
                    I agree to provide a loving and safe environment for my adopted pet and to prioritize their
                    well-being.</label>
                <input type="checkbox" class="form-check-input" id="veterinaryInformation" name="adoption_agreement"
                    value="true" required>
            </div>
            <div class="mb-3">
                <label for="additionalComments" class="form-label">Why do you want to adopt a pet?</label>
                <textarea class="form-control" id="additionalComments" name="additional_comment" rows="4"
                    placeholder="Any additional comments or questions">{{ $requests->additional_comment }}</textarea>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submitAdoptionRequest">Submit Request</button>
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

@endsection
