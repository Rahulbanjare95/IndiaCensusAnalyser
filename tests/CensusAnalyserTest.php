<?php

class CensusAnalyserTest extends \PHPUnit\Framework\TestCase
{
    
    public function testGivenACsvFile_WhenCountsTheRows_ShouldReturnNumberofRows()
    {
        $numberOfRecords = new \App\Service\CensusAnalyser;
        $this->assertEquals(count($numberOfRecords->readCSV()), 29);
    }

    public function testGivenACsvFile_WhenSortedByAlphabeticaOrder_ShouldReturnStateWithAlphabeticallyFirst()
    {
        $alphabeticalOrder = new \App\Service\CensusAnalyser;
        $array=$alphabeticalOrder->sortStateNamesByAlphabeticalOrder();
        $this->assertEquals($array[0][0][0], 'Andhra Pradesh'); 
    }

    public function testGivenACsvFile_WhenSortedByAlphabeticaOrder_ShouldReturnStateWithAlphabeticallyLast()
    {
        $alphabeticalOrder = new \App\Service\CensusAnalyser;
        $array=$alphabeticalOrder->sortStateNamesByAlphabeticalOrder();
        $this->assertEquals($array[0][28][0], 'West Bengal'); 
    }

    public function testGivenACsvFile_WhenCheckedForMostPopulatedState_ShouldReturnMostPopulatedState()
    {
        $mostPopulatedState = new \App\Service\CensusAnalyser;
        $populatedState = $mostPopulatedState->sortDataByPopulation();
        $this->assertEquals($populatedState[0][0][0], 'Uttar Pradesh');
    }

    public function testGivenACsvFile_WhenCheckedForMostPopulatedState_ShouldReturnLeastPopulatedState()
    {
        $mostPopulatedState = new \App\Service\CensusAnalyser;
        $populatedState = $mostPopulatedState->sortDataByPopulation();
        $this->assertEquals($populatedState[0][28][0], 'Sikkim');
    }

    public function testGivenACsvFile_WhenCheckedForLargestStateInArea_ShouldReturnTheLargestState()
    {
        $largestStateInArea = new \App\Service\CensusAnalyser;
        $largestAreaState = $largestStateInArea->sortDataByAreaInSquareKm();
        $this->assertEquals($largestAreaState[0][0][0], 'Rajasthan');
    }

    public function testGivenACsvFile_WhenCheckedForSmallersStateInArea_ShouldReturnTheSmallestState()
    {
        $largestStateInArea = new \App\Service\CensusAnalyser;
        $largestAreaState = $largestStateInArea->sortDataByAreaInSquareKm();
        $this->assertEquals($largestAreaState[0][28][0], 'Goa');
    }

    public function testGivenACsvFile_WhenCheckedForDensityInPopulation_ShouldReturnMostDenslyPopulated()
    {
        $mostDenslyPopulated = new \App\Service\CensusAnalyser;
        $desnlyPopulatedStates = $mostDenslyPopulated->sortDataByDenslyPopulated();
        $this->assertEquals($desnlyPopulatedStates[0][0][0], 'Bihar');
    }

    public function testGivenACsvFile_WhenCheckedForDensityInPopulation_ShouldReturnLeastDenslyPopulated()
    {
        $mostDenslyPopulated = new \App\Service\CensusAnalyser;
        $desnlyPopulatedStates = $mostDenslyPopulated->sortDataByDenslyPopulated();
        $this->assertEquals($desnlyPopulatedStates[0][28][0], 'Arunachal Pradesh');
    }
}
