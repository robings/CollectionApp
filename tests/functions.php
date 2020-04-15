<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTests extends TestCase
{
    public function testDisplayTrainsSuccess() {
        $expected = '<article><div class=\'item\'><h2>Series 0</h2><img src=\'images/japan-974730_1920.jpg\' alt=\'Series 0 Bullet Train\' /><ul><li><span>Introduced:</span> 1964</li><li><span>Top speed:</span> 220km/h (135mph)</li><li><span>Withdrawn:</span> 2008</li></ul><form action=\'processDelete.php\' method=\'post\'><input type=\'text\' name=\'delete\' hidden value=\'1\' /><input type=\'submit\' value=\'Delete\' /></form></div></article>';
        $expected .= '<article><div class=\'item\'><h2>Series 500</h2><img src=\'images/bullet-train-66091_1280.jpg\' alt=\'Series 500 Bullet Train\' /><ul><li><span>Introduced:</span> 1997</li><li><span>Top speed:</span> 300km/h (185mph)</li><li><span>Withdrawn:</span> still in service</li></ul><form action=\'processDelete.php\' method=\'post\'><input type=\'text\' name=\'delete\' hidden value=\'2\' /><input type=\'submit\' value=\'Delete\' /></form></div></article>';
        $expected .= '<article><div class=\'item\'><h2>Series N700</h2><img src=\'images/bullet-train-1918480_1280.jpg\' alt=\'Series N700 Bullet Train\' /><ul><li><span>Introduced:</span> 2007</li><li><span>Top speed:</span> 300km/h (185mph)</li><li><span>Withdrawn:</span> still in service</li></ul><form action=\'processDelete.php\' method=\'post\'><input type=\'text\' name=\'delete\' hidden value=\'3\' /><input type=\'submit\' value=\'Delete\' /></form></div></article>';

        $input = [];
        $input[] = [ 'id'=> '1', 'series'=>'0', 'introducedYr'=>'1964', 'topSpeedKmh'=>'220', 'topSpeedMph'=>'135', 'withdrawn'=>'1', 'withdrawnYr'=>'2008', 'imgUrl'=> 'images/japan-974730_1920.jpg' ] ;
        $input[] = [ 'id'=>'2', 'series'=>'500', 'introducedYr'=>'1997', 'topSpeedKmh'=>'300', 'topSpeedMph'=>'185', 'withdrawn'=>'0', 'withdrawnYr'=>NULL, 'imgUrl'=>'images/bullet-train-66091_1280.jpg' ];
        $input[] = [ 'id'=>'3', 'series'=>'N700', 'introducedYr'=>'2007', 'topSpeedKmh'=>'300', 'topSpeedMph'=>'185', 'withdrawn'=>'0', 'withdrawnYr'=>NULL, 'imgUrl'=>'images/bullet-train-1918480_1280.jpg'];

        $case= displayTrains($input);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayTrainsFailureIncorrectIDKeys() {
        $expected = 'error! missing expected array key(s): function collectionBox';
        $input = [];
        $input[] = [ 'id' =>'1', 'version'=>'0', 'introducedYr'=>'1964', 'topSpeedKmph'=>'220', 'topSpeedMph'=>'135', 'withdrawn'=>'1', 'withdrawnYr'=>'2008', 'imgUrl'=>'images/japan-974730_1920.jpg'];
        $input[] = [ 'id'=>'2', 'series'=>'500', 'introducedYr'=>'1997', 'topSpeedKmh'=>'300', 'topSpeedMph'=>'185', 'withdrawn'=>'0', 'withdrawnYr'=>NULL, 'imgUrl'=>'images/bullet-train-66091_1280.jpg' ];
        $input[] = [ 'id'=>'3', 'series'=>'N700', 'introducedYr'=>'2007', 'topSpeedKmh'=>'300', 'topSpeedMph'=>'185', 'withdrawn'=>'0', 'withdrawnYr'=>NULL, 'imgUrl'=>'images/bullet-train-1918480_1280.jpg'];

        $case= displayTrains($input);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayTrainsFailureOtherIncorrectIDKeys() {
        $expected = 'error! missing expected array key(s): function collectionBox';
        $input = [];
        $input[] = [ 'id' =>'1', 'series'=>'0', 'introYr'=>'1964', 'topSpeedKmh'=>'220', 'topSpeedMph'=>'135', 'withdrawn'=>'1', 'withdrawnYr'=>'2008', 'img'=>'images/japan-974730_1920.jpg'];
        $input[] = [ 'id'=>'2', 'series'=>'500', 'introducedYr'=>'1997', 'topSpeedKmh'=>'300', 'topSpeedMph'=>'185', 'withdrawn'=>'0', 'withdrawnYr'=>NULL, 'imgUrl'=>'images/bullet-train-66091_1280.jpg' ];
        $input[] = [ 'id'=>'3', 'series'=>'N700', 'introducedYr'=>'2007', 'topSpeedKmh'=>'300', 'topSpeedMph'=>'185', 'withdrawn'=>'0', 'withdrawnYr'=>NULL, 'imgUrl'=>'images/bullet-train-1918480_1280.jpg'];

        $case= displayTrains($input);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayTrainMalformed() {
        $this->expectException(TypeError::class);
        $input = 1;
        $case = displayTrains($input);
    }
    public function testDisplayTrainMalformed2() {
        $this->expectException(TypeError::class);
        $input = 'tee hee hee';
        $case = displayTrains($input);
    }

    //tests for validateStringOnlyAlphaNumeric
    public function testValidateStringOnlyAlphaNumericSuccess() {
        $expected = "N700";
        $input = "N700";

        $case = validateStringOnlyAlphaNumeric($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateStringOnlyAlphaNumericFailure() {
        $expected = "error";
        $input = "N700//";

        $case = validateStringOnlyAlphaNumeric($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateStringOnlyAlphaNumericMalformed() {
        $this->expectException(TypeError::class);
        $input = [];

        $case = validateStringOnlyAlphaNumeric($input);
    }

    //tests for validateSpeed
    public function testValidateSpeedSuccess() {
        $expected = 300;
        $input = "300";

        $case = validateSpeed($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateSpeedFailure() {
        $expected = 0;
        $input = "`E`";

        $case = validateSpeed($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateSpeedMalformed() {
        $this->expectException(TypeError::class);
        $input = [];

        $case = validateSpeed($input);
    }

    //tests for validateYear
    public function testValidateYearSuccess() {
        $expected = 2007;
        $input = "2007";

        $case = validateYear($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateYearFailure() {
        $expected = 0;
        $input = "&//*";

        $case = validateYear($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateYearMalformed() {
        $this->expectException(TypeError::class);
        $input = [];

        $case = validateYear($input);
    }

    //tests for validateURL
    public function testValidateUrlSuccess() {
        $expected = '../images/japan-974730_1920.jpg';
        $input = '../images/japan-974730_1920.jpg';

        $case = validateUrl($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateUrlSuccessSpace() {
        $expected = '../images/japan-974730_1920.jpg';
        $input = ' ../images/japan-974730_1920.jpg';

        $case = validateUrl($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateUrlFailure() {
        $expected = 'error';
        $input = '../images/&``japan-974730_1920.jpg';

        $case = validateUrl($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateUrlMalformed() {
        $this->expectException(TypeError::class);
        $input = [];

        $case = validateUrl($input);
    }

    //tests for validateId
    public function testValidateIdSuccess() {
        $expected = 2;
        $input = "2";

        $case = validateId($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateIdFailure() {
        $expected = 0;
        $input = "hi";

        $case = validateId($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateIdMalformed() {
        $this->expectException(TypeError::class);
        $input = [];

        $case = validateId($input);
    }
}
