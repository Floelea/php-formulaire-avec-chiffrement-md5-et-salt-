<?php 

$salt = "calade";

$saltCrypte = md5($salt);

// $vraiMotDePasseTiffany = md5('bimbo'.$saltCrypte);
// $vraiMotDePasseKim = md5('relou'.$saltCrypte);
// $vraiMotDePasseAmber = md5('moche'.$saltCrypte);


// echo $vraiMotDePasseKim;

$users = [

    [
        "username"=>"tiffany",
        "password"=>"9a1e58f0e04e24bc00f9f059799bdd50",
    ],
    
    [
        "username"=>"kim",
        "password"=>"629a3904d5da7a4ba0262617308feeb0",
    ],
    
    [
        "username"=>"amber",
        "password"=>"a7e64e9b46203422a49e91a939a867e9",
    ]

    ];

$formulaire = "<form method='post' class='d-flex justify-content-center my-3'>
<input type='text' name='username' placeholder='username' >
<input type='text' name='password' placeholder='password'class='mx-3' >
<button type='submit' class='btn btn-success'>Verifier</button>
</form>";


$messageErreur = "";
$champsNonRemplis = 'Merci de remplir les champs';
$usernameFaux = "Username inconnu";
$motDePasseFaux = "Password érroné";
$compteVerifie = false;

$secret = 'Developpeur Web et Web Mobile';


if(
    
    (isset($_POST["username"])  &&  isset($_POST["password"]))

     && 

    (!empty($_POST["username"] ) &&  !empty($_POST["password"] ))
     
     
     ){
      
        $entreeUsername = $_POST["username"];
        $entreePassword = $_POST["password"];
        $userExists = false;
        $motdePasse;



        foreach ($users as $user) {

         


        if($entreeUsername == $user["username"]){
         
            $userExists = true;

            $motdePasse = $user["password"];

            

        }
       
    };


             if(!$userExists){    
                 
                
                
                $messageErreur = $usernameFaux;}


        if($userExists){
           
            if(md5($entreePassword.$saltCrypte) == $motdePasse  ){

               

                $compteVerifie = true;


            }else{$messageErreur = $motDePasseFaux;}
            
        }
        
      
       
    



} else{
        
            $messageErreur = $champsNonRemplis;
        
        };

  if($compteVerifie){
                    $formulaire = $secret;
        }

?>


