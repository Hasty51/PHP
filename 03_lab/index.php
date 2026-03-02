<?php

$a = 0;
$b = 0;
$i1 = 0;
$i2 = 0;
for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;
    echo "Step $i: a = $a, b = $b <br>";
}
echo "End of the loop: a = $a, b = $b<br><br><br>";

while ($i1 <= 5) {
    $a += 10;
    $b += 5;
    echo "Step $i1: a = $a, b = $b <br>";
    $i1++;
}
echo "End of the loop: a = $a, b = $b<br><br><br>";

do {
    $a += 10;
    $b += 5;
    echo "Step $i2: a = $a, b = $b <br>";
    $i2++;
} while ($i2 >= 5);
echo "End of the loop: a = $a, b = $b<br><br><br>";