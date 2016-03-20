<?php  namespace JoaoJoyce\AI\Normalization; 

class Normalize {

    public static function ordinal_observations($value,$normalized_high,$normalized_low,$N) {
        return ((($normalized_high-$normalized_low) * ($value/$N))) + $normalized_low;
    }

    public static function quantitative_observations($value,$normalized_high,$normalized_low,$data_high,$data_low) {
        return ((($value - $data_low)/($data_high-$data_low))*($normalized_high-$normalized_low))+$normalized_low;
    }

}
 