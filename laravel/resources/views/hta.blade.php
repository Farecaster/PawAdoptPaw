@extends('layout.app')

@section('content')
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h1 style="color: #272343;"><b>HOW TO ADOPT</b></h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img1">
                        <img src="assets/img3.jpg" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="profile-text">
                        <p>Click on "Pets" from the navbar to see the lovable animals waiting for their forever homes. You
                            can filter the listings based on species. Each pet's profile includes details about their
                            personality, history, and current needs.</p>
                        <p>Take your time to read through the profiles and find a pet that matches your lifestyle,
                            preferences, and the care you can provide. Feel free to reach out if you have any questions or
                            need assistance in making the right choice.</p>
                        <p>Once you've found a pet you'd like to adopt, click on the "Adopt Me" button on their profile to
                            access our online adoption application. Please fill out the form with accurate and detailed
                            information about your living situation, experience with pets, and your plans for caring for the
                            adopted pet.</p>
                        <p>Our adoption team will carefully review your application to ensure that the pet you've chosen is
                            a good fit for your home and lifestyle. We may contact you for additional information or
                            clarification during this process.</p>
                        <p>Once your application is approved, we'll guide you through the final steps to complete the
                            adoption process. Prepare to welcome your new furry friend into your home and provide them with
                            a loving forever family!</p>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="about section-padding">
        <h1 class="text-center">FAQs</h1>
        <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What is your website/app about?
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Welcome to our pet adoption platform!.</strong>Our website and app are dedicated to making pet adoption 
                    a breeze. We connect users with shelters, rescue organizations, and adorable animals in need of forever homes. 
                    Browse profiles, set preferences, and embark on a journey of companionship and love with your new furry friend!
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Is there a mobile version or app available?
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Absolutely! </strong> You can access our services conveniently through our mobile app. Whether you're on the go or relaxing at home, our app makes it easy to find your perfect pet match right from your smartphone.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                There are stray cats in my area. Can Paw-Adopt-Paw help?
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Absolutely!</strong> At Paw-Adopt-Paw, we're passionate about helping all animals in need, 
                    including stray cats.Here's how you can post about the stray cats in your area on our platform:
                    <br>1. Create an Account: To get started, you'll need to create an account on Paw-Adopt-Paw. 
                    Simply click on the "Sign Up" or "Register" button on our website or app, and follow the prompts 
                    to create your account.<br><br>
                    2. Access Your Profile: Once you've created your account, you can access your profile by clicking 
                    on your username or profile picture in the upper right corner of the screen. This will take you to
                     your profile dashboard.<br><br>
                    3. Post a Stray Cat Listing: On your profile dashboard, look for the option to "Post" or "Create Listing." 
                    Click on this button, and you'll be directed to a form where you can provide details about the stray cats
                     in your area. Make sure to fill out all the required fields accurately, including the cat's description, 
                     location, and any relevant information about their health or behavior.<br><br>
                    4. Review and Submit: Before submitting your post, take a moment to review all the details you've entered 
                    to ensure they are correct. Once you're satisfied with the information provided, click the "Post" or "Submit" 
                    button to publish your listing.<br><br>
                    By following these steps, you can effectively post about the stray cats in your area on Paw-Adopt-Paw's platform. 
                    Thank you for your compassion and willingness to help stray animals find loving homes!
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection











































































{{-- @extends('layout.app')
@section('content')
    <section id="about" class="about section-padding">
        <div class="doggy">
            <img src="assets/cute-golden-retriever.jpg" class="img-fluid" alt="Doggy Image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <b>
                            <h1>Ready to Welcome a New Friend?</h1>
                        </b>
                        <b>
                            <p>Follow These Simple Steps:</p>
                        </b>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-6 ps-lg-5 mt-md-5">
                <div class="profile-text">
                    <h2>Explore Available Pets</h2>
                    <p>Click on "Pets" from the navbar to see the lovable animals waiting for their forever homes.
                        You can filter the listings based on species. Each pet's profile includes
                        details about their personality, history, and current needs.</p><br>
                    <h2>Find Your Perfect Match</h2>
                    <p>Take your time to read through the profiles and find a pet that matches your lifestyle,
                        preferences, and the care you can provide. Feel free to reach out if you have any questions
                        or need assistance in making the right choice.</p><br>
                    <h2>Submit an Adoption Application</h2>
                    <p>Once you've found a pet you'd like to adopt, click on the "Adopt Me" button on their profile
                        to access our online adoption application. Please fill out the form with accurate and detailed
                        information about your living situation, experience with pets, and your plans for caring for the
                        adopted pet.</p><br>
                    <h2>Application Review</h2>
                    <p>Our adoption team will carefully review your application to ensure that the pet you've chosen is
                        a good fit for your home and lifestyle. We may contact you for additional information or
                        clarification
                        during this process.</p><br>
                    <h2>Adoption Approval</h2>
                    <p>Once your application is approved, we'll guide you through the final steps to complete the adoption
                        process.
                        Prepare to welcome your new furry friend into your home and provide them with a loving forever
                        family!</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="section-header text-center pb-5">
                    <h5><br>Thank you for choosing to adopt and giving a loving home to a pet in need.<br>
                        Your decision makes a world of difference in the lives of these wonderful animals.</h5>
                </div>
            </div>
        </div>
    </section>
    <!--end pp section-->
@endsection --}}
