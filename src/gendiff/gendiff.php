<?php
namespace Gendiff;

use function \Cli\prompt;
use function \Cli\line;
use function \Ds\set;
use function \Gendiff\Diff\diff;

//require_once __DIR__ . '/../../vendor/docopt/docopt/src/docopt.php';

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
    
    $path1 = $result['<firstFile>'];
    $path2 = $result['<secondFile>'];
     // var_dump($path1);
    $json1 = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "{$path1}");
    $json2 = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "{$path2}");

    print_r($json1);  
    print_r($json2);  

    $str1 = json_decode($json1, true);
    $str2 = json_decode($json2, true);

    $change_str = Diff($str1, $str2);

    var_dump($str1);
    var_dump($str2);   
    print_r($change_str);
 
}
