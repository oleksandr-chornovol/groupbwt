<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUsersRequest;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Resources\UserResource;
use App\Models\CompanyUser;
use App\Models\Country;
use App\Models\User;

class CountryController extends Controller
{
    public function store(StoreCountryRequest $request)
    {
        return response()->json(Country::create($request->validated()));
    }

    public function getUsers(GetUsersRequest $request)
    {
        $companyIds = Country::whereName(
            $request->validated()['country_name']
        )->first()->companies->pluck('id');

//        First way
        $users = User::select('users.id', 'users.name')
            ->join( 'company_user', 'users.id', '=', 'company_user.user_id')
            ->join('companies', 'company_user.company_id', '=', 'companies.id')
            ->whereIn('companies.id', $companyIds)->get();

//        Second way
//        $users = User::whereIn(
//            'id', CompanyUser::whereIn('company_id', $companyIds)->pluck('id')
//        )->get();

        return UserResource::collection($users);
    }
}
