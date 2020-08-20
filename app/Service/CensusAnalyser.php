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
                usort($totalRows[0], function($pos1, $pos2){
                return $pos2[1] <=> $pos1[1];

                });
                return $totalRows[0][0][0];
     
    }
    function sortDataByAreaInSquareKm(){
        
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function($pos1, $pos2){
        return $pos2[2] <=> $pos1[2];

        });
        return $totalRows[0][0][0];
    }

    // function sortDataByAreaInSquareKm(){

    //     $h = \fopen("IndiaStateCensusData.csv","r");
    //     fgetcsv($h);
    //     $totalRows = array();

    //     while(($data = fgetcsv($h,29,",")) != FALSE ){
    //          $totalRows[] = $data;

    //     }
    //     for($i = 0; $i<=count($totalRows); $i++){
    //     usort($totalRows, function($a, $b){
    //         return $a->$totalRows[0][0][1] <=> $b->$totalRows[0][$i][1];
    //         echo $totalRows[0][i][1];
    //     });
    // }
    
        // $totalRows[] = $this->readCSV();
        // usort($totalRows, function($state1, $state2){
        //     return $state1 <=> $state2;
        // });
        // return $totalRows[0][0][0];
    }

?>