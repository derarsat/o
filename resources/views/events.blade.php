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

        .event:nth-child(even) img {
            order: 2
        }

        .event:nth-child(even)>div {
            order: 1
        }
    </style>

</head>

<body class=" text-white font-Morn">
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
                    <img src="{{ asset('img/onze.svg') }}" class="h-24" alt="ONZE">
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
                    <img src="{{ asset('img/onze.svg') }}" class="h-24" alt="ONZE">
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
                            <img src="{{ asset('img/onze.svg') }}" class="h-24" alt="ONZE">
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
            <!-- Loop -->
            <div class="pt-24 pb-16">
                <h2 class="text-6xl">ONZE DJs</h2>
                <div class="max-w-5xl mx-auto mt-24">
                    <div class="flex flex-col gap-12">
                        @foreach($events as $event)
                        <div class="bg-white p-4 grid grid-cols-1 lg:grid-cols-2 gap-12 font-semibold event">
                            <img src="{{ @App::make('url')->to('/').'/storage'.$event->image }}" alt="">
                            <div class="flex flex-col gap-6 mt-6 text-black">
                                <h1 class="text-5xl font-semibold">{{$event->title}}</h1>
                                <p class="font-semibold">{{$event->desc}}</p>
                                <div class="flex items-center gap-4">
                                    <div>
                                        <span class="font-semibold block">Duration</span>
                                        <span class="text-primary font-semibold">{{$event->duration}} minutes</span>
                                    </div>
                                    <div>
                                        <span class="font-semibold block">PRICE PER PERSON</span>
                                        <span class="text-primary font-semibold">{{$event->price}} AED</span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    {{ $event->date }}
                                </div>

                                <div style="height:1px" class="w-full bg-black bg-opacity-20 my-3"></div>

                                <p class="font-semibold">{{$event->hint}}</p>
                                <p id="res" href="#" class="text-primary cursor-pointer"> / BOOK EVENT</p>
                            </div>
                        </div>

                        @endforeach
                    </div>
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
                    <img src="{{ asset('img/onze.svg') }}" class="w-16" alt="ONZE">
                </div>
            </div>
            <div class="pt-12 pb-6 flex items-center justify-between w-full">
                <p href="#" class="text-primary cursor-pointer" id="res2">/ BOOK NOW</p>
                <span :class="showFooter && 'text-primary font-semibold transform lg:translate-x-[-28rem] duration-700'" @click="showFooter = !showFooter" class="cursor-pointer transition block">Opening Hours</span>
            </div>
            <div class="flex justify-end">
                <transition name="list2">
                    <div class="flex gap-4 flex-wrap [&>*]:flex-shrink-0 " v-show="showFooter">
                        <div class="font-medium flex flex-col">
                            <span>MON</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->mon_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->mon_close}}"></span>
                        
                        </div>
                        <div class="font-medium flex flex-col">
                            <span>TUE</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->tue_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->tue_close}}"></span>
                        
                        </div>
                        <div class="font-medium flex flex-col">
                            <span>WED</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->wed_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->wed_close}}"></span>
                        
                        </div>
                        <div class="font-medium flex flex-col">
                            <span>THU</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->thu_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->thu_close}}"></span>
                        
                        </div>
                        <div class="font-medium flex flex-col">
                            <span>FRI</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->fri_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->fri_close}}"></span>
                        </div>
                        <div class="font-medium flex flex-col">
                            <span>SAT</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->sat_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->sat_close}}"></span>
                        
                        </div>
                        <div class="font-medium flex flex-col">
                            <span>SUN</span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->sun_open}}"></span>
                            <span class="text-sm"><input class="font-medium h-[13px] bg-transparent border-none p-0" type="time" disabled value="{{$hours->sun_close}}"></span>
                        
                        </div>
                    </div>
                </transition>
            </div>
        </div>
        <div class="flex justify-center">
            <span id="year" class="mr-1"> </span> &#169; ONZE RESTAURANT. ALL Rights Reserved
        </div>
    </div>

    <style>
        #trigger {
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
            renderer: 'svg',
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
    </script>
    <script>
          let year = new Date().getFullYear()
        document.getElementById("year").innerText= year
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
</body>

</html>