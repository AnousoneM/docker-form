<?php

// var_dump($_POST);

// Création de regeX
$regName = "/^[a-zA-Zàèé\-]+$/";

// Je ne lance qu'uniquement lorsqu'il y a un formulaire validée via la méthod POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // je créé un tableau d'erreurs vide car pas d'erreur
    $errors = [];

    if (isset($_POST["lastname"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["lastname"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['lastname'] = 'Nom obligatoire';
        } else if (!preg_match($regName, $_POST["lastname"])) {
            // si ça ne respecte pas la regeX
            $errors['lastname'] = 'Caractère(s) non autorisé(s)';
        }
    }

    if (isset($_POST["email"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["email"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['email'] = 'Mail obligatoire';
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            // si mail non valide, on créé une erreur
            $errors['email'] = 'Mail non valide';
        }
    }

    if(!isset($_POST["cgu"])){
        // si cgu non présen, on créé une erreur
            $errors['cgu'] = 'Veuillez valider les CGU';
    }
    

    if(empty($errors)){
        // header("Location: confirmation.php");
    }

    
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form, formulaire</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <h1 class="text-center py-4 bg-warning">A fond le FORM' ...</h1>

    <main class="container py-4">

        <div class="row justify-content-center">

            <div class="col-6">

                <form action="" method="POST" novalidate>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["lastname"] ?? '' ?></span>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $_POST["lastname"] ?? "" ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse mail</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["email"] ?? '' ?></span>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $_POST["email"] ?? "" ?>">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="cgu" name="cgu">
                        <label class="form-check-label" for="cgu">J'ai lu et j'accepte les CGU</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["cgu"] ?? '' ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary">S'inscrire</button>

                </form>

            </div>

        </div>

    </main>

    <footer class="bg-warning text-center mt-auto py-4">
        <p class="m-3">Afpa 2K25 - SuperGlobale</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>