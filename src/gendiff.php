<?php
namespace Gendiff;

use function \cli\prompt;
use function \cli\line;

//require_once __DIR__ . '/../vendor/docopt/docopt/src/docopt.php';


function run()
{
    $doc = <<<'DOCOPT'
Generate diff

Usage:
  gendiff (-h|--help)
  gendiff (-v|--version)

Options:
  -h --help                     Show this screen
  -v --version                  Show version
DOCOPT;

    $result = \Docopt::handle($doc, array('version' => '1.0.0rc2'));
    foreach ($result as $k => $v) {
        echo $k . ': ' . json_encode($v) . PHP_EOL;
    }

    line('Welcome to the Difference calculator');
}
