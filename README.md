## Notification de mise en ligne de nouveaux arrêtés dans la base CEDRIC

le travail est divisé en plusieurs étapes

1. Login : chaque Région a un identifiant
2. Recherche : lancer une recherche sans critère
3. Enregistrement des résultats

## Configuration

Copier config.exemple en config.php et le compléter.
Installer la cron qui va lancer script "cedric\_dl.php"

Exemple :

0 12 * * * cd /chemin/ou/est/cedric; php cedric_dl.php

