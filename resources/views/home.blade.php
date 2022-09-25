@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form id="file-submit-form" method="POST" action="{{ route('fileUpload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="d-inline d-flex gap-2 items-center mb-4 ">
                <button type="submit" name="submit" class=" btn btn-success">Save</button>
                <div style="position:relative;">
                    <a class='btn btn-primary' href='javascript:;'>
                        Upload...
                        <input type="file" accept=".pdf"
                            style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                            name="pdf_upload" onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if (Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif
            </div>
        </form>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between ">
                        <div class="float-left">
                            {{ __('Files') }}
                        </div>
                        <div class="float-right">
                            {{-- <input type="file" name="pdf_upload"  /> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($files as $file)
                            <div
                                class=" m-1 p-2 rounded-end border-left border-primary {{ request()->route('id') == $file->id ? ' bg-info ' : '' }}">
                                <a href="{{ url('home/' . $file->id) }}">
                                    <span class="{{ request()->route('id') == $file->id ? ' text-dark  ' : '' }}">
                                        {{ $file->name }}
                                    </span>
                                </a>
                            </div>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if ($file)
                            <embed src="{{ url($file->path) }}" style="width:100%; height:800px;"% frameborder="0">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
