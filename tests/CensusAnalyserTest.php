<?php

    class CensusAnalyserTest extends \PHPUnit\Framework\TestCase{

        public function testGivenACsvFile_WhenCountsTheRows_ShouldReturnNumberofRows(){
            $numberOfRecords = new \App\Service\CensusAnalyser;
            $this->assertEquals(count($numberOfRecords->readCSV()),29);
        }

        public function testGivenACsvFile_WhenCheckedForMostPopulatedState_ShouldReturnMostPopulatedState(){
            $mostPopulatedState = new \App\Service\CensusAnalyser;
            $this->assertEquals($mostPopulatedState->sortDataByPopulation(),'Uttar Pradesh');
        }

    }

?>