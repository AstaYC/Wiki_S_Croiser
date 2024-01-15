<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Timeless</title>
     	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    
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
                    <br>
                    <br>
                    <h1 class="pl-4 tm-site-title">BIENVENUE <?=$_SESSION['nom']?></h1>
                    <br><br>
                    <div class="">
                        <a href="/author/parametre" class="btn btn-secondary"><i class="material-icons">&#xE8B8;</i> <span>Gerer Votre WiKis</span></a>								
					</div>
                </header>
            </div>
            <!-- add modal -->
            <div class="modal" id="addCategorieModal">
									<div class="modal-dialog">
										<div class="modal-content">
											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title text-primary">Add New WiKis</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<!-- Modal Body -->
											<div class="modal-body">
												<form method="POST" action="/wiki/add">
													<div class="form-group">
														<label for="CategorieName">WiKi Name:</label>
														<input type="text" class="text-dark form-control" id="CategorieName" placeholder="Le Nom De WiKi" name="nom" required>
														<label for="myTextarea">Contenu De Wiki:</label>
														<textarea  class=" text-dark form-control" id="myTextarea" placeholder="Le Contenu" name="contenu" rows="4" cols="50" required></textarea>
                                                        <label for="Categorie">La Categorie</label>
														<select type="text" class="text-dark form-control" id="Categorie" placeholder="CategorieName" name="categorie" required>
                                                               <?php foreach ($cateRow as $categorie){ ?>  
														       <option class="text-dark" value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
															   <?php } ?>
                                                        </select>
                                                        <label>Les Tags</label>
                                                    
                                                        <select id="mySelect" name="tags[]" multiple style="width: 100%; " placeholder="u can">
                                                              <?php foreach($tagRow as $tag) {?>
                                                              <option class="text-dark" value="<?=$tag['id']?>"><?=$tag['nom']?></option>
                                                              <?php } ?>
                                                       </select>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" name="add" class="btn btn-primary">Add Wiki</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
            <!-- add modal -->
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
                    <h1 class="tm-welcome-text">Welcome to Timeless</h1>
                </div>
            </div>
            <?php foreach($row as $wiki) { ?>
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
                                    <h1 class="tm-font-400"><?=$wiki['nom']?></h1>
                                    <p class="tm-text-green float-right mb-0">Crée Par <?=$wiki['user_nom']?> . <?=$wiki['date']?></p>
                                </div>
                            </div>
                            <div class="tm-timeline-connector">
                                <p class="mb-0">&nbsp;</p>
                            </div>
                            <div class="tm-timeline-description-wrap">
                                <div class="tm-bg-dark tm-timeline-description">
                                   <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#contentModel<?=$wiki['id']?>">Continuée ici</button>
                                </div>
                            </div>
                        </div>
                    
                        <div class="tm-timeline-connector-vertical"></div>
                    </div>
                </div>
            </div>

            <!-- content model -->
            <div  id ="contentModel<?=$wiki['id']?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     
     <div class="modal-dialog modal-lg">
        <div class="modal-content">
    <div class="container mt-4">
     <div class="row">
         <!-- Colonne pour l'image -->
         <div class="col-lg-12 text-center">
             <img src="\assets/img/img-01.jpg" alt="Image" class="img-fluid mb-3">
         </div>
     </div>
     <div class="row">
         <!-- Colonne pour le contenu -->
         <div class="col-lg-12">
             <h1 class="text-dark mb-3"><?=$wiki['nom']?></h1>
             <p class="text-dark"><?=$wiki['contenu']?></p>
         </div>
     </div>
     <div class="row">
         <!-- Colonne pour les catégories et les tags -->
         <div class="col-lg-12">
             <div class="mb-2">
                 <strong class="text-dark" >Catégories:</strong>
                 <span class="text-dark" ><?=$wiki['categorie_nom']?></span>
             </div>
             <div class="mb-2">
                 <strong class="text-dark" >Les Tags:</strong>
                 <span class="text-dark" >Tag 1, Tag 2, Tag 3</span>
             </div>
         </div>
     </div>
     <div class="row">
         <!-- Colonne pour la date -->
         <div class="col-lg-12 text-right">
             
              <p class="text-dark" >Crée Par <?=$wiki['user_nom']?> . <?=$wiki['date']?></p>
         </div>
     </div>
 </div>
        </div>
      </div>
     </div>
            <?php } ?>
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