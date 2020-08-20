<?php 

namespace App\Service;

class CensusAnalyser {

    function readCSV(){
        if(($h = \fopen("IndiaStateCensusData.csv","r")) != FALSE){
            fgetcsv($h);
            while(($data = \fgetcsv($h,10000,","))!= FALSE){
                    $totalRows[] = $data;
            }    
        }
       return $totalRows;
    }

    function sortDataByPopulation(){
        $totalRows[] = $this->readCSV();
        usort($totalRows, function($pos1, $pos2){
            return $pos1 <=> $pos2;
        });
        print_r($totalRows[0][0][0]);
        return $totalRows[0][0][0];
    }
}

?>