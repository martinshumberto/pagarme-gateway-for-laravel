<?php
namespace MartinsHumberto\PagarmeGateway\Rules;

class ApiValidation
{
    protected static $validations = [
        '2019-09-01' => [
            'amount'=> 'required|numeric',
            'card_hash'=> 'nullable',
            'card_id' => 'nullable',
            'card_holder_name' => 'nullable',
            'card_expiration_date' => 'required_with:card_holder_name',
            'card_number' => 'required_with:card_holder_name',
            'card_cvv' => 'required_with:card_holder_name|max:4',
            'payment_method' => 'required_with:card_holder_name|in:credit_card,boleto',
            'postback_url' => 'nullable',
            'async' => 'nullable|boolean',
            'installments' => 'nullable|numeric',
            'capture'  => 'nullable|boolean',
            'boleto_expiration_date' => 'required_if:payment_method,boleto|date_format:Y-m-d',
            'soft_descriptor' => 'nullable|max:13',
            'boleto_instructions' => 'nullable|max:255',
            'customer.external_id' => 'required|max:64',
            'customer.name' => 'required|max:64',
            'customer.email' => 'required|email|max:64',
            'customer.documents.*.type' => 'required|in:cpf,cnpj,passaporte',
            'customer.documents.*.number' => 'required|max:50',
            'customer.type' => 'required_with:customer.document|in:individual,company',
            'customer.country' => 'required|size:2',
            'customer.line_1' => 'nullable',
            'customer.line_2' => 'nullable',
            'customer.phone_numbers.*' => 'required',
            'customer.birthday' => 'nullable|date',
            'billing' => 'required|array',
            'billing.name' => 'required',
            'billing.address.country' => 'required|size:2',
            'billing.address.state' => 'required|size:2',
            'billing.address.street' => 'required',
            'billing.address.city' => 'required',
            'billing.address.zipcode' => 'required|size:8',
            'billing.address.neighborhood' => 'nullable',
            'billing.address.street_number' => 'nullable',
            'billing.address.complementary' => 'nullable',
            'billing.address.line_1' => 'nullable',
            'billing.address.line_2' => 'nullable',
            'shipping.name' => 'required',
            'shipping.fee' => 'required',
            'shipping.address.country' => 'required|size:2',
            'shipping.address.state' => 'required|size:2',
            'shipping.address.city' => 'required',
            'shipping.address.street' => 'required',
            'shipping.address.zipcode' => 'required|size:8',
            'shipping.address.neighborhood' => 'nullable',
            'shipping.address.street_number' => 'nullable',
            'shipping.address.complementary' => 'nullable',
            'shipping.address.line_1' => 'nullable',
            'shipping.address.line_2' => 'nullable',
            'items' => 'required|array',
            'items.*.id' => 'required',
            'items.*.title' => 'required',
            'items.*.unit_price' => 'required',
            'items.*.tangible' => 'required',
            'items.*.quantity' => 'required|numeric|min:1',
            'metadata' => 'nullable',
            'split_rules' => 'nullable|array',
            'split_rules.*.recipient_id' => 'required_with:split_rules',
            'split_rules.*.liable' => 'nullable|boolean',
            'split_rules.*.charge_processing_fee' => 'nullable|boolean',
            'split_rules.*.amount' => 'required_without:split_rules.*.percentage',
            'split_rules.*.percentage' => 'required_without:split_rules.*.amount|numeric|between:0,100',
            'split_rules.*.charge_remainder' => 'nullable|boolean',
            'boleto_fine.days' => 'nullable|numeric',
            'boleto_fine.amount' => 'nullable|numeric',
            'boleto_fine.percentage' => 'nullable|numeric',
            'boleto_interest.days' => 'nullable|numeric',
            'boleto_interest.amount' => 'nullable|numeric',
            'boleto_interest.percentage' => 'nullable|numeric',
            'reference_key' => 'nullable',
            'session'  => 'nullable|max:100'
        ],
        'stable' => [
            'code' => 'required_without:customer',
            'customer_id' => 'required_without:customer',
            'customer' => 'required|array',
            'customer.name' => 'required|max:64',
            'customer.email' => 'nullable|email|max:64',
            'customer.document' => 'nullable|max:50',
            'customer.document_type' => 'nullable|in:CPF,CNPJ,PASSPORT',
            'customer.type' => 'required_with:customer.document|in:individual,company',
            'customer.gender' => 'nullable|string|in:male,female',
            'customer.address' => 'nullable|array',
            'customer.address.country' => 'required_with:customer.address|size:2',
            'customer.address.state' => 'required_with:customer.address|size:2',
            'customer.address.city' => 'required_with:customer.address|string',
            'customer.address.zip_code' => 'required_with:customer.address|string',
            'customer.address.line_1' => 'required_with:customer.address|string',
            'customer.address.line_2' => 'required_with:customer.address|string',
            'customer.phones' => 'nullable|array',
            'customer.phones.mobile_phone' => 'nullable|array',
            'customer.phones.mobile_phone.country_code' => 'required_with:customer.phones.mobile_phone|string',
            'customer.phones.mobile_phone.area_code' => 'required_with:customer.phones.mobile_phone|string',
            'customer.phones.mobile_phone.number' => 'required_with:customer.phones.mobile_phone|string',
            'customer.birthday' => 'nullable|date',
            'customer.metadata' => 'nullable',
            'items' => 'required|array',
            'items.*.amount' => 'required|integer|min:1',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.code' => 'nullable',
            'shipping' => 'nullable|array',
            'shipping.amount' => 'nullable|integer|min:1',
            'shipping.description' => 'nullable|string|max:255',
            'shipping.recipient_name' => 'nullable|string|max:255',
            'shipping.recipient_phone' => 'nullable|string|max:255',
            'shipping.address.country' => 'nullable|size:2',
            'shipping.address.state' => 'nullable|size:2',
            'shipping.address.city' => 'nullable|string',
            'shipping.address.zip_code' => 'nullable',
            'shipping.address.line_1' => 'nullable',
            'shipping.address.line_2' => 'nullable',
            'payments' => 'required',
            'payments.*.payment_method' => 'required|in:credit_card,boleto,pix',
            'payments.*.credit_card' => 'required_if:payments.*.payment_method,credit_card',
            'payments.*.credit_card.operation_type' => 'nullable|in:auth_and_capture,auth_only,pre_auth',
            'payments.*.credit_card.installments' => 'nullable|min:1',
            'payments.*.credit_card.statement_descriptor' => 'nullable|max:22',
            'payments.*.credit_card.card_id' => 'nullable',
            'payments.*.credit_card.card_token' => 'nullable',
            'payments.*.credit_card.card.number' => 'required_if:payments.*.payment_method,credit_card|between:13,19',
            'payments.*.credit_card.card.holder_name' => 'required_if:payments.*.payment_method,credit_card|max:64|regex:/[a-zA-Z]+/',
            'payments.*.credit_card.card.holder_document' => 'nullable|between:11,14',
            'payments.*.credit_card.card.exp_month' => 'nullable|between:1,12',
            'payments.*.credit_card.card.exp_year' => 'nullable|date_format:Y',
            'payments.*.credit_card.card.cvv' => 'nullable|between:3,4',
            'payments.*.credit_card.card.label' => 'nullable',
            'payments.*.credit_card.card.billing_address_id' => 'nullable|max:36',
            'payments.*.credit_card.card.billing_address.line_1' => 'nullable|max:256',
            'payments.*.credit_card.card.billing_address.line_2' => 'nullable|max:128',
            'payments.*.credit_card.card.billing_address.country' => 'nullable|size:2',
            'payments.*.credit_card.card.billing_address.state' => 'nullable|size:2',
            'payments.*.credit_card.card.billing_address.city' => 'nullable',
            'payments.*.credit_card.card.billing_address.street' => 'nullable',
            'payments.*.credit_card.card.billing_address.zipcode' => 'nullable|size:8',
            'payments.*.credit_card.card.billing_address.neighborhood' => 'nullable',
            'payments.*.credit_card.card.billing_address.street_number' => 'nullable',
            'payments.*.credit_card.card.billing_address.complementary' => 'nullable',
            'payments.*.boleto' => 'required_if:payments.*.payment_method,boleto',
            'payments.*.boleto.bank' => 'required_if:payments.*.payment_method,boleto|in:001,033,237,341,745,104',
            'payments.*.boleto.instructions' => 'nullable|max:255',
            'payments.*.boleto.due_at' => 'required_if:payments.*.payment_method,boleto',
            'payments.*.boleto.nosso_numero' => 'nullable',
            'payments.*.boleto.type' => 'required_if:payments.*.payment_method,boleto|in:DM,BDP',
            'payments.*.boleto.document_number' => 'required_if:payments.*.payment_method,boleto|max:16',
            'payments.*.pix' => 'required_if:payments.*.payment_method,pix',
            'payments.*.amount' => 'nullable', // Cents
            'closed' => 'nullable|boolean',
            'metadata' => 'nullable',
            'amount' => 'required',
            'device' => 'nullable',
            'location' => 'nullable',
            'ip' => 'nullable|ip',
            'session_id' => 'nullable',
            'antifraud_enabled' => 'nullable|boolean',
            'antifraud' => 'nullable',
            'SubMerchant.Merchant_Category_Code' => 'nullable|max:4',
            'SubMerchant.Payment_Facilitator_Code' => 'nullable',
            'SubMerchant.Code' => 'nullable',
            'SubMerchant.name' => 'nullable',
            'SubMerchant.Document' => 'nullable|in:CPF,CNPJ',
            'SubMerchant.Type' => 'nullable',
            'SubMerchant.phones.home_home.country_code' => 'nullable|size:2',
            'SubMerchant.phones.home_home.area_code' => 'nullable|size:2',
            'SubMerchant.phones.home_home.number' => 'nullable|size:8',
            'SubMerchant.phones.mobile_phone.country_code' => 'nullable|size:2',
            'SubMerchant.phones.mobile_phone.area_code' => 'nullable|size:2',
            'SubMerchant.phones.mobile_phone.number' => 'nullable|size:9',
            'SubMerchant.address.country' => 'nullable|size:2',
            'SubMerchant.address.state' => 'nullable|size:2',
            'SubMerchant.address.city' => 'nullable',
            'SubMerchant.address.street' => 'nullable',
            'SubMerchant.address.zipcode' => 'nullable|size:8',
            'SubMerchant.address.neighborhood' => 'nullable',
            'SubMerchant.address.street_number' => 'nullable',
            'SubMerchant.address.complementary' => 'nullable',
            'SubMerchant.address.line_1' => 'nullable',
            'SubMerchant.address.line_2' => 'nullable',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
