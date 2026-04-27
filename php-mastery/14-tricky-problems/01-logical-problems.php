<?php
/**
 * Tricky & Logical Problems in PHP
 * Brain Teasers and Programming Challenges
 */

echo "=== Tricky & Logical Problems ===\n\n";

// 1. Swap Two Numbers Without Third Variable
echo "1. Swap Without Third Variable:\n";
$a = 5;
$b = 10;
echo "   Before: a=$a, b=$b\n";
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "   After: a=$a, b=$b\n\n";

// 2. Check if Number is Palindrome
echo "2. Palindrome Number Check:\n";
function isPalindrome($num) {
    $original = $num;
    $reversed = 0;
    while ($num > 0) {
        $reversed = $reversed * 10 + ($num % 10);
        $num = intdiv($num, 10);
    }
    return $original == $reversed;
}
$testNum = 12321;
echo "   $testNum is " . (isPalindrome($testNum) ? "✓ a" : "✗ not a") . " palindrome\n\n";

// 3. Find Missing Number in Array (1-100)
echo "3. Find Missing Number:\n";
$numbers = range(1, 100);
unset($numbers[42]); // Remove one number
$expectedSum = array_sum(range(1, 100));
$actualSum = array_sum($numbers);
$missingNumber = $expectedSum - $actualSum;
echo "   Missing number: $missingNumber\n\n";

// 4. Check Prime Number Efficiently
echo "4. Prime Number Check:\n";
function isPrime($n) {
    if ($n <= 1) return false;
    if ($n <= 3) return true;
    if ($n % 2 == 0 || $n % 3 == 0) return false;
    
    for ($i = 5; $i * $i <= $n; $i += 6) {
        if ($n % $i == 0 || $n % ($i + 2) == 0) {
            return false;
        }
    }
    return true;
}
$testPrimes = [17, 20, 23, 25, 29];
foreach ($testPrimes as $num) {
    echo "   $num is " . (isPrime($num) ? "✓ prime" : "✗ not prime") . "\n";
}
echo "\n";

// 5. Fibonacci Series (Optimized)
echo "5. Fibonacci Series (First 10):\n";
function fibonacci($n) {
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i-1] + $fib[$i-2];
    }
    return $fib;
}
print_r(fibonacci(10));
echo "\n";

// 6. Find Second Largest Number
echo "6. Second Largest Number:\n";
$arr = [5, 8, 2, 9, 1, 9, 7];
$largest = PHP_INT_MIN;
$secondLargest = PHP_INT_MIN;
foreach ($arr as $num) {
    if ($num > $largest) {
        $secondLargest = $largest;
        $largest = $num;
    } elseif ($num > $secondLargest && $num != $largest) {
        $secondLargest = $num;
    }
}
echo "   Array: " . implode(", ", $arr) . "\n";
echo "   Second Largest: $secondLargest\n\n";

// 7. Count Occurrences of Each Character
echo "7. Character Frequency:\n";
$string = "programming";
$frequency = [];
for ($i = 0; $i < strlen($string); $i++) {
    $char = $string[$i];
    if (isset($frequency[$char])) {
        $frequency[$char]++;
    } else {
        $frequency[$char] = 1;
    }
}
echo "   String: $string\n";
foreach ($frequency as $char => $count) {
    echo "   '$char': $count\n";
}
echo "\n";

// 8. Reverse Words in String
echo "8. Reverse Words:\n";
$sentence = "PHP is awesome";
$words = explode(" ", $sentence);
$reversedWords = array_reverse($words);
$reversedSentence = implode(" ", $reversedWords);
echo "   Original: $sentence\n";
echo "   Reversed: $reversedSentence\n\n";

// 9. Check Anagrams
echo "9. Anagram Check:\n";
function areAnagrams($str1, $str2) {
    $arr1 = str_split(strtolower(str_replace(" ", "", $str1)));
    $arr2 = str_split(strtolower(str_replace(" ", "", $str2)));
    sort($arr1);
    sort($arr2);
    return $arr1 == $arr2;
}
$pairs = [
    ["listen", "silent"],
    ["hello", "world"],
    ["The Eyes", "They See"]
];
foreach ($pairs as $pair) {
    $result = areAnagrams($pair[0], $pair[1]) ? "✓ anagrams" : "✗ not anagrams";
    echo "   '{$pair[0]}' & '{$pair[1]}': $result\n";
}
echo "\n";

// 10. Find Duplicate in Array
echo "10. Find Duplicates:\n";
$arr = [1, 2, 3, 4, 2, 5, 3, 6];
$duplicates = [];
$seen = [];
foreach ($arr as $num) {
    if (in_array($num, $seen)) {
        $duplicates[] = $num;
    } else {
        $seen[] = $num;
    }
}
echo "   Array: " . implode(", ", $arr) . "\n";
echo "   Duplicates: " . implode(", ", array_unique($duplicates)) . "\n\n";

