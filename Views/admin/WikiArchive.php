<?php
if($_SESSION['type'] != 'admin'){
    header("Location:/author");
    exit();
}
?>

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
<link rel="stylesheet" href="assets/css/dashboard.css">

	<title>My WiKiS</title>
</head>
<style>

</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li lass="active">
				<a href="/user">
					<i class='bx bxs-group' ></i>
					<span class="text">USers</span>
				</a>
			</li>
			<li  >
				<a href="/wiki">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">WiKis</span>
				</a>
			</li>
			<li c>
				<a href="/categorie">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li >
				<a href="/tag">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Tags</span>
				</a>
			</li>
			<li class="active">
				<a href="/wikiArchive">
				    <i class='bx bxs-archive' ></i>
					<span class="text">Les Wikis Archivee</span>
				</a>
			</li>
            <li>
				<a href="/dachboard">
				    <i class='bx bxs-dashboard'></i>
					<span class="text">Dachboard</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">

			<li>
				<a href="/logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
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
			<a href="#" class="nav-link">WiKis Archivée</a>
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
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>My Wikis Archivée</h1>
				</div>
				
			</div>


			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-5">
									<h2>WiKis <b>Management</b></h2>
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
											<a href="#" class="delete" title="Delete" data-toggle="modal" data-target="#recupereWikiModal<?=$wiki['id']?>">
												<i class="material-icons">&#xE5CA;</i>
											</a>
									</td>
								</tr>

                       <!-- Delete Medicine Modal -->
                                <div class="modal" id="recupereWikiModal<?= $wiki['id']?>">										
                                  <div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Recuperation de WiKi</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<!-- Delete medicine form -->
													<form method="POST" action="/wiki/recuperer">
													<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?= $wiki['id'] ?>">
														<p>Are you sure you want to recuperer this WiKi?</p>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
															<button type="submit" class="btn btn-info">Recuperer WiKi</button>
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