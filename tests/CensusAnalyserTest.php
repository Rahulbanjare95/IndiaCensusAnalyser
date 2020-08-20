<?php

class CensusAnalyserTest extends \PHPUnit\Framework\TestCase
{
    
    public function testGivenACsvFile_WhenCountsTheRows_ShouldReturnNumberofRows()
    {
        $numberOfRecords = new \App\Service\CensusAnalyser;
        $this->assertEquals(count($numberOfRecords->readCSV()), 29);
    }

    public function testGivenACsvFile_WhenSortedByAlphabeticaOrder_ShouldReturnStateWithAlphabeticallyCorrect()
    {
        $alphabeticalOrder = new \App\Service\CensusAnalyser;
        $this->assertEquals($alphabeticalOrder->sortStateNamesByAlphabeticalOrder(), 'Andhra Pradesh'); 

    }

    public function testGivenACsvFile_WhenCheckedForMostPopulatedState_ShouldReturnMostPopulatedState()
    {
        $mostPopulatedState = new \App\Service\CensusAnalyser;
        $this->assertEquals($mostPopulatedState->sortDataByPopulation(), 'Uttar Pradesh');
    }

    public function testGivenACsvFile_WhenCheckedForLargestStateInArea_ShouldReturnTheLargestState()
    {
        $largestStateInArea = new \App\Service\CensusAnalyser;
        $this->assertEquals($largestStateInArea->sortDataByAreaInSquareKm(), 'Rajasthan');
    }

    public function testGivenACsvFile_WhenCheckedForDensityInPopulation_ShouldReturnMostDenslyPopulated()
    {
        $mostDenslyPopulated = new \App\Service\CensusAnalyser;
        $this->assertEquals($mostDenslyPopulated->sortDataByDenslyPopulated(), 'Bihar');
    }
}
