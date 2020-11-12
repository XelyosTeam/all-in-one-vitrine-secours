<?php
  /*
    Le projet All in One est un produit Xelyos mis à disposition gratuitement
    pour tous les serveurs de jeux Role Play. En échange nous vous demandons de
    ne pas supprimer le ou les auteurs du projet.
    Created by : Xelyos - Aros
    Edited by :
  */
  function serveurIni($categorie, $param)
  {
    $params = parse_ini_file("server.ini", true); // Insertion du fichier : server.ini
    return $params[$categorie][$param];
  }
?>
