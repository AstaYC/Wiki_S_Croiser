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
        <nav class="navbar navbar-expand-lg navbar-light bs-tertiary-bg justify-content-between">
            <a class="tm-site-logo navbar-brand" href="#"></a>
 
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="fs-4 text-light nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="text-center tm-site-header">

                    <div class="tm-site-logo"></div>
                    <h1 class="pl-4 tm-site-title">Timeless</h1>
                    <br>
                    <br>
                    <?php if (!empty($_SESSION['type'])) { ?>
                    <h1 class="pl-4 tm-site-title">BIENVENUE <?=$_SESSION['nom']?></h1>
                    <br><br>
                       <div class="">
                       <a href="/author/parametre" class="btn btn-secondary"><i class="material-icons">&#xE8B8;</i> <span>Gerer Votre WiKis</span></a>								
                       </div>
                    <?php } ?>
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
                <div class="col-lg-12 d-flex justify-content-space-between align-items-center" style="justify-content: space-around">
                    <h1 class="tm-welcome-text">Welcome to Timeless</h1>
				       <div class="form-input">
					<input id ="keyword" type="search" placeholder="Search...">
					<button onclick="searchkey()" type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				       </div>
                </div>
            </div>
            <!-- div content -->
            <div id="divCont">

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
    
    <script>
    function getTags(id) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/ajax?wikiId=" + id, true);
        xhr.onreadystatechange = function () {
            console.log(xhr.readyState);
            if (xhr.readyState === 4 && xhr.status === 200) {
                var responses = JSON.parse(this.responseText);
                const tagContentElement = document.querySelector(`#contentModel${id} #tag-content`);
                  
                if ( responses.length == 0){
                    // Utilisation de += au lieu de + pour concaténer les valeurs
                    tagContentElement.innerHTML = 'Aucun tag disponible.';
                }else{
                    tagContentElement.innerHTML = '';
                    for(let i = 0; i < responses.length; i++) {
                        // Utilisation de += au lieu de + pour concaténer les valeurs
                        tagContentElement.innerHTML += responses[i].nom;
                    }
                }
            }
        };
        xhr.send();
    }
</script>
      

<script>
     function searchkey(){
        var xhr = new XMLHttpRequest();
        var keyword = document.querySelector('#keyword').value;
        xhr.open("GET", "/search?keyWord=" + keyword, true);
        xhr.onreadystatechange = function () {
            console.log(xhr.readyState);
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(this.responseText);
                var responses = this.responseText;
                var tagContentElement = document.querySelector(`#divCont`);

                        // Utilisation de += au lieu de + pour concaténer les valeurs
                        tagContentElement.innerHTML = responses;
            }
        };
        xhr.send();

     }
     searchkey();
</script>

</body>
</html>