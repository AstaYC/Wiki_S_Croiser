<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="/../assets/css/dashboard.css">

	<title>My WiKiS</title>
</head>
<style>

</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">User</span>
		</a>
		<ul class="side-menu top">
			<li lass="active">
				<a href="/author">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Retourner a la page principale</span>
				</a>
			</li>
        </ul>       
     </section>
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">WiKis</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>My Wikis</h1>
				</div>
				
			</div>


			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-5">
									<h2>WiKis User <b>Management</b></h2>
								</div>
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
												<!-- Add medicine form -->
												<form method="POST" action="/author/parametre/add">
													<!-- Input fields for medicine details -->
													<div class="form-group">
														<label for="CategorieName">WiKi Name:</label>
														<input type="text" class="form-control" id="CategorieName" placeholder="Le Nom De WiKi" name="nom" required>
														<label for="myTextarea">Contenu De Wiki:</label>
														<textarea  class="form-control" id="myTextarea" placeholder="Le Contenu" name="contenu" rows="4" cols="50" required></textarea>
														<label for="Categorie">La Categorie</label>
														<select type="text" class="form-control" id="Categorie" placeholder="CategorieName" name="categorie" required>
                                                               <?php foreach ($cateRow as $categorie){ ?>  
														       <option value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
															   <?php } ?>
                                                        </select>
                                                        <br>
                                                        <div class="form-group">
                                                            <label>Les Tags :</label><br>
                                                            <?php foreach($tagRow as $tag) { ?>
                                                              <div class="form-check">
                                                                 <input type="checkbox" class="form-check-input" id="tag<?=$tag['id']?>" name="tags[]" value="<?=$tag['id']?>">
                                                                 <label class="form-check-label" for="tag<?=$tag['id']?>"><?=$tag['nom']?></label>
                                                              </div>
                                                            <?php } ?>
                                                        </div>

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
								<div class="col-sm-7">
									<!-- <a href="" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Categories</span></a> -->
									<a href="" class="btn btn-secondary" data-toggle="modal" data-target="#addCategorieModal"><i class="material-icons">&#xE147;</i> <span>Add New Categories</span></a>				
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nom de Wiki</th>						
									<th>Contenu du WiKi</th>						
									<th>Date de Creation</th>						
									<th>Cree PAR</th>						
									<th>Categorie</th>						
									<th>Action</th>
								</tr>
							</thead>
							<tbody>	
							<?php foreach($row as $wiki){?>
								<tr>
									<td><?=$wiki['id']?></td>
									<td><?=$wiki['nom']?></td>
									<td><?=$wiki['contenu']?></td>
									<td><?=$wiki['date']?></td>
									<td><?=$wiki['user_nom']?></td>
									<td><?=$wiki['categorie_nom']?></td>
									
									<td>
											<a href="#" class="settings" title="Settings" data-toggle="modal" data-target="#updateCategoryModal<?=$wiki['id']?>">
												<i class="material-icons">&#xE8B8;</i>
											</a>
											<a href="#" class="delete" title="Delete" data-toggle="modal" data-target="#deleteCategoryModal<?=$wiki['id']?>">
											    <i class='bx bx-trash' ></i>
											</a>
									</td>
								</tr>


                        <!-- modal de update -->
								<div class="modal" id="updateCategoryModal<?=$wiki['id']?>">
								<div class="modal-dialog">
                                <div class="modal-content">
											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title text-primary">UPDATE WiKis</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<!-- Modal Body -->
											<div class="modal-body">
												<form method="POST" action="/author/parametre/update">
                                                        <input type="hidden" name="action" value="update">
														<input type="hidden" name="id" value="<?=$wiki['id']?>"><input type="hidden" name="id" value="<?=$wiki['id']?>">
													<div class="form-group">
														<label for="CategorieName">WiKi Name:</label>
														<input type="text" value ="<?=$wiki['nom']?>" class="form-control" id="CategorieName" placeholder="Le Nom De WiKi" name="nom" required>
														<label for="myTextarea">Contenu De Wiki:</label>
														
                                                        <textarea class="form-control" id="myTextarea" placeholder="Le Contenu" name="contenu" rows="4" cols="50" required><?=$wiki['contenu']?></textarea>
														<label for="Categorie">La Categorie</label>
														<select type="text" class="form-control" id="Categorie" placeholder="CategorieName" name="categorie" required>
                                                               <?php foreach ($cateRow as $categorie){ ?>  
														       <option value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
															   <?php } ?>
                                                        </select>
                                                        <br>
                                                        <div class="form-group">
                                                            <label>Les Tags :</label><br>
                                                            <?php foreach($tagRow as $tag) { ?>
                                                              <div class="form-check">
                                                                 <input type="checkbox" class="form-check-input" id="tag<?=$tag['id']?>" name="tags[]" value="<?=$tag['id']?>">
                                                                 <label class="form-check-label" for="tag<?=$tag['id']?>"><?=$tag['nom']?></label>
                                                              </div>
                                                            <?php } ?>
                                                        </div>

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
                       <!-- Delete Medicine Modal -->
                                <div class="modal" id="deleteCategoryModal<?= $wiki['id']?>">	
								
                                  <div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Supprimer le WiKi</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<!-- Delete medicine form -->
													<form method="POST" action="/author/parametre/delete">
													<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?= $wiki['id']?>">
														<p>Are you sure you want to delete this WiKi?</p>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
															<button type="submit" class="btn btn-danger">Delete Le WiKi</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

							<!-- Tags Modals  -->

							<div class="modal" id="addTagModal<?=$wiki['id']?>">
								<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Add Tags</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<!-- Update medicine form -->
													<form method="POST" action="/categorie/update">
														<input type="hidden" name="action" value="update">
														<input type="hidden" name="id" value="<?= $wiki['id'] ?>">

														<!-- Input fields for updated medicine details -->
														<div class="form-group">
															<label for="updateMedicineName">Tags Selectioné:</label>
															<input type="text" class="form-control" id="updateCategoryName" name="nom" value="<?= $wiki['nom'] ?>" required>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Add Tags</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
							 
								<?php } ?>
                         </tbody>
						</table>
					</div>
				</div>
			</div>  
		</main>
	</section>
	<script src="../../public/assets/js/script.js"></script>
</body>
</html>