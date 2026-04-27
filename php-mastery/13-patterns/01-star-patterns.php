<?php
/**
 * Pattern Programs in PHP
 * Various Star, Number, and Character Patterns
 */

echo "=== Pattern Programs ===\n\n";

// 1. Right Triangle Star Pattern
echo "1. Right Triangle Star Pattern:\n";
$rows = 5;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
echo "\n";

// 2. Inverted Right Triangle
echo "2. Inverted Right Triangle:\n";
for ($i = $rows; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
echo "\n";

// 3. Pyramid Pattern
echo "3. Pyramid Pattern:\n";
for ($i = 1; $i <= $rows; $i++) {
    // Print spaces
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    // Print stars
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 4. Inverted Pyramid
echo "4. Inverted Pyramid:\n";
for ($i = $rows; $i >= 1; $i--) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 5. Diamond Pattern
echo "5. Diamond Pattern:\n";
// Upper half
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
// Lower half
for ($i = $rows - 1; $i >= 1; $i--) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 6. Number Pyramid
echo "6. Number Pyramid:\n";
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo "$k ";
    }
    echo "\n";
}
echo "\n";

// 7. Hollow Square
echo "7. Hollow Square:\n";
$size = 5;
for ($i = 1; $i <= $size; $i++) {
    for ($j = 1; $j <= $size; $j++) {
        if ($i == 1 || $i == $size || $j == 1 || $j == $size) {
            echo "* ";
        } else {
            echo "  ";
        }
    }
    echo "\n";
}
echo "\n";

// 8. Hollow Rectangle
echo "8. Hollow Rectangle:\n";
$width = 8;
$height = 5;
for ($i = 1; $i <= $height; $i++) {
    for ($j = 1; $j <= $width; $j++) {
        if ($i == 1 || $i == $height || $j == 1 || $j == $width) {
            echo "* ";
        } else {
            echo "  ";
        }
    }
    echo "\n";
}
echo "\n";

// 9. Pascal's Triangle
echo "9. Pascal's Triangle:\n";
for ($i = 0; $i < 5; $i++) {
    // Spaces
    for ($j = 0; $j < 5 - $i; $j++) {
        echo " ";
    }
    
    $num = 1;
    for ($k = 0; $k <= $i; $k++) {
        echo " $num";
        $num = $num * ($i - $k) / ($k + 1);
    }
    echo "\n";
}
echo "\n";

// 10. Floyd's Triangle
echo "10. Floyd's Triangle:\n";
$num = 1;
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo str_pad($num, 2, " ", STR_PAD_LEFT) . " ";
        $num++;
    }
    echo "\n";
}
echo "\n";

// 11. Hourglass Pattern
echo "11. Hourglass Pattern:\n";
// Upper half
for ($i = $rows; $i >= 1; $i--) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
// Lower half
for ($i = 2; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 12. Butterfly Pattern
echo "12. Butterfly Pattern:\n";
$n = 5;
// Upper half
for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    for ($j = 1; $j <= 2 * ($n - $i); $j++) {
        echo " ";
    }
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
// Lower half
for ($i = $n; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    for ($j = 1; $j <= 2 * ($n - $i); $j++) {
        echo " ";
    }
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 13. Alphabet Triangle
echo "13. Alphabet Triangle:\n";
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j <= $i; $j++) {
        echo chr(65 + $j) . " ";
    }
    echo "\n";
}
echo "\n";

// 14. Binary Pattern
echo "14. Binary Pattern:\n";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo (($i + $j) % 2) . " ";
    }
    echo "\n";
}
echo "\n";

// 15. Hollow Pyramid
echo "15. Hollow Pyramid:\n";
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        if ($k == 1 || $k == (2 * $i - 1) || $i == $rows) {
            echo "*";
        } else {
            echo " ";
        }
    }
    echo "\n";
}
echo "\n";

echo "=== End of Pattern Programs ===\n";
?>
