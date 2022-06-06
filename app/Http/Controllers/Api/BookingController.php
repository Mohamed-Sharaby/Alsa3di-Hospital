<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookApiRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Http\Services\BookService;
use App\Http\Traits\ApiResponses;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookingController extends Controller
{
    use ApiResponses;

    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = auth('api')->user()->reservations()->with(['doctor.user', 'appointment', 'specialization'])->latest()->paginate(20);
        return $this->apiResponse(new BookCollection($reservations));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookApiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookApiRequest $request)
    {
        $request->merge(['user_id' => auth('api')->id()]);
        $this->service->store($request->all());
        return $this->apiResponse(__('Successfully, We send your reservation to management'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->apiResponse(new BookResource($this->service->show($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = $this->service->show($id);
        if ($item->status == 'new') {
            $item->update(['status' => 'cancelled', 'cancelled_by' => 'user']);
            return $this->apiResponse(__('Updated Successfully'));
        }
        return $this->apiResponse(__('Book must be new to cancel it'), 402);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return $this->deleteResponse();
    }

    public function deleteImage($id)
    {
        $this->service->deleteImg($id);
        return $this->deleteResponse();
    }

    public function services(Request $request)
    {
        return $this->apiResponse(
           $this->service->getServices($request->all())->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->name
            ])
        );
    }

    public function branches()
    {
        return $this->apiResponse(
            Branch::active()->get()->map(fn($branch) => [
                'id' => $branch->id,
                'name' => $branch->name
            ])
        );
    }

    public function specializations()
    {
        return $this->apiResponse(
            Specialization::active()->get()->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->name
            ])
        );
    }

    public function doctors(Request $request)
    {
        return $this->apiResponse(
            $this->service->getDoctors($request->all())->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->user->name
            ])
        );
    }

    public function doctorAppointments(Request $request, $id)
    {
        $request->merge(['doctor' => $id]);
        if (!$request->has('date')) $request->merge(['date' => Carbon::now()]);
        return $this->apiResponse(
            $this->service->getTimeSlots($request->all())
        );
    }

}
