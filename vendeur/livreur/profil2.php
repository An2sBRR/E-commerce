<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plotly-2.18.2.min.js"></script>
    <script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuVente.fr</div>
            </div>
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i id="log-logo" class="bi bi-person-circle"></i>
              </a> 
            </div>
          </div>
        </div>
      </header>
      <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2">
                <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                    <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">
                        <li class="my-1 nav-item">
                            <a href="main.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-house fs-5"></i>
                                <span class="d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="#" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Colis</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Planning livraison</span> </a>
                        </li>
                        <li class="my-1 nav-item">
                            <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                         
                                <span class="d-none d-sm-inline">Profil</span> </a>
                        </li>
                        <a href="../../index.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                                <span class="d-none d-sm-inline">Déconnexion</span>
                            </a>
                    </ul>
                </div>
            </aside>

            <main class="col overflow-auto h-100 w-100">
                <div class="bg-light border rounded-3 p-3">
                    <h2>Votre Profil :</h2>
                    <div class="d-flex justify-content-center">
                    <i id="log-logo1" class="bi bi-person-circle"></i>
                    </div>
                    <div class="d-flex justify-content-center"><h3>Nom Prénom</h3></div>
                    <h4>Information personnel:</h4>
                    <div class="container text-center">
                      <div class="col-xs-3 center-block colordiv"style="background-color: rgba(0, 0, 0, 0);">
                            <div class = "#">
                                



                        <div class="row">
                          <div class="col">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Heure de debut </option>
                                <option value="1">6 heure</option>
                                <option value="2">7 heure</option>
                                <option value="3">8 heure</option>
                                <option value="4">9 heure</option>
                                <option value="5">10 heure</option>
                                <option value="6">11 heure</option>
                              </select>
                          </div>
                          <div class="col">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Heure de fin</option>
                                <option value="1">15 heure</option>
                                <option value="2">16 heure</option>
                                <option value="3">17 heure</option>
                                <option value="4">18 heure</option>
                                <option value="5">19 heure</option>
                                <option value="6">20 heure</option>
                              </select>
                          </div>
                        </div>
                        <br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41849.53154480777!2d2.0043335859188436!3d49.03729566715635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f4c72416d693%3A0x40b82c3688b34e0!2sCergy!5e0!3m2!1sfr!2sfr!4v1679224313614!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <br><br>
                        <button class="button button1 w-25">Sauvegarder</button>
                      </div>
                      </div>
                    <hr />
                    
            </main>