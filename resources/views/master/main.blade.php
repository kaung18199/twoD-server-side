<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2d project</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- fontawsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2 ">

                <div class="card shadow rounded border" style="width: 18rem;">
                    <ul class="list-group list-group-flush text-center">
                      <li class="list-group-item">
                        <a href="{{ route('dashboard') }}" class=" text-decoration-none text-black"><p>category</p></a>
                      </li>
                      <li class="list-group-item">
                        <a href="{{ route('admin#postList') }}" class=" text-decoration-none text-black"><p>post list</p></a>
                      </li>
                      <li class="list-group-item">
                        <a href="{{ route('admin#userList') }}" class=" text-decoration-none text-black"><p>user list</p></a>
                      </li>
                      <li class="list-group-item">
                        <a href="{{ route('admin#order') }}" class=" text-decoration-none text-black"><p>order list</p></a>
                      </li>
                      <li class="list-group-item">
                        {{-- <a href="{{ route('logout') }}" class=" text-decoration-none text-danger"><p>logout</p></a> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark"> <p class="px-4">logout</p></button>
                        </form>
                      </li>
                    </ul>
                  </div>
            </div>
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>
</body>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>
