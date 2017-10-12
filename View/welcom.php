<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue !</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.1.0/octicons.min.css">
    <link rel="stylesheet" href="../View/Assets/css/welcompage.css">

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header class="container-fluid navcolor">
        <?php // FIXME: bouton a gerer ?>
        <div class="row">
          <nav class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="navbar-header">
              <a class="navbar-brand header" href="#">
                INVOICE-APP
              </a>
            </div>
            <ul class="nav navbar-nav navbar-right header-ul">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  ABONNEMENT
                  <span class="caret"></span>
                </a>
              <ul class="dropdown-menu header-dropdown">
              <li><a class="item-list" href="#">Annuel</a></li>
              <li><a class="item-list" href="#">Mensuel</a></li>
              <li><a class="item-list" href="#">Autres</a></li>
              </ul>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> SE CONNECTER</a></li>
            </ul>
          </nav>
        </div>
      </header>
      <section class="container-fluid torest-img">
      </section>
        <section class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="col-md-6 reclame">
                <p>Vos weekends comptent... Profitez-en!</p>
              </div>
              <div class="col-md-6 call-login">
                <div class="btn-position">
                  <button class="btn-welcom btn" type="button" name="button">Se Connecter</button>
                  <p><a href="#"><u>Pas de compte? Enregistrez vous.</u></a></p>
                </div>
              </div>
            </div>
          </div>
        </section>

      <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
