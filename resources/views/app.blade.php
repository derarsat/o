<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ONZE</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="./vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js" integrity="sha512-yAr4fN9WZH6hESbOwoFZGtSgOP+LSZbs/JeoDr02pOX4yUFfI++qC9YwIQXIGffhnzliykJtdWTV/v3PxSz8aw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Fav -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- /Fav -->
    <style>
        .list-enter-active,
        .list-leave-active {
            transition: all 0.3s ease;
        }

        .list-enter-from,
        .list-leave-to {
            opacity: 0;
            transform: translateX(30px);
        }

        .list2-enter-active,
        .list2-leave-active {
            transition: all 0.9s ease;
        }

        .list2-enter-from,
        .list2-leave-to {
            opacity: 0;
            transform: translateX(30px);
        }


        body,
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class=" text-white font-Morn">
    <audio controls id="audio" style="display: none">
        <source src="./audio.mpeg">
    </audio>
    <!-- Gift DIalog -->
    <div id="gift" class="w-screen h-screen fixed  items-center top-0 left-0 z-[200] justify-center bg-black bg-opacity-50 " style="display: none;">
        <div class="bg-white px-6 py-12 rounded-md text-black relative w-[40rem] max-w-full">
            <button id="giftCloser" class="absolute top-4 right-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <form action="{{route('voucher')}}" method="post">
                @csrf
                <h2 class="text-3xl font-semibold text-primary mb-6">Gift Vouchers</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="input-group">
                        <label for="name">Full name</label>
                        <input name="name" required type="text">
                    </div>
                    <div class="input-group">
                        <label for="email">Email address</label>
                        <input name="email" required type="email">
                    </div>
                </div>
                <div class="input-group">
                    <label for="message"> Your message</label>
                    <textarea id="message" placeholder="Enter your message" required name="message"></textarea>
                </div>
                <input type="submit" value="Submit" class="bg-primary font-semibold text-white mb-4 cursor-pointer">
            </form>
            <a href="mailto:reservations@onzerestaurant.com">reservations@onzerestaurant.com</a>
            <br>
            <a href="tel:+97142506567">+971 4 250 6567</a>
        </div>
    </div>
    <!-- End Dialog -->
    <div class="bg-black" style="background-image: url({{ asset('img/bg.png') }})">
        <div class="container overflow-x-hidden">
            <div class="lg:flex items-center py-6 justify-between hidden" id="top">
                <div class="flex gap-6 items-center">
                    <a href="/">
                        <img src="{{ asset('img/onze.svg') }}" class="h-24" alt="ONZE">

                    </a>
                    <div class="flex items-center gap-6 z-10">
                        <button @click="showMenu = !showMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                        <transition-group name="list" tag="ul">
                            <div class="flex gap-3" v-show="showMenu">
                                <a href="/#home">Home</a>
                                <a href="/#story">The Story Begins</a>
                                <a href="#menus">Menus</a>
                                <a href="/events">ONZE DJs</a>
                                <span id="giftToggler" class="cursor-pointer">Gift Vouchers</span>
                            </div>
                        </transition-group>
                    </div>
                </div>
                <p class="font-semibold z-10 cursor-pointer" id="res">/ MAKE A RESERVATION</p>

            </div>

            <!-- Mobile MEnu -->
            <div class="lg:hidden items-center py-6 justify-between flex" id="mobiletop">
                <div class="w-full flex gap-6 items-center justify-between">
                    <a href="/">
                        <img src="{{ asset('img/onze.svg') }}" class="h-24" alt="ONZE">

                    </a>
                    <div class="flex items-center gap-6 z-10">
                        <button @click="showMenu = !showMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                    </div>
                </div>
                <transition-group name="list" tag="ul">
                    <div class="flex flex-col p-4 gap-3 bg-black fixed top-0 left-0 w-screen h-screen z-20" v-show="showMenu">
                        <div class="flex justify-between">
                            <div></div>
                            <a href="/">
                                <img src="{{ asset('img/onze.svg') }}" class="h-24" alt="ONZE">

                            </a>
                            <button @click="showMenu = false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <a href="/#home">Home</a>
                        <a href="/#story">The Story Begins</a>
                        <a href="#menus">Menus</a>
                        <a href="/events">ONZE DJs</a>
                        <span id="giftToggler2" class="cursor-pointer">Gift Vouchers</span>
                        <a href="#" class="font-semibold text-primary">/ MAKE A RESERVATION</a>

                    </div>
                </transition-group>
            </div>

            <div class="pt-56 pb-12 lg:pb-56 flex flex-col justify-center relative" id="home">
                <h2 class="text-5xl lg:text-6xl  mt-6 lg:mt-0">UNEXPLORED <br> DESIRES</h2>
                <p id="res3" href="#" class="text-primary font-semibold text-lg mt-4 block cursor-pointer z-10">/ BOOK NOW</p>
                <span class="w-32 lg:block mt-24 hidden -ml-[3.5rem]" id="hint"></span>

                <div id="mainLotti">
                </div>

                <div>
                    <button class="mt-12">
                        <svg id="play" style="display:none" xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                        </svg>
                        <svg id="pause" style="display:none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 py-24  items-center" id="story">
                <img class="order-2 lg:order-1" src="{{ asset('img/bird.png') }}" alt="ONZE">
                <div class="order-1 lg:order-2">
                    <div>
                        <h1 class="text-5xl lg:text-6xl  mb-6">
                            OUR <br> PHILOSOPHY
                        </h1>
                        <p class="mb-3">
                            ONZE is a refreshing escape from the city, offering an exceptional experience of great food amid
                            a lush & green setting.
                        </p>
                        <p>
                            ONZE means 11. In the Japanese culture, the number 11, two digits that when added together
                            result in the number 2, representative of a fiery sprit & success
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-lightPrimary pt-24">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12  items-center ">
                <div>
                    <h1></h1>
                    <div class="text-black">
                        <h1 class="text-5xl lg:text-6xl  mb-6">
                            TASTE <br> OF ONZE
                        </h1>
                        <p class="mb-3">
                            The menu combines Japanese and Peruvian cuisines in an <br> authentic, yet modern way.
                        </p>
                        <p>
                            ONZE means 11. In the Japanese culture, the number 11, two digits that when added together
                            result in the number 2, representative of a fiery sprit & success
                        </p>
                        <a class="text-primary font-semibold mt-4 block" href="/#menus">/ Explore The Menu</a>
                    </div>
                </div>
                <img class="a" src="{{ asset('img/wave.png') }}" alt="ONZE">
            </div>
        </div>
    </div>
    <div class="bg-black pt-24 lg:pt-0">
        <div class="container grid grid-cols-1 lg:grid-cols-3 items-center ">
            <div>
                <h1 class="text-5xl lg:text-6xl  mb-6">
                    MEET <br> THE CHEF
                </h1>
                <p>
                    I???m so excited to design a menu that mixes flavours from Peru and Japan. The dishes I have created are inspired by my travels and contain amazing ingredients such as salt from the mountains of Peru. When guests come and eat with us at Onze, I hope they will be transported to other times of their life through my dishes
                </p>
            </div>
            <div class="col-span-2">
                <img src="{{ asset('img/chef.png') }}" alt="ONZE">
            </div>
        </div>
        <div style="background-image: url({{ asset('img/secbg.png') }})">
            <h1 class="text-5xl lg:text-6xl  pb-12 bg-black">
                <div class="container">
                    DISCOVER <br> THE SPACE
                </div>
            </h1>
            <div class="container pb-24">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-9">
                    <img src="{{ asset('img/plates/1.jpg') }}" alt="ONZE">
                    <img src="{{ asset('img/plates/2.jpg') }}" alt="ONZE">
                    <img src="{{ asset('img/plates/3.jpg') }}" alt="ONZE">
                    <img src="{{ asset('img/plates/4.jpg') }}" alt="ONZE">
                    <img src="{{ asset('img/plates/5.jpg') }}" alt="ONZE">
                    <img src="{{ asset('img/plates/6.jpg') }}" alt="ONZE">
                </div>
            </div>
            <div class="container pb-24" id="menus">
                <h1 class="text-5xl lg:text-6xl  pb-12">
                    EXPLORE OUR MENUS
                </h1>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-16">
                    @foreach($menus as $menu)
                    <a target="_blank" href="{{ @App::make('url')->to('/').'/storage'.$menu->pdf}}" class="hover:text-primary hover:font-medium">
                        <img class="border border-white" src="{{ @App::make('url')->to('/').'/storage'.$menu->image }}" alt="">
                        <h2 class="text-center text-xl mt-3">{{$menu->name}}</h2>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="bg-black mt-12 py-12" style="background-image: url({{ asset('img/secbg.png') }})" id="footer">
        <div class="container">
            <div class="grid grid-cols-1 gap-6 lg:gap-0 lg:grid-cols-3 items-start">
                <div class="flex flex-col gap-3 order-3 lg:order-1">
                    <a href="/#home">Home</a>
                    <a href="/#story">The Story Begins</a>
                    <a href="/#menu">Menus</a>
                    <a href="/events">ONZE DJs</a>
                    <a href="/">Gift Vouchers</a>
                </div>
                <div class="flex justify-start lg:justify-center order-2">
                    <div class="flex gap-0 lg:gap-3 flex-col">
                        <h2 class="text-lg">Contact </h2>
                        <a target="blank" href="mailto:reservations@onzerestaurant.com">reservations@onzerestaurant.com</a>
                        <a target="blank" href="tel:+97142506567">+971 4 250 6567</a>
                    </div>
                </div>
                <div class="flex justify-start lg:justify-end order-1 lg:order-3">
                    <a href="/">
                        <img src="{{ asset('img/onze.svg') }}" class="w-16" alt="ONZE">

                    </a>
                </div>
            </div>
            <div class="pt-12 pb-6 flex items-center justify-between w-full flex-wrap">
                <p href="#" class="text-primary cursor-pointer" id="res2">/ BOOK NOW</p>
                <div>
                    <span :class="showFooter && 'text-primary font-semibold transform self-start  duration-700'" @click="showFooter = !showFooter" class="cursor-pointer transition self-end my-4 block">Opening Hours</span>
                    <transition name="list2">
                        <div class="flex gap-4 flex-wrap [&>*]:flex-shrink-0 " v-show="showFooter">
                            <div class="font-medium flex flex-col">
                                <span>MON</span>
                                <span class="time">{{$hours->mon_open}}</span>
                                <span class="time">{{$hours->mon_close}}</span>

                            </div>
                            <div class="font-medium flex flex-col">
                                <span>TUE</span>
                                <span class="time">{{$hours->tue_open}}</span>
                                <span class="time">{{$hours->tue_close}}</span>

                            </div>
                            <div class="font-medium flex flex-col">
                                <span>WED</span>
                                <span class="time">{{$hours->wed_open}}</span>
                                <span class="time">{{$hours->wed_close}}</span>

                            </div>
                            <div class="font-medium flex flex-col">
                                <span>THU</span>
                                <span class="time">{{$hours->thu_open}}</span>
                                <span class="time">{{$hours->thu_close}}</span>

                            </div>
                            <div class="font-medium flex flex-col">
                                <span>FRI</span>
                                <span class="time">{{$hours->fri_open}}</span>
                                <span class="time">{{$hours->fri_close}}</span>
                            </div>
                            <div class="font-medium flex flex-col">
                                <span>SAT</span>
                                <span class="time">{{$hours->sat_open}}</span>
                                <span class="time">{{$hours->sat_close}}</span>

                            </div>
                            <div class="font-medium flex flex-col">
                                <span>SUN</span>
                                <span class="time">{{$hours->sun_open}}</span>
                                <span class="time">{{$hours->sun_close}}</span>

                            </div>
                        </div>
                    </transition>
                </div>
            </div>
            <div class="flex justify-end">

            </div>
        </div>
        <div class="flex justify-center mt-4">
            <span id="year" class="mr-1"> </span> &#169; ONZE RESTAURANT. ALL Rights Reserved
        </div>
    </div>


    <style>
        #mainLotti {
            position: absolute;
            width: 1500px;
            right: -400px;
            top: -140px
        }

        @media (max-width:690px) {
            #mainLotti {
                position: absolute;
                width: 1000px;
                right: -300px;
                top: -140px
            }
        }

        @media (max-width:450px) {
            #mainLotti {
                position: absolute;
                width: 900px;
                right: -300px;
                top: -150px
            }
        }

        #ttrigger {
            transition: all 500ms linear;
        }

        #view {
            visibility: visible;
            opacity: 1;
            max-height: 500px;
            max-height: 1000px;
            transition: visibility 0s, opacity 0.6s, max-height 0.9s linear;
        }

        .hide {
            visibility: hidden !important;
            opacity: 0 !important;
            max-height: 0px !important;
            max-width: 0px !important;
            transition: max-height 0.3s, opacity 0.6s, visibility 0.9s linear;
        }
    </style>
    <script>
        const {
            createApp
        } = Vue

        createApp({
            delimiters: ['[[', ']]'],
            data() {
                return {
                    showMenu: false
                }
            }
        }).mount('#top')
        createApp({
            delimiters: ['[[', ']]'],
            data() {
                return {
                    showMenu: false
                }
            }
        }).mount('#mobiletop')
        createApp({
            delimiters: ['[[', ']]'],
            data() {
                return {
                    showFooter: false
                }
            }
        }).mount('#footer')

        createApp({
            delimiters: ['[[', ']]'],
            data() {
                return {
                    show: false
                }
            }
        }).mount('#gift')
    </script>
    <script>
        let year = new Date().getFullYear()
        document.getElementById("year").innerText = year
        let closer = document.getElementById("giftCloser")
        let toggler = document.getElementById("giftToggler")
        let toggler2 = document.getElementById("giftToggler2")
        let wrap = document.getElementById("gift")
        toggler.onclick = function() {
            wrap.style.display = "flex"
        }
        toggler2.onclick = function() {
            wrap.style.display = "flex"
        }
        closer.onclick = function() {
            wrap.style.display = "none"
        }
    </script>
    <script>
        lottie.loadAnimation({
            container: document.getElementById("hint"), // the dom element that will contain the animation
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'hint.json' // the path to the animation json
        });
        lottie.loadAnimation({
            container: document.getElementById("mainLotti"), // the dom element that will contain the animation
            renderer: 'canvas',
            loop: true,
            autoplay: true,
            path: 'main.json' // the path to the animation json
        });
    </script>
    <script src="https://www.sevenrooms.com/widget/embed.js"></script>
    <script>
        SevenroomsWidget.init({
            venueId: "onzerestaurant",
            triggerId: "res", // id of the dom element that will trigger this widget
            type: "reservations", // either 'reservations' or 'waitlist' or 'events'
            styleButton: false, // true if you are using the SevenRooms button
            clientToken: "" //(Optional) Pass the api generated clientTokenId here
        })
        SevenroomsWidget.init({
            venueId: "onzerestaurant",
            triggerId: "res2", // id of the dom element that will trigger this widget
            type: "reservations", // either 'reservations' or 'waitlist' or 'events'
            styleButton: false, // true if you are using the SevenRooms button
            clientToken: "" //(Optional) Pass the api generated clientTokenId here
        })
        SevenroomsWidget.init({
            venueId: "onzerestaurant",
            triggerId: "res3", // id of the dom element that will trigger this widget
            type: "reservations", // either 'reservations' or 'waitlist' or 'events'
            styleButton: false, // true if you are using the SevenRooms button
            clientToken: "" //(Optional) Pass the api generated clientTokenId here
        })
    </script>

    <script>
        var times = document.querySelectorAll(".time")
        for (let index = 0; index < times.length; index++) {
            const element = times[index];
            const myTime = element.innerText
            const newText = parseInt(myTime.split(":")[0]) % 12 + ":" + myTime.split(":")[1] + " " + (parseInt(parseInt(myTime.split(":")[0]) / 12) != 1 ? "am" : "pm")
            element.innerText = newText

        }

        let audio = document.getElementById("audio")
        let play = document.getElementById("play")
        let pause = document.getElementById("pause")

        setTimeout(() => {
            pause.style.display = "block"
            audio.play()
            play.style.display = "none"
            pause.style.display = "block"
        }, 4000);

        play.onclick = function() {
            audio.play()
            play.style.display = "none"
            pause.style.display = "block"
        }

        pause.onclick = function() {
            audio.pause()
            pause.style.display = "none"
            play.style.display = "block"
        }
    </script>
</body>

</html>