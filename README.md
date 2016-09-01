SPIP - page speed
=======

Ce plugin permet de discuter avec le json page speed de Google.
https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=

Astuce, si le score d'un site est de 100. Soit vous êtes un expert de l'intégration web, soit votre site est HS.

# Changelog

## Version 1.x.x

### Version 1.1.0 (15/05/2015)

- Center le cercle sur les pages, problème avec le tableau
- Jouer avec la boucle json pour afficher les données 
- Insertion du score dans une table pour lister les sites
- Traduire les chaînes de langue dans le tableau

### Version 1.0.0 (15/05/2015)

- Mettre la pagespeed sur l'identité du site.
- Récupére le flux json de google page speed et affiche les résultats dans la page de l'identité du site et sur les sites syndiqués.

## TODO

- Intégrer la version 2 de page speed (https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=#ENV{url_site_spip})