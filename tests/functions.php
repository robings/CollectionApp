<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTests extends TestCase
{
    public function testDisplayTrainSuccess() {
        $expected = '<article><div class=\'item\'><h2>Series 0</h2><img src=\'images/japan-974730_1920.jpg\' alt=\'Series 0 Bullet Train\' /><ul><li><span>Introduced:</span> 1964</li><li><span>Top speed:</span> 220km/h (135mph)</li><li><span>Withdrawn:</span> 2008</li></ul></div></article>';
        $input = [ 'id' =>'1', 'series'=>'0', 'introducedYR'=>'1964', 'topSpeedKMH'=>'220', 'topSpeedMPH'=>'135', 'withdrawn'=>'1', 'withdrawnYR'=>'2008', 'imgURL'=>'images/japan-974730_1920.jpg'];

        $case= displayTrain($input);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayTrainFailureIncorrectIDKeys() {
        $expected = 'error! missing expected array key(s): function collectionBox';
        $input = [ 'id' =>'1', 'version'=>'0', 'introducedYR'=>'1964', 'topSpeedKMPH'=>'220', 'topSpeedMPH'=>'135', 'withdrawn'=>'1', 'withdrawnYR'=>'2008', 'imgURL'=>'images/japan-974730_1920.jpg'];
        $case= displayTrain($input);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayTrainFailureOtherIncorrectIDKeys() {
        $expected = 'error! missing expected array key(s): function collectionBox';
        $input = [ 'id' =>'1', 'series'=>'0', 'introYR'=>'1964', 'topSpeedKMH'=>'220', 'topSpeedMPH'=>'135', 'withdrawn'=>'1', 'withdrawnYR'=>'2008', 'img'=>'images/japan-974730_1920.jpg'];
        $case= displayTrain($input);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayTrainMalformed() {
        $this->expectException(TypeError::class);
        $input = 1;
        $case = displayTrain($input);
    }
    public function testDisplayTrainMalformed2() {
        $this->expectException(TypeError::class);
        $input = 'tee hee hee';
        $case = displayTrain($input);
    }
}
