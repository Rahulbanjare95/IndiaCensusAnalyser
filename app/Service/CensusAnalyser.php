<?php

namespace App\Service;
use app\Exception\CensusAnalyserException;

class CensusAnalyser
{
    function readCSV($file)
    {
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
        catch(Exception $e){
            $e->getMessage();
        }
    }

    function sortStateNamesByAlphabeticalOrder($file)
    {
        $totalRows[] = $this->readCSV($file);
        usort($totalRows[0], function ($state1, $state2) {
            return $state1[0] <=> $state2[0];
        });
        return $totalRows;
    }

    function sortDataByPopulation($file)
    {
        $totalRows[] = $this->readCSV($file);
        usort($totalRows[0], function ($state1, $state2) {
            return $state2[1] <=> $state1[1];
        });
        return $totalRows;
    }

    function sortDataByAreaInSquareKm($file)
    {
        $totalRows[] = $this->readCSV($file);
        usort($totalRows[0], function ($state1, $state2) {
            return $state2[2] <=> $state1[2];
        });
        return $totalRows;
    }

    function sortDataByDenslyPopulated($file)
    {
        $totalRows[] = $this->readCSV($file);
        usort($totalRows[0], function ($state1, $state2) {
            return $state2[3] <=> $state1[3];
        });
        return $totalRows;
    }
}
