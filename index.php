<?php

include("fonctions.php");

if (isset($_POST['submit']))
{
    $lastname=htmlentities(trim($_POST['lastname']));
    $name=htmlentities(trim($_POST['name']));
    $username=htmlentities(trim($_POST['username']));
    $email=htmlentities(trim($_POST['email']));
    $password=htmlentities(trim($_POST['password']));
    $repeatpassword=htmlentities(trim($_POST['repeatpassword']));

    if ($username&&$password&&$repeatpassword&&$name&&$lastname&&$email)

   {
        if($password==$repeatpassword)

        {
            
         $password=md5($password);
         connectMaBase();
         $reg=mysql_query("SELECT * FROM inscription WHERE username='$username'");
         $rows=mysql_num_rows($reg);

               if ($rows==0)

               {

                 $query=mysql_query("INSERT INTO inscription VALUES('','$lastname','$name','$email', $username','$password')"); 
                 die("Inscription terminée<a href='login.php'>Connectez </a>vous");
                }
             else echo "Pseudo déja pris. Choisissez un autre Pseudo";

        } else echo "Les deux password doivent être indentiques";

    }else echo "Vous devez remplir tous les champs du formulaire";

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="formulaire.css">
</head>
<body>
<p>
<form method="POST" action="index.php">

<label for="password">Entrez votre Nom :</label><br/>
<input type="text" name="lastname" value="" id="lastname" size="30" /><br/>

<label for="password">Entrez votre Prénom :</label><br/>
<input type="text" name="name" value="" id="name" size="30" /><br/>

<label for="password">Choisissez un nom d'utilisateur :</label><br/>
<input type="text" name="username" value="" id="username" size="30" /><br/>

<label for="password">Entrez votre email :</label><br/>
<input type="text" name="email" value="" id="email" size="30" /><br/>

<label for="password">Choisissez un mot de passe:</label><br/>
<input type="password" name="password" id="password" size="30" /><br/>

<label for="password">Répétez votre mot de passe:</label><br/>
<input type="password" name="repeatpassword"  size="30"/>
<br/>

<input type="submit" name="submit" value="S'inscrire"/>

</p>
 
</body>
</html>