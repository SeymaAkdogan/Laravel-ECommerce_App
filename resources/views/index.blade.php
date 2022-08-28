<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <title>Home Page</title>
    <style>
        .menu:hover {

            color: #FF4500;
        }

        .card:hover img {
            transition-timing-function: ease-in;
            -webkit-transform: scale(1);
            transform: scale(1.1);
        }
    </style>
</head>

<body onscroll="navFunction()" style="overflow-x: hidden;">

    @include('partials.navbar-index')

    <main class="" style="background-color: #151515;">
        <!-- EXPLANATION -->
        <div class="justify-center items-center pt-20 text-white" style="height: 250px;">

            <h1 class="text-center" style="font-size: 40px;">Explore Categories</h1>
            <hr class="w-40 text-center mx-auto mt-8" style="color: #EE4000;height: 2px;text-align: center;">
        </div>
        <!-- CONTENT -->
        <div class="content mt-3">

            <div class="row px-3">
                @foreach($categories as $category)
                <div class="col-md-4" style="border: 1px solid white;border-left: none;border-color: #B3B3B3;">
                    <div class="card my-5 mx-4" style="border: none;">
                        <a href="{{ url('/categories/' . $category->category_id) }}" class="">
                            <img src="/image/{{$category['imageUrl']}}" class="card-img-top section h-72" alt="...">
                            <p class="text-gray-400 text-center text-lg pt-4 uppercase" style="background-color: #151515;">{{$category['name']}}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </main>



    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script>
        function navFunction() {

            if (window.scrollY >= 150) {
                document.getElementById("navbar").className = "w-full text-white bg-black pt-1 pb-1  fixed-top";

            } else {
                document.getElementById("navbar").className = "w-full text-white bg-transparent pt-8  fixed-top";
            }
        }
    </script>
</body>

</html>
