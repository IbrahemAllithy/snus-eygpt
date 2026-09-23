<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\Web\SiteContentService;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function __construct(private SiteContentService $content)
    {
    }

    public function index()
    {
        return response()->json([
            'status' => 'Success',
            'message' => 'Site content',
            'data' => [
                'groups' => $this->content->grouped(),
            ],
        ]);
    }

    public function update(Request $request)
    {
        $payload = $request->validate([
            'items' => ['required', 'array'],
            'items.*.key' => ['required', 'string'],
            'items.*.value' => ['present'],
        ]);

        try {
            $groups = $this->content->updateMany($payload['items']);
        } catch (\RuntimeException $exception) {
            return response()->json([
                'status' => 'Error',
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'تم حفظ المحتوى',
            'data' => [
                'groups' => $groups,
            ],
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'تم رفع الصورة',
            'data' => $this->content->storeUpload($request->file('file')),
        ]);
    }
}
