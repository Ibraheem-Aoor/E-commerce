<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Settings\CreateSocialLinksRequest;
use App\Models\Setting;
use App\Traits\GeneralApiTrait;

class SocialLinksSettingsController extends Controller
{
    use GeneralApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  There is only one record and only that record will be updated and won't be deleted.
    public function index()
    {
            $message = 'you Can\'t Delete Or Store new records for social links.';
        return $this->returnData('All Socail Links: ' ,  Setting::all() , $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->returnData('All Links: ' , Setting::findOrFail(1) , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSocialLinksRequest $request, $id)
    {
        $links = Setting::findOrFail(1);
        $links->update($request->all());
        return $this->returnSuccessMessage('Links Updated Successfully' , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
