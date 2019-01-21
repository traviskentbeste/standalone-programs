<?php

/**
 * Written by Travis Kent Beste
 */

/**
 * 1,1,2,3,5,8,13,21,34,55
 */

$longopts  = array(
    "index:",
    "help::",
);
$options = getopt('', $longopts);

$index = $options["index"];
$help  = $options["help"];

// they haven't supplied the right type
if ( ($index == '') || $help)
{
	help();
}

$value = getFibonacci($index);
print "index:$index value = $value\n";

/**
 *
 */
function getFibonacci($index)
{

	if ($index <= 1)
	{
		return 1;
	}
	else
	{
		return getFibonacci($index-2) + getFibonacci($index-1);
	}

}

/**
 * help
 */
function help()
{
	print "usage : php ./pascal.php\n";
	print "\t--index : get the value at this index\n";
	print "\t--help  : this menu\n";
	exit;
}
