<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\TimezoneInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\TimezoneRequest;
use App\Models\Admin\Timezone;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    private $TimezoneRepository;

    public function __construct(TimezoneInterface $TimezoneRepository)
    {
        $this->TimezoneRepository = $TimezoneRepository;
    }

    public function index()
    {
        return $this->TimezoneRepository->all();
    }

    public function show(Timezone $timezone)
    {
        return $this->TimezoneRepository->show($timezone);
    }

    public function store(TimezoneRequest $request)
    {
        $parms = $request->all();

        return $this->TimezoneRepository->store($parms);
    }

    public function update(TimezoneRequest $request, Timezone $timezone)
    {
        $parms = $request->all();

        return $this->TimezoneRepository->update($parms, $timezone);
    }

    public function destroy($id)
    {
        return $this->TimezoneRepository->destroy($id);
    }

    public function setTimezone(Request $request)
    {
        $parms = $request->all();

        return $this->TimezoneRepository->setTimezone($parms);
    }
}
