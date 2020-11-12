<?php
  /*
    Le projet All in One est un produit Xelyos mis à disposition gratuitement
    pour tous les serveurs de jeux Role Play. En échange nous vous demandons de
    ne pas supprimer le ou les auteurs du projet.
    Created by : Xelyos - Aros
    Edited by :
  */
  require "vendor/autoload.php"; // Inclusion de l'autoloader

  /* Associer Flight à Twig */
  $loader = new \Twig\Loader\FilesystemLoader(dirname(__FILE__) . '/views');
  $twigConfig = array(
      // 'cache' => './cache/twig/',
      // 'cache' => false,
      'debug' => true,
  );

  Flight::register('view', '\Twig\Environment', array($loader, $twigConfig), function ($twig)
  {
      $twig->addExtension(new \Twig\Extension\DebugExtension()); // Add the debug extension

      /* Paramètre Serveur */
      $twig->addGlobal('_adresseDiscord', serveurIni('Serveur', 'discord'));
      $twig->addGlobal('_nomServeur', serveurIni('Serveur', 'nom'));
      $twig->addGlobal('_jeuServeur', serveurIni('Serveur', 'jeu'));
      $twig->addGlobal('_nomFaction', serveurIni('Serveur', 'nomFaction'));
      $twig->addGlobal('_URLIntranet', serveurIni('Serveur', 'url_intranet'));
  });
  /* Associaiton Flight Twig */

  /* Association à la base de donnée */
  Flight::before('start', function(&$params, &$output)
  {
    $host = serveurIni('BDD', 'host');
    $name = serveurIni('BDD', 'name');
    $user = serveurIni('BDD', 'user');
    $mdp = serveurIni('BDD', 'mdp');
    ORM::configure("mysql:host=$host;dbname=$name;charset=utf8");
    ORM::configure('username', "$user");
    ORM::configure('password', "$mdp");
  });
  /* Association à la base de donnée */

  Flight::route('/', function()
  {
    Flight::view()->display('index.twig', array());
  });

  Flight::route('/Histoire', function()
  {
    Flight::view()->display('history.twig');
  });

  Flight::route('/Reglements', function()
  {
    Flight::view()->display('rules_ems.twig');
  });


  Flight::start(); // Denrière ligne du fichier
?>
