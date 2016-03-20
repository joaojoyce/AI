<?php

use JoaoJoyce\AI\Normalization\Denormalize;
use JoaoJoyce\AI\Normalization\Normalize;

class NormalizeTest extends PHPUnit_Framework_TestCase {

    public function testOrdinalObservations() {
        $normalized_low = -1;
        $normalized_high = 1;
        $N = 14;

        $value = 7;
        $result = Normalize::ordinal_observations($value,$normalized_high,$normalized_low,$N);
        $this->assertEquals(0,$result);
        $result = Denormalize::ordinal_observations($result,$normalized_high,$normalized_low,$N);
        $this->assertEquals(7,$result);

        $value=0;
        $result = Normalize::ordinal_observations($value,$normalized_high,$normalized_low,$N);
        $this->assertEquals(-1,$result);
        $result = Denormalize::ordinal_observations($result,$normalized_high,$normalized_low,$N);
        $this->assertEquals(0,$result);

        $value=14;
        $result = Normalize::ordinal_observations($value,$normalized_high,$normalized_low,$N);
        $this->assertEquals(1,$result);
        $result = Denormalize::ordinal_observations($result,$normalized_high,$normalized_low,$N);
        $this->assertEquals(14,$result);

    }

    public function testQuantitativeObservation() {
        $normalized_low = -1;
        $normalized_high = 1;
        $data_low = 100;
        $data_high = 4000;

        $value = 1000;
        $result = Normalize::quantitative_observations($value,$normalized_high,$normalized_low,$data_high,$data_low);
        $this->assertEquals(-0.54,round($result,2),'',0.2);
        $result = Denormalize::quantitative_observations($result,$normalized_high,$normalized_low,$data_high,$data_low);
        $this->assertEquals(1000,$result);

    }

}
 