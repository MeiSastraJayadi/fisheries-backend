<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Fisheries | Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="h-screen flex justify-center items-center px-9" style="background-color: #FCFCFC;">
        <div class="flex items-center py-7 px-8 pr-12 bg-white shadow-xl ring-1 w-5/12 rounded-lg">
            <img src="assets/fisheries.png" class="w-3/12 h-3/12 mr-4"/>
            <div class="w-full">
                <h2 class="text-3xl font-extrabold mb-3 text-gray-900">Login</h2>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col py-1 mb-1">
                        <label class="ml-1">Email</label>
                        <input name="email" type="email" class="border-gray-400 border rounded-lg pl-2 py-1 text-gray-600 w-full"/>
                    </div>
                    <div class="flex flex-col py-1 mb-2">
                        <label class="ml-1">Password</label>
                        <input name="password" type="password" class="border-gray-400 border rounded-lg pl-2 py-1 text-gray-600 w-full"/>
                    </div>
                    <div>
                    </div>
                    @if(session() -> has('errorMessage'))
                        <div class="px-2 pt-2">
                            <div class="alert alert-info" role="alert">
                                {{ session('errorMessage') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        </div>
                    @elseif($errors -> first())
                        <div class="px-2 pt-2">
                            <div class="alert alert-info" role="alert">
                                {{ $errors -> first() }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="ml-1 mt-2 text-white bg-blue-700 hover:bg-blue-800 font-bold px-4 py-2 rounded-lg">Login</button>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>
