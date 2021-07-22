<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Util;

use Unicate\Swindler\Core\GenericLocale;
use Unicate\Swindler\Core\LocaleInterface;

class AddressHelper {




    public function fileToArray(): Address {
        $f_contents = file(__DIR__ . "/adresses.csv");
        //file_put_contents(__DIR__ . "/adresses.json", serialize($f_contents));
        //file_put_contents(__DIR__ . "/adresses.json", print_r($f_contents, true));
        //file_put_contents(__DIR__ . "/adresses.json", json_encode($f_contents, JSON_PRETTY_PRINT));


        //$csv= file_get_contents($file_name);

        /**
         * https://stackoverflow.com/questions/28118101/convert-csv-to-json-using-php/28118243
         */
        $file_name = __DIR__ . "/adresses.csv";
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
            //print_r($json);
            file_put_contents(__DIR__ . "/adresses.json", '{ "data": '.$json.'}');
        }


        return $this;
    }


}