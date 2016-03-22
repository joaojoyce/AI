<?php  namespace JoaoJoyce\AI\Normalization; 

class EquilateralNormalization {

    private $values;

    public function __construct(array $values) {
        $this->values = $values;
    }

    public function normalize() {
        $result[0][0] = -1;
        $result[1][0] = 1;
        $n = count($this->values);


        for($k=2; $k<$n; $k++) {
            $f = sqrt($k * $k - 1.0) / $k;
            $r = -1/$k;
            for ($i=0;$i<$k;$i++) {
                $result[$i][$k-1]=$r;
                for($j=0;$j<$k-1;$j++) {
                    if(!array_key_exists($j,$result[$i])) {
                        $result[$i][$j]=0;
                    }
                    $result[$i][$j] *= $f;
                }
            }
            $result[$k][$k-1] = 1.0;
        }

        for($i=0;$i<$n;$i++) {
            for($j=0;$j<$n-1;$j++) {
                if(!array_key_exists($j,$result[$i])) {
                    $result[$i][$j]=0;
                }
            }
        }

        return $result;
    }

}
 