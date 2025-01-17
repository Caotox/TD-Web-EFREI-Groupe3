<?php
//require_once 'vue/FormulaireVue.php';

$formulaire = array(
    "1" => array(
        "Musée d'Orsay" => "A",
        "Musée Nissim de Camondo" => "J",
        "Musée départemental Albert-Kahn" => "Y",
    ),
    "2" => array(
        "Sabrina Carpenter" => "J",
        "Louis Garrel" => "Y",
        "Ana de Armas" => "A",
    ),
    "3" => array(
        "Toucan" => "Y",
        "Cochon" => "A",
        "Kangourou" => "J",
    ),
    "4" => array(
        "France" => "A",
        "Italie" => "Y",
        "Canada" => "J",
    ),
    "5" => array(
        "La terre du milieu" => "J",
        "Alice in Borderland" => "Y",
        "Elden Ring" => "A",
    ),
    "6" => array(
        "Le prof" => "A",
        "Zizou" => "J",
        "Johnny Sins" => "Y",
    ),
    "7" => array(
        "php parce que je suis un éléphant" => "J",
        "Python parce que j'aime me mordre la queue" => "A",
        "C parce que je suis con" => "Y",
    ),
    "8" => array(
        "j'ai peur des femmes" => "A",
        "je montre ma capacité à boire beaucoup" => "J",
        "je l'amène au cinema" => "Y",
    ),
    "9" => array(
        "Under Pressure de Queen et David Bowie" => "J",
        "La Princesse de Café Allongé" => "Y",
        "One more light de Linkin Park" => "A",
    ),
    "10" => array(
        "Les hommes" => "J",
        "Les femmes" => "A",
        "Les deux" => "Y",
    ),
    "11" => array(
        "Pad thaï" => "A",
        "Couscous" => "Y",
        "Pizzas" => "J",
    ),
    "12" => array(
        "Roi sorcier d'angmar" => "J",
        "Pizza" => "A",
        "Ken" => "Y",
    ),
    "13" => array(
        "Parler aux fruits" => "Y",
        "Transformer l'eau en alcool" => "J",
        "Vous faire perdre la mémoire" => "A",
    ),
    "14" => array(
        "Gobelet" => "A",
        "Mot" => "Y",
        "Tunnel" => "J",
    ),
    "15" => array(
        "Jacinthes" => "Y",
        "Edelweiss" => "A",
        "Tulipes" => "J",
    ),
);

/* function getFormulaire($formulaire){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $results = array('A' => 0, 'Y' => 0, 'J' => 0);
        foreach ($formulaire as $question => $reponses) {
            if (isset($_POST["question$question"])) {
                $results[$_POST["question$question"]]++;
            }
        }
        $max = array_keys($results, max($results))[0];
        $response = '';
        switch ($max) {
            case 'A':
                $response = 'Antoine';
                break;
            case 'Y':
                $response = 'Yanis';
                break;
            case 'J':
                $response = 'Jessica';
                break;
        }
        $html .= "<p>La réponse est : $response</p>";
    }
    $html .= "<input type='submit' value='Envoyer'></form>";
    return $html;
} */
/*
function calculerScore($formulaire) {
    $scores = array('A' => 0, 'Y' => 0, 'J' => 0);

    foreach ($formulaire as $question => $reponses) {
        if (isset($_POST[$question])) {
            foreach ($_POST[$question] as $choix) {
                if (isset($reponses[$choix])) {
                    $scores[$reponses[$choix]]++;
                }
            }
        }
    }
    return $scores;
}*/
function calculerScore($formulaire) {
    $scores = array('A' => 0, 'Y' => 0, 'J' => 0); // Initialiser les scores

    foreach ($formulaire as $question => $reponses) {
        // Vérifier si une réponse pour cette question est soumise
        if (isset($_POST[$question])) {
            $choix = $_POST[$question]; // Récupérer la réponse
            if (isset($reponses[$choix])) {
                $scores[$reponses[$choix]]++; // Ajouter au score correspondant
            }
        }
    }
    return $scores; // Retourner les scores finaux
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h1>Debug : Données POST</h1>";
    echo "<pre>";
    print_r($_POST);
    $scores = calculerScore($formulaire);

    // Trouver la lettre avec le score le plus élevé
    $maxScore = max($scores);
    $dominant = array_keys($scores, $maxScore)[0];

    // Associer la lettre à une personne
    $personnalites = array(
        'A' => 'Antoine',
        'Y' => 'Yanis',
        'J' => 'Jessica'
    );
/*
    $resultat = $personnalites[$dominant];
    echo "<h1>Résultat</h1>";
    echo "<p>Vous êtes le plus compatible avec : $resultat</p>";
    echo "<a href='FormulaireVue.php'>Recommencer</a>";
*/

    $resultat = $personnalites[$dominant] ?? 'Personne';

    header("Location: /TD-Web-EFREI-Groupe3/vueUser/ResultatFormulaire.php?resultat=$resultat");
    exit;


}

?>