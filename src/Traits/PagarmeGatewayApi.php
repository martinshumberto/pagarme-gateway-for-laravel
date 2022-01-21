<?php
namespace MartinsHumberto\PagarmeGateway\Traits;

use Illuminate\Support\Facades\Validator;

trait PagarmeGatewayApi
{
    use PagarmeApi\Transaction;
    use PagarmeApi\Installments;

    public function validate(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $text = '';

            foreach ($errors->all() as $message) {
                $text .= $message . PHP_EOL;
            }

            throw new \Exception($text);
        }
    }
}