<?php

namespace App\Http\Controllers;

use App\Http\Requests\PDFUploadRequest;
use App\Models\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    /**
     * File Uploading Process
     *
     * @param $file
     * @return
     */
    public function fileUploader($file)
    {
        /** get PDF NAME */
        $originalName = $file->getClientOriginalName();

        /** get PDF type */
        $type = $file->getType();

        /** Generate Unique Name */
        $fileName = time() . "_" . $originalName;

        $path = public_path('/uploads/');
        /** file moving... */
        $file->move($path, $fileName);
        $newPath = "/uploads/" . $fileName;
        return [
            'name' => $originalName,
            'path' => $newPath,
            'type' => $type,
        ];
    }

    /**
     * Uploading PDF File
     *
     * @param Request $request
     * @return void
     */
    public function uploadFile(PDFUploadRequest $request)
    {
        try {
            $file = $request['pdf_upload'];
            $data = $this->fileUploader($file);
            $data['user_id'] = auth()->user()->id;
            $file = File::create($data);
            return back()->with('success', 'File has been uploaded.');
        } catch (\Exception $e) {
            return back()->with('errors', $e->getMessage());
        }
    }
}
