# Challenge 01

Have the function `findPoint( $strArr )` read the array of strings stored in  `strArr` which will contain 2
 elements: the first element will represent a list of comma-separated numbers sorted in ascending order,
the second element will represent a second list of comma-separated numbers (also sorted).
Your goal is to return a comma-separated string containing the numbers that occur in elements 
of  `strArr`  in sorted order. If there is no intersection, return the string  `false`.


## Examples

```bash
Input: array("1, 3, 4, 7, 13", "1, 2, 4, 13, 15") 
Output: 1,4,13

Input: array("1, 3, 9, 10, 17, 18", "1, 4, 9, 10")
Output: 1,9,10
```

# Ejecutar el challenge 
### Ejecutar con PHP nativo:
```bash
php index.php
```
### Ejecutar con lando:

```bash
lando php index.php
```