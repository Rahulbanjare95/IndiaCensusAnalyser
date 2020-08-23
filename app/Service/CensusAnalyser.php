<?php

namespace App\Service;
use app\Exception\CensusAnalyserException;

class CensusAnalyser
{

    function readCSV()
    {
        if (($h = \fopen("IndiaStateCensusData.csv", "r")) != FALSE) {
            fgetcsv($h);
            while (($data = \fgetcsv($h, 10000, ",")) != FALSE) {
                $totalRows[] = $data;
            }
        }
        return $totalRows;
    }

    function readIncorrectCSV($file){
        try{
            if(($h = \fopen($file,"r")) == FALSE){
                throw new Exception();  
            }
            else {
                fgetcsv($h);
            while (($data = \fgetcsv($h, 10000, ",")) != FALSE) {
                $totalRows[] = $data;
            }
            return $totalRows;
            }
        }
        catch ( Exception $e){
            $e->errorMessage();
        }
    }

    function sortStateNamesByAlphabeticalOrder()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($state1, $state2) {
            return $state1[0] <=> $state2[0];
        });
        return $totalRows;
    }

    function sortDataByPopulation()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($state1, $state2) {
            return $state2[1] <=> $state1[1];
        });
        return $totalRows;
    }

    function sortDataByAreaInSquareKm()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($state1, $state2) {
            return $state2[2] <=> $state1[2];
        });
        return $totalRows;
    }

    function sortDataByDenslyPopulated()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($state1, $state2) {
            return $state2[3] <=> $state1[3];
        });
        return $totalRows;
    }
}
