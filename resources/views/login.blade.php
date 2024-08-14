<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('./assets/bootstrap/css/bootstrap.min.css')}}" />
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
</head>

<body>
    <div class="grid text-center ">

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col card shadow p-3 mb-5 bg-body-tertiary rounded">
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <h1>Connexion</h1>
                    
                    <br> <br>
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>

                    @endif

                    @if ($message = Session::get('error'))
                    <div>{{ $message }}</div><br />
                    @endif

                    <!-- <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1">
                    </div>
                    <div>

                        <input type="password" class="form-control" id="inputPassword4">
                    </div> -->
<!-- 
                    <label for="email">Email</label><br> -->
                    <input type="text" class="form-control" name="email" id="email" placeholder="Saisir l'e-mail ici ..."><br>
<!-- 
                    <label for="password">Mot de passe</label><br> -->
                    <input type="password" class="form-control" name="password" id="password" placeholder="Saisir le mot de passe ici ..."><br>

                    <a href="{{ route('registration') }}">S'inscrire</a><br /><br />

                    <button class="btn btn-primary" type="submit">Soumettre</button>

                </form>
            </div>
            <div class="col"></div>
        </div>


    </div>

</body>

</html>