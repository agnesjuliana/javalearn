    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a style="display: flex; align-items:center;" href="" class="navbar-brand p-0">
                <h1 class="text-light m-0"><img src="{{asset('landing-asset/img/LgoJava.png')}}" alt="Logo"></h1>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Culture</a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Arts</a>
                            <a href="#" class="dropdown-item">Foods</a>
                            <a href="#" class="dropdown-item">History</a>
                            <a href="#" class="dropdown-item">Articles</a>
                        </div>
                    </div>

                    <a href="#" class="nav-item nav-link">Contact</a>
                </div>
                <a href={{ route('login') }} class="btn btn-primary rounded-pill py-2 px-4">Sign in</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Budaya Untuk Kita</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Pelajari Budaya Untuk Indonesia Yang Lebih
                            Cerah</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Eg: Tari Remo">
                            <button type="button"
                                class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2"
                                style="margin-top: 7px;">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
