<?php namespace App\Http\Requests\Web\Components\Motherboards;

class UpdateMotherboardRequest extends MotherboardRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'manufacturer_id' => 'required|numeric',
            'cpu_socket_id' => 'required|numeric',
            'mainboard_chipset_id' => 'required|numeric',
            'motherboard_form_factor_id' => 'required|numeric',
        ];
    }
}
