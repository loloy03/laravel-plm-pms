<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* Optional: Customize styles as needed */
        .swiper-container {
            width: 100%;
            max-width: 650px; /* Adjust max-width as needed */
            margin: 0 auto; /* Center the container */
        }

        .swiper-slide {
            position: relative;
            text-align: center;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            max-height: 400px; /* Adjust height as needed */
            object-fit: cover;
        }

        .book-appointment {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Patient Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-center">
                            <!-- Swiper -->
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <img src="https://medicosfamilyclinic.com/wp-content/uploads/2020/06/medical-clinic.jpg" alt="Slide 1">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://impeccabuild.com.au/wp-content/uploads/2020/07/Medical-Clinic-Interior-Design-Ideas-Medical-Fitouts-ImpeccaBuild-3-scaled.jpg" alt="Slide 2">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://ik.imagekit.io/parlon/Parlon%20Photos/48/Verzosa-Derma-03.jpeg" alt="Slide 3">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLrW9uwUoWRFQ6hDakerCRcTgMyZhLV68ddg&usqp=CAU" alt="Slide 4">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://www.dcms.uscg.mil/Portals/10/DOL/BaseNCR/img/clinicPhoto.png" alt="Slide 5">
                                    </div>
                                    <!-- Add more slides as needed -->
                                </div>
                            </div>
                            <!-- End of Swiper -->
                            <div class="mt-4 book-appointment">
                                <p class="text-lg font-semibold text-red-700">Pamantasan ng Lungsod ng Maynila UHS</p>
                                <a href="{{ route('appointmentspage') }}" class="inline-block px-6 py-3 mt-4 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-700">Book an appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 5000, // Change slide every 5 seconds
            },
        });
    </script>
</body>

</html>
