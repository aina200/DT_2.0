<?php


if(isset($_POST['contact']) && !empty($_POST['contact']))
{
//********************* EMPTY VERIFICATION**************************************************
// lastName firstName index city tel email message
if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['index']) && !empty($_POST['city'])
&& !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['message']))
{
 //********************* EMAIL VERIFICATION*************************************************
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false)
        
        {
            if ( strlen($_POST['lastName'])<35)//******* NAME LENGTH VERIFICATION****
            {
                if (preg_match("/^[a-zA-Z-' ]*$/",$_POST['lastName'])) //*** NAME COHERENCE VERIFICATION*********
                {
                    
                    if ( strlen($_POST['message'])<550)//******* MESSAGE LENGTH VERIFICATION********
                    {
                        if (preg_match("#^0[6-7]([-. ]?[0-9]{2}){4}$#", $_POST['tel']))//*********** PHONE COHERENCE VERIFICATION********
                        {
                            // $errors = '*Veuillez remplir tous les champs*';
                        
                            $msg =  'Nom: '.$_POST['lastName']."\n\n";
                            $msg .= "Prénom:". $_POST['firstName']."\n\n";
                            $msg .= 'Code Postal: '.$_POST['index']."\n\n";
                            $msg .= 'Ville: '. $_POST['city']."\n\n";
                            $msg .= 'Numéro: ' . $_POST['tel']."\n\n";
                            $msg .= 'Email: '. $_POST['email']."\n\n";
                            $msg .= 'Message: ' .$_POST['message']."\n\n";

                            $jour = date('d');
                            $mois = date ('m');
                            $annee = date ('y');
                            $heure = date('H');
                            $minute = date('i');
                            $msg .= 'Date d\'envoi: '. $jour . '/' . $mois . '/' . $annee . ' à ' . $heure. 'h' . $minute ;

                            $recipient = "contact@dynasty-patrimoine.com";
                            $subject = "Contact-site-Dynasty-Patrimoine";
                                            
                            $mailheaders = "From: Contact-site-Dynasty-Patrimoine<> \n";
                            $mailheaders .= $_POST['email'];
                                            
                            mail($recipient, $subject,$msg, $mailheaders);

                            echo "<HTML><HEAD>";
                            echo "<TITLE>Formulaire envoyé!</TITLE></HEAD><BODY>";
                            echo "<H1 align=center>Merci</H1>";
                            echo "<P align=center>";
                            echo "Votre message à bien été envoyé !</P>";
                            echo "</BODY></HTML>";                            
                               
                        }else
                         {
                            $errors = "*Numéro Invalide*";
                         }
                    }else
                        {
                            $errors= '*Veuillez ne pas entrer plus de 550 caractères*';
                        }
                }else
                {
                    $errors = "*Nom invalide*";
                }
                
            }else
            {
                $errors= '*Veuillez ne pas entrer plus de 35 caractères*';
            }
                
        }else
            {
            $errors= '*Email Invalide*';
            }
    }
    else{
        $errors= '*Veuillez remplir tous les champs*';
    }
}




require './views/contact.phtml';