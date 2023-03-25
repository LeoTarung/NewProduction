<!DOCTYPE html>
<html lang="en" class="notranslate">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LHP | Template </title>
    {{-- //============[ CSS IN HERE ]============// --}}
    <link rel="stylesheet" type="text/css" href="/UI/CSS/styles.css"/>
    <link rel="stylesheet" type="text/css" href="/UI/CSS/login.css">
    <script src="/UI/JS/fontawesomeV610.js"></script>
</head>

<body>
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myRightCtn p-0">
                        <img src="/UI/IMG/robotnm.jpg" class="rounded shadow" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <form action="{{ url('/login') }}" method="post" class="myForm text-center"  enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                            @csrf
                            <img src="/UI/IMG/logo.png" />
                            @include('partial/sweetallert')
                            <div class="form-group mt-5">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="number" placeholder="NRP" name="nrp" id="nrp" value="{{old('nrp')}}"required autofocus>
                            </div>

                            <div class="form-group ">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-label " type="checkbox" onclick="SeePassword()">
                                <label class="form-label " for="show">Show Password</label>
                            </div>
                            {{-- <div class="form-group " style="font-size: 10px; margin-top:-20px;">
                                <p>Lupa Password? <a class="" href="https://wa.me/+6281280420431">HRD CARE</a></p>
                            </div> --}}
                            <input type="submit" id="submit" class="butt btn" name="submit" value="L O G I N">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //============[ JS IN HERE ]============// --}}
    @include('sweetalert::alert')
    <script src="/UI/JS/scripts.js"></script>
</body>

</html>
