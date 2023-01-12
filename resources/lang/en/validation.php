<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':Attribute deve ser aceito.',
    'accepted_if'          => 'The :attribute must be accepted when :other is :value.',
    'active_url'           => ':Attribute não é uma URL válida.',
    'after'                => ':Attribute deve ser uma data depois de :date.',
    'after_or_equal'       => ':Attribute deve ser uma data posterior ou igual à :date.',
    'alpha'                => ':Attribute deve conter somente letras.',
    'alpha_dash'           => ':Attribute deve conter letras, números e traços.',
    'alpha_num'            => ':Attribute deve conter somente letras e números.',
    'array'                => ':Attribute deve ser um array.',
    'before'               => ':Attribute deve ser uma data antes de :date.',
    'before_or_equal'      => ':Attribute deve ser uma data anterior ou igual à :date.',
    'between'              => [
        'numeric' => ':Attribute deve estar entre :min e :max.',
        'file'    => ':Attribute deve estar entre :min e :max kilobytes.',
        'string'  => ':Attribute deve estar entre :min e :max caracteres.',
        'array'   => ':Attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => ':Attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de :attribute não confere.',
    'date'                 => ':Attribute não é uma data válida.',
    'current_password'     => 'A senha está errada.',
    'date_equals'          => 'O :attribute deve ser uma data igual a :date.',
    'date_format'          => ':Attribute não confere com o formato :format.',
    'declined'             => 'O :attribute deve ser recusado.',
    'declined_if'          => 'O :attribute deve ser recusado quando :other for :value.',
    'different'            => ':Attribute e :other devem ser diferentes.',
    'digits'               => ':Attribute deve ter :digits dígitos.',
    'digits_between'       => ':Attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => ':Attribute tem dimensões de imagem inválidas.',
    'distinct'             => ':Attribute tem um valor duplicado.',
    'email'                => ':Attribute deve ser um endereço de e-mail válido.',
    'ends_with'            => 'O :attribute deve terminar com um dos seguintes: :values.',
    'enum'                 => 'O :attribute selecionado é inválido.',
    'exists'               => 'O :attribute selecionado é inválido..',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute deve ter um valor.',
    'gt'                   => [
        'numeric'  => 'O :attribute deve ser maior que :value.',
        'file'     => 'O :attribute deve ser maior que :value kilobytes.',
        'string'   => 'O :attribute deve ser maior que os caracteres :value.',
        'array'    => 'O :attribute deve ter mais de :value itens.',
    ],
    'gte'                  => [
        'numeric'  => 'O :attribute deve ser maior ou igual a :value.',
        'file'     => 'O :attribute deve ser maior ou igual a :value kilobytes.',
        'string'   => 'O :attribute deve ser maior ou igual a :value caracteres.',
        'array'    => 'O :attribute deve ter itens :value ou mais.',
    ],
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => ':Attribute é inválido.',
    'in_array'             => ':Attribute não existe em :other.',
    'integer'              => ':Attribute deve ser um inteiro.',
    'ip'                   => ':Attribute deve ser um endereço IP válido.',
    'ipv4'                 => ':Attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => ':Attribute deve ser um endereço IPv6 válido.',
    'json'                 => ':Attribute deve ser um JSON válido.',
    'lt'                   => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file'    => 'O :attribute deve ser menor que :value kilobytes.',
        'string'  => 'O :attribute deve ser menor que :value caracteres.',
        'array'   => 'O :attribute deve ter itens menores que :value.',
    ],
    'lte'                  => [
        'numeric' => 'O :attribute deve ser menor ou igual a :value.',
        'file'    => 'O :attribute deve ser menor ou igual a :value kilobytes.',
        'string'  => 'O :attribute deve ser menor ou igual a :value caracteres.',
        'array'   => 'O :attribute não deve ter mais do que :value itens.',
    ],
    'mac_address' => 'O :attribute deve ser um endereço MAC válido.',
    'max'                  => [
        'numeric' => ':Attribute não deve ser maior que :max.',
        'file'    => ':Attribute não deve ter mais que :max kilobytes.',
        'string'  => ':Attribute não deve ter mais que :max caracteres.',
        'array'   => ':Attribute não deve ter mais que :max itens.',
    ],
    'mimes'                => ':Attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => ':Attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ':Attribute deve ser no mínimo :min.',
        'file'    => ':Attribute deve ter no mínimo :min kilobytes.',
        'string'  => ':Attribute deve ter no mínimo :min caracteres.',
        'array'   => ':Attribute deve ter no mínimo :min itens.',
    ],
    'multiple_of'          => 'O :attribute deve ser um múltiplo de :value.',
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O formato :attribute é inválido.',
    'numeric'              => ':Attribute deve ser um número.',
    'password'             => 'A senha está incorreta.',
    'present'              => 'O :attribute deve estar presente.',
    'prohibited'           => 'O campo :attribute é proibido.',
    'prohibited_if'        => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless'    => 'O campo :attribute é proibido a menos que :other esteja em :values.',
    'prohibits'            => 'O campo :attribute proíbe :other de estar presente.',
    'regex'                => 'O formato :attribute é inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_array_keys'  => 'O campo :attribute deve conter entradas para: :values.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O :attribute é necessário a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values estão presentes.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum destes estão presentes: :values.',
    'same'                 => ':Attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => ':Attribute deve ser :size.',
        'file'    => ':Attribute deve ter :size kilobytes.',
        'string'  => ':Attribute deve ter :size caracteres.',
        'array'   => ':Attribute deve conter :size itens.',
    ],
    'starts_with'          => 'O :attribute deve começar com um dos seguintes: :values.',
    'string'               => 'O :attribute deve ser uma string.',
    'timezone'             => 'O :attribute deve ser um fuso horário válido.',
    'unique'               => 'O :attribute já foi usado.',
    'uploaded'             => 'O :attribute falhou ao ser enviado.',
    'url'                  => 'O formato de :attribute é inválido.',
    'uuid'                 => 'O :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
