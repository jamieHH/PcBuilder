<?php namespace App\Http\Requests\Web\Components\StorageDevices;

use App\Http\Requests\Web\Components\Request;
use App\Models\ManufacturerQuery;
use App\Models\StorageDeviceFormFactorQuery;
use App\Models\StorageDeviceQuery;
use App\Models\StorageDeviceTypeQuery;
use App\Models\StorageInterfaceTypeQuery;

class StorageDeviceRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
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

    public function getStorageInterfaceType()
    {
        return StorageInterfaceTypeQuery::create()->findOneById($this->get('storage_interface_type_id'));
    }
}
