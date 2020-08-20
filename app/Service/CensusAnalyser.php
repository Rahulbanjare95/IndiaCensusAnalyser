<?php

namespace App\Service;

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

    function sortStateNamesByAlphabeticalOrder()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($pos1, $pos2) {
            return $pos1[0] <=> $pos2[0];
        });
        return $totalRows[0][0][0];
    }

    function sortDataByPopulation()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($pos1, $pos2) {
            return $pos2[1] <=> $pos1[1];
        });
        return $totalRows[0][0][0];
    }

    function sortDataByAreaInSquareKm()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($pos1, $pos2) {
            return $pos2[2] <=> $pos1[2];
        });
        return $totalRows[0][0][0];
    }

    function sortDataByDenslyPopulated()
    {
        $totalRows[] = $this->readCSV();
        usort($totalRows[0], function ($pos1, $pos2) {
            return $pos2[3] <=> $pos1[3];
        });
        return $totalRows[0][0][0];
    }
}
