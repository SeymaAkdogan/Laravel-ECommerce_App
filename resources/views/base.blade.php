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
    a:hover {
        color: #FF4500;
    }
    /* .card:hover img{
      transition-timing-function: ease-in;
      -webkit-transform: scale(1);
	    transform: scale(1.1);
    }

     style="background-color: #151515;"
    */
  </style>
</head>

<body onscroll="navFunction()" style="overflow-x: hidden;">

  @include('partials.navbar-base')

  <main class="">

    <div class="content mt-3">

        @yield('content')
    </div>


  </main>



  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


</body>

</html>
