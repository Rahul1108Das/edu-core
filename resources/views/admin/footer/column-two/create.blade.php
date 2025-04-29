@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Footer Link</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.footer-column-two.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-narrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.footer-column-two.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-input-block name="title" placeholder="Enter title" />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="url" placeholder="Enter URL" />
                            </div>
                            <div class="col-md-6">
                                <x-input-toggle-block name="status" label="Status" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>
                                Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
