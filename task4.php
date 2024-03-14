<?php

function sumOfNeighbors($matrix, $row, $col) {
    $sum = 0;
    $rows = count($matrix);
    $columns = count($matrix[0]);

    $neighbors = array(
        array(-1, 0),
        array(1, 0),
        array(0, -1),
        array(0, 1)
    );

    for ($i = 0; $i < 4; $i++) {
        $newRow = $row + $neighbors[$i][0];
        $newCol = $col + $neighbors[$i][1];
        if ($newRow >= 0 && $newRow < $rows && $newCol >= 0 && $newCol < $columns) {
            $sum += $matrix[$newRow][$newCol];
        }
    }

    return $sum;
}

// example
$matrix = [
    [51, 71, 1, 50],
    [13, 5, 19, 11],
    [60, 4, 11, 20],
    [13, 34, 17, 0],
    [16, 53, 1, 32]
];

echo "Сумма соседей (0, 0): " . sumOfNeighbors($matrix, 0, 0) . "\n";
echo "Сумма соседей (2, 3): " . sumOfNeighbors($matrix, 2, 3) . "\n";
