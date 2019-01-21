<?php

/**
 * Written by Travis Kent Beste
 */

/**
 * 1             | row:0, column:0
 * 1,1           | row:1, column:0,1
 * 1,2,1         | row:2, column:0,1,2
 * 1,3,3,1       | row:3, column:0,1,2,3
 * 1,4,6,4,1     | row:4, column:0,1,2,3,4
 * 1,5,10,10,5,1 | row:5, column:0,1,2,3,4,5
 */

$longopts  = array(
    "type:",
    "row:",
    "column:",
    "help::",
);
$options = getopt('', $longopts);

$row    = $options["row"];
$column = $options["column"];
$type   = $options["type"];

// they want the value, supply the right arguments
if ( ($type == 'value') && ( ($row == '') || ($column == '') ) )
{
	help();
}
// they just want to see the triangle, print to row
if ( ($type == 'triangle') && ($row == '') )
{
	help();
}
// they haven't supplied the right type
if ( ($type != 'value') && ($type != 'triangle') )
{
	help();
}

if ($type == 'value')
{
	$value  = getPascalTriangleValue($row, $column);
	print "row = $row / column=$column\n";
	print "value = $value\n";
}
else if ($type == 'triangle')
{
	for($i = 0; $i <= $row; $i++) {
		$values = [];
		for($j = 0; $j < $i+1; $j++) {
			$values[] = getPascalTriangleValue($i, $j);
		}
		print join(' ', $values) . "\n";
	}
}

/**
 *
 */
function getPascalTriangleValue($row, $column)
{

	if ( ($row <= 0) || ($column <= 0) )
	{
		return 1;
	}
	else if ($row == $column)
	{
		return 1;
	}
	else
	{
		return getPascalTriangleValue($row-1, $column-1) + getPascalTriangleValue($row-1, $column);
	}

}

/**
 * help
 */
function help()
{
	print "usage : php ./pascal.php\n";
	print "\t--type   : value at row/column or triangle for row\n";
	print "\t--row    : row\n";
	print "\t--column : column\n";
	print "\t--help   : this menu\n";
	exit;
}
