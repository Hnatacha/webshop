 <!-- add register start -->
 <?php
    include '../config.php';
    if ($_POST) {

      $nom   = $_POST['nom'];
      $prenom  = $_POST['prenom'];
      $email   = $_POST['email'];
      $motdepasse   = $_POST['motdepasse'];
      $confirmermdp   = $_POST['confirmermdp'];

      //Serialization
      $responseArray = [];

      $sqlCheckEmail = "SELECT email FROM inscription WHERE email='$email'";
      $existEmail = $bdd->query($sqlCheckEmail);

      if(mysqli_num_rows($existEmail) > 0){
        echo "<font color='red'>Data already exist.";
        echo "<br/><a href='index.php'>View Result</a>";
      }else{
        $addRegisterSql = "INSERT INTO inscription(nom,prenom,email,motdepasse,confirmermdp) 
        VALUES('$nom','$prenom','$email','$motdepasse','$confirmermdp')";
  
        $result = $bdd->query($addRegisterSql);
  
        if ($result == TRUE) {
          echo "<font color='green'>Data added successfully.";
          echo "<br/><a href='index.php'>View Result</a>";
        } else {
          echo "<br/><a href='index.php'>View Result</a>";
          echo "Error:" . $sql . "<br>" . $conn->error;
        }
      }
    }




    ?>