<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Util;

class CSVHelper {

    public function __construct() {
        $this->fileToJson('simpsons');
    }

    public function fileToJson($filename) {

        /**
         * https://stackoverflow.com/questions/28118101/convert-csv-to-json-using-php/28118243
         */
        $file_name = __DIR__ . sprintf('/%s.csv', $filename);
        if (($handle = fopen($file_name, "r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
                $csvs[] = fgetcsv($handle, null, ';');
            }
            $datas = [];
            $column_names = [];
            foreach ($csvs[0] as $single_csv) {
                $column_names[] = $single_csv;
            }
            foreach ($csvs as $key => $csv) {
                if ($key === 0) {
                    continue;
                }
                foreach ($column_names as $column_key => $column_name) {
                    $datas[$key-1][$column_name] = $csv[$column_key];
                }
            }
            $json = json_encode($datas, JSON_PRETTY_PRINT);
            fclose($handle);
            file_put_contents(__DIR__ . sprintf('/%s.json', $filename), '{ "data": '.$json.'}');
            echo "************************************************\n";
            echo sprintf("Successfully created file %s.json\n", $filename);
            echo "************************************************\n";
        }


    }


}
new CSVHelper();