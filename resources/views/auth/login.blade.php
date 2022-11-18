    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="h-screen flex items-center justify-center">

                <form autocomplete="off" method="POST" action="{{ route('login') }}" class="w-[28rem] bg-gray-100 border-2 border-gray-300  py-12 px-6 rounded-md">
                    <img src="{{ asset('img/onze.svg') }}" alt="ONZE" class="w-24 mx-auto mb-6">
                    @csrf
                    <div class="input-group ">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                        @error('email')
                        <span class="error-label" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group ">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="off">
                        @error('password')
                        <span class="error-label" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="remember" class="flex items-center gap-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember Me
                    </label>
                    <button type="submit" class="bg-primary text-white w-full block py-2.5 rounded-md mt-4">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </body>

    </html>