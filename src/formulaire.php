<?php

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

    if (isset($_POST["firstname"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["firstname"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['firstname'] = 'Prénom obligatoire';
        } else if (!preg_match($regName, $_POST["lastname"])) {
            // si ça ne respecte pas la regeX
            $errors['firstname'] = 'Caractère(s) non autorisé(s)';
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

    if (!isset($_POST["gender"])) {
        // si cgu non présen, on créé une erreur
        $errors['gender'] = 'Veuillez préciser votre genre';
    }

    if (!isset($_POST["country"])) {
        // si cgu non présen, on créé une erreur
        $errors['country'] = 'Veuillez sélectionner un pays';
    }

    if (!isset($_POST["cgu"])) {
        // si cgu non présen, on créé une erreur
        $errors['cgu'] = 'Veuillez valider les CGU';
    }

    if (empty($errors)) {
        // on inclut un paramètre URL pour pouvoir l'utiliser dans la page confirmation.php
        header("Location: confirmation.php?email=" . $_POST["email"]);
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
                        <label for="firstname" class="form-label">Prénom</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["firstname"] ?? '' ?></span>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $_POST["firstname"] ?? "" ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse mail</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["email"] ?? '' ?></span>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $_POST["email"] ?? "" ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Genre</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["gender"] ?? '' ?></span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="homme" id="homme" name="gender" <?= isset($_POST["gender"]) && $_POST["gender"] == "homme" ? "checked" : "" ?>>
                            <label class="form-check-label" for="homme">
                                Homme
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="femme" id="femme" name="gender" <?= isset($_POST["gender"]) && $_POST["gender"] == "femme" ? "checked" : "" ?>>
                            <label class="form-check-label" for="femme">
                                Femme
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="non binaire" id="nonBinaire" name="gender" <?= isset($_POST["gender"]) && $_POST["gender"] == "non binaire" ? "checked" : "" ?>>
                            <label class="form-check-label" for="nonBinaire">
                                Non binaire
                            </label>
                        </div>

                    </div>

                    <div class="mb-3 p-0 form-check">
                        <label for="email" class="form-label">Pays</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["country"] ?? '' ?></span>
                        <select class="form-select" name="country">
                            <option selected disabled>Choisissez un pays</option>
                            <option value="1" <?= isset($_POST["country"]) && $_POST["country"] == 1 ? "selected" : "" ?>>France</option>
                            <option value="2" <?= isset($_POST["country"]) && $_POST["country"] == 2 ? "selected" : "" ?>>Belgique</option>
                            <option value="3" <?= isset($_POST["country"]) && $_POST["country"] == 3 ? "selected" : "" ?>>Suisse</option>
                            <option value="4" <?= isset($_POST["country"]) && $_POST["country"] == 4 ? "selected" : "" ?>>Autres</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Commentaires <i>(Facultatif)</i></label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="comments" name="comments"><?= isset($_POST["comments"]) ? $_POST["comments"] : ""?></textarea>
                            <label for="floatingTextarea">Comments</label>
                        </div>
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