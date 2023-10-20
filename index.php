<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php FORMULAIRE</title>
</head>

<body>
    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #333;
            color: lightgrey;
        }

        .borderPrenom {
            border: 2px solid red;
        }

        .borderRadio {
            border-color: red;
            background-color: red;
            /* Pour changer la couleur de fond */
            color: green;
            /* Pour changer la couleur du texte */

        }

        .errors {
            margin: 3.5rem;

            color: red;
        }

        .accept {
            color: green;
            font-size: 36px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        hr {
            width: 100%;
        }

        form {
            border: 2px solid greenyellow;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 5px 5px gray;

        }
    </style>
    <h1>PHP</h1>
    <?php
    date_default_timezone_set('Europe/Paris');
    ?>
    <?php
    header("Refresh: 120; url=http://localhost/site/formTest/index.php");
    ?>
    <hr>
    Nous sommes le : <?php echo date('Y-m-d H:i:s'); ?>, et il pleut.
    <br>

    <?php
    print_r($_POST);
    ?>
    <br>
    <br>
    <?php
    // test variable
    //     $form = <<<HTML
    //         <form method="POST">
    //             <label for="monsieur">Monsieur</label>
    //             <input type="radio" name="gender" value="Monsieur" id="monsieur">
    //             <label for="madame">Madame</label>
    //             <input type="radio" name="gender" value="Madame" id="madame">
    //             <br><br>
    //             <input type="text" name="prenom" placeholder="Username">
    //             <br>
    //             <br>
    //             <input type="submit" name="submit">
    //         </form>
    // HTML;    
    ?>

    <?php
    $showForm = true;
    $borderPrenom = '';
    //IF SUBMIT EXIST
    if (isset($_POST['submit'])) {
        //NAME  AND GENDER OK
        if (!empty(trim($_POST['prenom'])) && isset($_POST['gender'])) {
            //GREETINGS 
    ?>
            <div class="accept">
                <?php echo 'Bonjour ' . $_POST['gender'] . ' ' . $_POST['prenom'] . ' Comment vas-tu ?'; ?>
            </div>
        <?php
            $showForm = false;
            //ELSE
        } else { ?>
            <div class="errors">
                <?php
                //IF ALL EMPTY
                if (empty(trim($_POST['prenom'])) && !isset($_POST['gender'])) {
                    echo 'Veuillez indiquer votre prénom et votre genre SVP.';
                    $borderPrenom = 'borderPrenom';

                    //IF NAME EMPTY
                } elseif (empty(trim($_POST['prenom']))) {
                    echo $_POST['gender'] . ' Veuillez indiquer votre prénom SVP.';
                    $borderPrenom = 'borderPrenom';
                    //IF GENDER NOT CHECKED
                } elseif (!isset($_POST['gender'])) {
                    echo $_POST['prenom'] . 'Veuillez indiquer votre genre SVP.';
                }
                ?>
            </div>
        <?php
        }
    }
    //SHOW FORM
    if ($showForm) { ?>


        <form method="POST">
            <label for="monsieur">Monsieur</label>
            <input type="radio" name="gender" value="Monsieur" id="monsieur" >
            <label for="madame">Madame</label>
            <input type="radio" name="gender" value="Madame" id="madame" >
            <br><br>
            <input type="text" name="prenom" id="prenom" placeholder="Username" value="<?php echo !empty(($_POST['prenom'])) ? $_POST['prenom'] : '' ?>" 
            class="<?php echo $borderPrenom; ?> ">

            <br>
            <br>
            <input type="submit" name="submit" id="submit">
        </form>

        
    <?php }


    ?>
</body>

</html>