<?php


namespace Agence\Models;

for($i = 0; $i < 5; $i++){
    echo password_hash('Azerty1234!', PASSWORD_BCRYPT);
    echo "\n";
}


class A {

}

echo A::class;