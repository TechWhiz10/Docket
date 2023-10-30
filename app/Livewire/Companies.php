<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Company;

class Companies extends Component
{

    use WithFileUploads;

    public $companies, $name, $site, $location, $department, $staff, $logo, $logo_file, $company_id;
    public $is_open = 0, $is_create = 0;

    public function render()
    {
        $this->companies = Company::all();
        return view('livewire.companies.index');
    }

    public function create()
    {
        $this->is_create = true;
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->is_open = true;
    }

    public function closeModal()
    {
        $this->is_open = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->site = '';
        $this->location = '';
        $this->department = '';
        $this->staff = '';
        $this->company_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'site' => 'required',
            'location' => 'required',
            // 'logo' => 'image|max:1024',
        ]);
        if (!$this->logo) {
            $sourcePath = public_path('default_company.jpg');
            $destinationPath = public_path('logos');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath);
            }
            $file = md5($sourcePath . microtime());
            File::copy($sourcePath, $destinationPath . '/' . $file. '.jpg');
            $file = $file. '.jpg';
        } else {
            $file = md5($this->logo . microtime()) . '.' . $this->logo->extension();
            $this->logo->storeAs('logos', $file, 'public_upload');
        }

        Company::updateOrCreate(['id' => $this->company_id], [
            'name' => $this->name,
            'site' => $this->site,
            'location' => $this->location,
            'logo_file' => $file,
        ]);

        session()->flash(
            'message',
            $this->company_id ? 'Company Updated Successfully.' : 'Company Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
        return redirect('/company');
    }

    public function edit($id)
    {
        $this->is_create = false;

        $company = Company::findOrFail($id);
        $this->company_id = $id;
        $this->name = $company->name;
        $this->site = $company->site;
        $this->location = $company->location;

        $this->openModal();
    }

    public function delete($id)
    {
        Company::find($id)->delete();
        session()->flash('message', 'Company Deleted Successfully.');
    }
}
