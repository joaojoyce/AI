<?php  namespace JoaoJoyce\AI\Normalization;

class Denormalize {

    public static function ordinal_observations($value,$normalized_high,$normalized_low,$N) {
        return ($N * (($value) - $normalized_low)) / ($normalized_high-$normalized_low);
    }

    public static function quantitative_observations($value,$normalized_high,$normalized_low,$data_high,$data_low) {
        return (($data_low - $data_high) * $value - ($normalized_high*$data_low) + ($data_high*$normalized_low)) / ($normalized_low - $normalized_high);
    }

}

 