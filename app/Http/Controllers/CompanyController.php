<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserToCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Models\CompanyUser;

class CompanyController extends Controller
{
    public function store(StoreCompanyRequest $request)
    {
        return response()->json(Company::create($request->validated()));
    }

    public function addUser(AddUserToCompanyRequest $request)
    {
        return response()->json(CompanyUser::create($request->validated()));
    }
}
