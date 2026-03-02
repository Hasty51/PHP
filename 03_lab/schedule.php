<?php 

$dayNumber = date("N");

if (in_array($dayNumber, [1,3,5])) {
    $johnStyles = "8:00-12:00";
} else {
    $johnStyles = "Нерабочий день.";
}

if (in_array($dayNumber, [2,4,6])) {
    $janeDoe = "12:00-16:00";
} else {
    $janeDoe = "Нерабочий день.";
}

?>
<table border="1" style="border-collapse: collapse;">
    <tr>
        <th>№</th>
        <th>Фамилия Имя</th>
        <th>График работы</th>
    </tr>
    <tr>
        <td>1</td>
        <td>John Styles</td>
        <td><?= $johnStyles ?></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jane Doe</td>
        <td><?= $janeDoe ?></td>
    </tr>
</table>