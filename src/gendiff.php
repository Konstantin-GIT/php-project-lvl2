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
  gendiff [--format <plane>] <firstFile> <secondFile>
  gendiff [--format <json>] <firstFile> <secondFile>
  
  
Options:
  -h --help                     Show this screen
  -v --version                  Show version
  --format <plane>              Report format [default: pretty]
  
DOCOPT;

    $result = \Docopt::handle($doc, array('version' => '1.0.0rc2'));
    foreach ($result as $k => $v) {
        echo $k . ': ' . json_encode($v) . PHP_EOL;
    }

    line('Welcome to the Difference calculator');
}
