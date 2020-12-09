## Règles de nommage

Toutes les classes sont dans le répertoire "Agence" ou dans un de ses sous répertoire

L'espace de nom par défault est "Agence" (`namespace Agence;`)

1 fichier par classe

Le nom d'un fichier contenant une classe correspond au nom de la classe qu'il contient
> App.php = 
```php 
<?php
namespace Agence;

class App {
    // code
}
 ```

Si une classe se trouve dans un sous répertoire, l'espace de nom correspond au chemin

> Models/User.php = 
```php 
<?php
namespace Agence\Models;

class User {
    // code
}
 ```


Les noms des classes sont écrits en PascalCase
Les noms des attributs et des méthodes sont écrits en camelCase
Les attributs privés commencent par un "_" (`private string $_name`)

## Fichiers PHP

Chaque fichier PHP doit être commenté (classes, attributs, méthodes, fonctions).

Chaque fichier PHP doit contenir une entête :

```php
<?php 
/**
 * NOMDUFICHIER.PHP
 * 
 * Description du fichier
 * 
 * @author Nom du créateur du fichier
 * @author Nom d'un contributeur du fichier
 * @author Autre contributeur
 * @version 0.0.1
 * 
 * @todo Ce qu'il reste à faire dans ce fichier
 * @todo Ce qu'il reste d'autre à faire dans ce fichier
 */
```

Les fichiers ne respectant pas ces conditions doivent être refusés !