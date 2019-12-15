<?php

function triggerDebugMessage($message, $type=false) {
    $type == true ? $message = '<div class="success-message">' . $message : $message = '<div class="error-message">' . $message;
    $message .= ' <a href="index.php">OK</a></div>';
    $_SESSION['info'] = $message;
}

function uploadPostImage() { // Retourne le chemin du fichier si tout se passe bien, sinon un tableau d'erreurs
    //Config Section
    //Set file upload path
    $dossier = 'uploads/';
    $maxSize = 5000000;
    $fichier = basename($_FILES['newpost-media']['name']);
    $extension = strrchr($_FILES['newpost-media']['name'], '.');

    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    if(!in_array($extension, $extensions)) { // Si l'extension du fichier n'est pas dans le tableau, on ne l'upload pas
        return $erreur['erreur'] = 'Vous devez uploader un fichier de type png, gif, jpg, ou jpeg';
    }

    $size = filesize($_FILES['newpost-media']['tmp_name']);
    if($size>$maxSize) {
        return $erreur['erreur'] = 'Le fichier doit faire moins de 5Mo';
    }

    if(!isset($erreur)) {
        $fichier = $_SESSION['id'].'_post_image';

        while(file_exists($dossier.$fichier.$extension))
            $fichier .= '_';

        $fichier .= $extension;

        if(move_uploaded_file($_FILES['newpost-media']['tmp_name'], $dossier.$fichier)) {
             return $dossier.$fichier;
        } else {
            $erreur['erreur'] = "Impossible d'uploader le fichier: erreur inconnue";
            return $erreur;
        }
    } else {
        false;
    }
    triggerDebugMessage($erreur);
}
