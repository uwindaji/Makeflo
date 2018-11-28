<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table Abonnement
$project = new services\Seed('Project');

$res_project = $project->search_in_table("*", null);

