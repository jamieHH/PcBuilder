<?php namespace App\Http\Requests\Web\Components\StorageDevices;

use App\Http\Requests\Web\Components\Request;
use App\Models\InterfaceTypeQuery;
use App\Models\ManufacturerQuery;
use App\Models\StorageDeviceFormFactorQuery;
use App\Models\StorageDeviceQuery;
use App\Models\StorageDeviceTypeQuery;

class NewStorageDeviceRequest extends Request
{
    public function authorize()
    {
        return true; // TODO: if user has admin privileges
    }

    public function rules()
    {
        return [
            'manufacturer_id' => 'required|numeric',
            'interface_type_id' => 'required',
            'storage_device_type_id' => 'required',
            'storage_device_form_factor_id' => 'required',
            'name' => 'required',
            'capacity' => 'required',
            'cache' => 'required',
        ];
    }

    public function getStorageDevice()
    {
        return StorageDeviceQuery::create()->findOneById($this->route('id'));
    }

    public function getManufacturer()
    {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }

    public function getStorageDeviceType()
    {
        return StorageDeviceTypeQuery::create()->findOneById($this->get('storage_device_type_id'));
    }

    public function getStorageDeviceFormFactor()
    {
        return StorageDeviceFormFactorQuery::create()->findOneById($this->get('storage_device_form_factor_id'));
    }

    public function getInterfaceType()
    {
        return InterfaceTypeQuery::create()->findOneById($this->get('interface_type_id'));
    }
}
