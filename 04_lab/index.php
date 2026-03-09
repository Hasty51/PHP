<?php

declare(strict_types = 1);

$transactions = [
    [
        "id" => 1,
        "date" => "2019-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ],
];

function calculateTotalAmount(array $transactions): float {
  return array_reduce($transactions, fn($sum, $item) => $sum + $item['amount'], 0.0);
}

//by description

function findTransactionByDescription(string $descriptionPart): array {
  global $transactions;
    return array_filter($transactions, function($t) use ($descriptionPart) {
        return strpos(strtolower($t['description']), strtolower($descriptionPart)) !== false;
    });
}

//by id's

// function findTransactionById(int $id): ?array {
//   global $transactions;
//   foreach ($transactions as $t) {
//     if ($t['id'] === $id) {
//       return $t;
//     }
//   }
//   return null;
// }

function findTransactionById(int $id): ?array {
  global $transactions;
    $result = array_filter($transactions, fn($t) => $t['id'] === $id);
    return !empty($result) ? array_values($result)[0] : null;
}
//tests

echo "<pre>"; 
echo "by id \n";
$testId = findTransactionById(1);
print_r($testId);

echo "by desc \n";
 $testDesc = findTransactionByDescription("friends");
 print_r($testDesc);

echo "</pre>";

function daysSinceTransaction(string $date): int {
  $transactionDate = new DateTime($date);
  $today = new DateTime();
  $interval = $today->diff($transactionDate);
  return (int)$interval->format("%a");
}

function addTransaction(int $id, string $date, float $amount, string $description, string $merchant): void{
  global $transactions;
  $transactions[] = [
    "id" => $id,
    "date" => $date,
    'amount' => $amount,
    "description" => $description,
    "merchant" => $merchant
  ];
}
addTransaction(3, "2019-03-01", 15000.00, "PHP courses", "Education Center");


//usort($transactions, fn($a, $b) => strtotime($a['date']) <=> strtotime($b['date']));

usort($transactions, fn($a, $b) => ($b['amount']) <=> ($a['amount']));


?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lab4</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f4f4f4; }
        .total-row { font-weight: bold; background-color: #e9ecef; }
    </style>
</head>
<body>

    <h2>Банковские транзакции</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>Дней прошло</th>
                <th>Сумма</th>
                <th>Описание</th>
                <th>Организация</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction['id'] ?></td>
                    <td><?= $transaction['date'] ?></td>
                    <td><?= daysSinceTransaction($transaction['date']) ?></td>
                    <td><?= number_format($transaction['amount'], 2, '.', ' ') ?> орещков</td>
                    <td><?= $transaction['description'] ?></td>
                    <td><?= $transaction['merchant'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr class="total-row">
            <td colspan='3'>Итого:</td>
            <td colspan='3'><?= number_format(calculateTotalAmount($transactions), 2, '.', ' ') ?> орещков</td>
          </tr>
        </tfoot>
    </table>

</body>
</html>