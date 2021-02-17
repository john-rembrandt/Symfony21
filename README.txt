Adaptation du framework d'OCR app de news sur Symfony.

commencé début février 2021.

0: créer un repo et un référentiel gitHub
1: créer un projet symfony 5.2 en prenant l'option --full
2: créer un contoleur lucky comme sur la doc pour test
3: utiliser a ce stade routes.yaml plutot que les annotations
4: commencer l'adaptation par le controleur de news
5: créer une entity pour une news.
6: créer la base de donnée "symfony21, une table "news" et migré
7: garder "NewsController.php" en l'etat et créer pour bidouille "NewsTestController.php"
8: ajouter une fonction d' hydratation via des données en dur pour test
9: ajouter une fonction d'affichage des element de la table news par "id"
10: ajouter une fonction d'appel du formulaire avec remplissage des champs en dur pour test
11: ajouter une fonction d'appel du formulaire, hydratation et persistance en db pour test
12: ajouter une fonction de fin de formulaire qui redirige sur une page "success"
13: ajouter un template pour le formulaire
14: ajouter un README.txt pour suivre mes manip

le 17.02.21

1:creer routes, controller, entity et templates sur les comments