// 11. Power Without Using * or /
echo "11. Multiply Without * Operator:\n";
function multiply($a, $b) {
    $result = 0;
    $positive = ($a >= 0 && $b >= 0) || ($a < 0 && $b < 0);
    $a = abs($a);
    $b = abs($b);
    for ($i = 0; $i < $b; $i++) {
        $result += $a;
    }
    return $positive ? $result : -$result;
}
echo "   7 × 8 = " . multiply(7, 8) . "\n";
echo "   -5 × 6 = " . multiply(-5, 6) . "\n\n";

// 12. FizzBuzz Challenge
echo "12. FizzBuzz (1-20):\n";
for ($i = 1; $i <= 20; $i++) {
    $output = "";
    if ($i % 3 == 0) $output .= "Fizz";
    if ($i % 5 == 0) $output .= "Buzz";
    echo ($output ?: $i) . " ";
    if ($i % 10 == 0) echo "\n          ";
}
echo "\n\n";

// 13. Find All Subsets of Array
echo "13. Power Set (All Subsets):\n";
function powerSet($arr) {
    $result = [[]];
    foreach ($arr as $element) {
        foreach ($result as $combination) {
            $result[] = array_merge([$element], $combination);
        }
    }
    return $result;
}
$subsets = powerSet([1, 2, 3]);
echo "   Set: [1, 2, 3]\n";
echo "   Subsets count: " . count($subsets) . "\n\n";

// 14. Check Balanced Parentheses
echo "14. Balanced Parentheses:\n";
function isBalanced($str) {
    $stack = [];
    $pairs = [')' => '(', ']' => '[', '}' => '{'];
    
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (in_array($char, ['(', '[', '{'])) {
            $stack[] = $char;
        } elseif (isset($pairs[$char])) {
            if (empty($stack) || array_pop($stack) != $pairs[$char]) {
                return false;
            }
        }
    }
    return empty($stack);
}
$tests = ["()", "(())", "(()", "([{}])", "([)]"];
foreach ($tests as $test) {
    echo "   '$test': " . (isBalanced($test) ? "✓ balanced" : "✗ unbalanced") . "\n";
}
echo "\n";

// 15. Find Majority Element (> n/2 occurrences)
echo "15. Majority Element:\n";
function findMajority($arr) {
    $candidate = null;
    $count = 0;
    
    foreach ($arr as $num) {
        if ($count == 0) {
            $candidate = $num;
            $count = 1;
        } elseif ($num == $candidate) {
            $count++;
        } else {
            $count--;
        }
    }
    
    // Verify
    $actualCount = 0;
    foreach ($arr as $num) {
        if ($num == $candidate) $actualCount++;
    }
    
    return $actualCount > count($arr) / 2 ? $candidate : null;
}
$arr1 = [3, 3, 4, 2, 3, 3, 3];
$arr2 = [1, 2, 3, 4, 5];
echo "   [3,3,4,2,3,3,3]: " . (findMajority($arr1) ?? "none") . "\n";
echo "   [1,2,3,4,5]: " . (findMajority($arr2) ?? "none") . "\n\n";

// 16. Roman to Integer
echo "16. Roman Numeral to Integer:\n";
function romanToInt($roman) {
    $values = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
    $result = 0;
    $prevValue = 0;
    
    for ($i = strlen($roman) - 1; $i >= 0; $i--) {
        $value = $values[$roman[$i]];
        if ($value < $prevValue) {
            $result -= $value;
        } else {
            $result += $value;
        }
        $prevValue = $value;
    }
    return $result;
}
$romans = ["III", "IV", "IX", "LVIII", "MCMXCIV"];
foreach ($romans as $roman) {
    echo "   $roman = " . romanToInt($roman) . "\n";
}
echo "\n";

// 17. Two Sum Problem
echo "17. Two Sum Problem:\n";
function twoSum($arr, $target) {
    $seen = [];
    foreach ($arr as $index => $num) {
        $complement = $target - $num;
        if (isset($seen[$complement])) {
            return [$seen[$complement], $index];
        }
        $seen[$num] = $index;
    }
    return null;
}
$arr = [2, 7, 11, 15];
$target = 9;
$result = twoSum($arr, $target);
echo "   Array: [" . implode(", ", $arr) . "]\n";
echo "   Target: $target\n";
echo "   Indices: [" . implode(", ", $result) . "]\n\n";

// 18. Longest Palindromic Substring
echo "18. Longest Palindromic Substring:\n";
function longestPalindrome($s) {
    if (strlen($s) < 2) return $s;
    $start = 0;
    $maxLen = 0;
    
    for ($i = 0; $i < strlen($s); $i++) {
        // Odd length
        $len1 = expandAroundCenter($s, $i, $i);
        // Even length
        $len2 = expandAroundCenter($s, $i, $i + 1);
        $len = max($len1, $len2);
        
        if ($len > $maxLen) {
            $maxLen = $len;
            $start = $i - intval(($len - 1) / 2);
        }
    }
    return substr($s, $start, $maxLen);
}

function expandAroundCenter($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
        $left--;
        $right++;
    }
    return $right - $left - 1;
}

$strings = ["babad", "cbbd", "racecar", "hello"];
foreach ($strings as $str) {
    echo "   '$str' → '" . longestPalindrome($str) . "'\n";
}
echo "\n";

echo "=== End of Tricky Problems ===\n";
?>
