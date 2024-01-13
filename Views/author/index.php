<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Timeless One-Page HTML Template</title>

    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="\assets/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="\assets/css/templatemo-style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="text-center tm-site-header">
                    <div class="tm-site-logo"></div>
                    <h1 class="pl-4 tm-site-title">Timeless</h1>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.html">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="listing-page.html">Listing Page</a></li>

                                    <li><a class="dropdown-item" href="detail-page.html">Detail Page</a></li>
                                </ul>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>

                        <div class="ms-4">
                            <a href="#section_3" class="btn custom-btn custom-border-btn smoothscroll">Get started</a>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tm-video-container">
                    <video id="tm-welcome-video" class="tm-welcome-video" autoplay="" loop="" muted="">
                        <source src="\assets/img/video.mp4" type="video/mp4"> Your browser does not support the video tag.
                    </video>
                        <div id="tm-video-loader"></div>
                        <div id="tm-video-text-overlay" class="tm-video-text-overlay d-none">
                            <h1>
                                <div id="rotate" class="tm-video-text">
                                    <div>This is timeless</div>
                                    <div>We are invincible</div>
                                    <div>Quite unbeatable</div>
                                    <div>and indestructible</div>
                                </div>
                            </h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container tm-container-2">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="tm-welcome-text">Welcome to Timeless</h2>
                </div>
            </div>
            <div class="row tm-section-mb">
                <div class="col-lg-12">
                    <div class=" tm-timeline-item">
                        <div class="tm-timeline-item-inner">
                            <img src="\assets/img/img-01.jpg" alt="Image" class="rounded-circle tm-img-timeline">
                            <div class="tm-timeline-connector">
                                <p class="mb-0">&nbsp;</p>
                            </div>
                            <div class="tm-timeline-description-wrap">
                                <div class="tm-bg-dark tm-timeline-description">
                                    <h3 class="tm-text-green tm-font-400">Nulla venenatis purus nec quam</h3>
                                    <p>You may tell your co-workers about TemplateMo free stuffs to download and use for any website project. Thank you for supporting us.</p>
                                    <p class="tm-text-green float-right mb-0">New Event . 12 July 2018</p>
                                </div>
                            </div>
                        </div>

                        <div class="tm-timeline-connector-vertical"></div>
                    </div>

                </div>
            </div>
            <!--  row -->
            <hr>
            <div class="row tm-section-mb tm-section-mt">
                <div class="col-lg-4 col-md-4 col-sm-12 pr-lg-5 mb-md-0 mb-4">
                    <h3 class="mt-2 mb-3 tm-text-gray">Nunc dictum consequat</h3>
                    <p>Integer imperdiet aliquet lobortis. In in metus risus. Pellentesque pulvinar venenatis dui id rutrum. In
                    pharetra neque et eleifend venenatis.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 pr-lg-5 mb-md-0 mb-4">
                    <h3 class="mt-2 mb-3 tm-text-gray">Morbi ultrices tellus</h3>
                    <p>Integer imperdiet aliquet lobortis. In in metus risus. Pellentesque pulvinar venenatis dui id rutrum. In
                    pharetra neque et eleifend venenatis.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h3 class="mt-2 mb-3 tm-text-gray">Suspendisse dolor tortor</h3>
                    <p>Integer imperdiet aliquet lobortis. In in metus risus. Pellentesque pulvinar venenatis dui id rutrum. In
                    pharetra neque et eleifend venenatis.</p>
                </div>
            </div>
            <hr>
            <div class="row tm-section-mt">
                <div class="col-lg-6">
               </div>
               <div class="col-lg-6 mb-5">
                <h3 class="mb-4 tm-text-gray">Contact Us</h3>
                <form action="#contact" method="post" class="tm-contact-form">
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name..." required/>
                        </div>
                        <div class="form-group col-xl-6">
                            <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email..." required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="contact_message" name="contact_message" class="form-control" rows="6" placeholder="Your Message..." required></textarea>
                    </div>
                    <button type="submit" class="btn  tm-btn-send">Send It</button>
                </form>
            </div>
        </div>
        <hr>
        <!-- Footer -->
        <footer class="row mt-5 mb-5">
            <div class="col-lg-12">
                <p class="text-center tm-text-gray tm-copyright-text mb-0">Copyright &copy;
                    <span class="tm-current-year">2018</span> Your Company Name 
                
                </p>
            </div>
        </footer>
    </div>

</body>
</html>