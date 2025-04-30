@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Course Categories</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.latest-courses-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category One</label>
                                    <select class="select2" name="category_one">
                                        <option value=""> Please Select </option>
                                        @foreach ($categories as $category)
                                            @if ($category->subCategories->isNotEmpty())
                                                <optgroup label="{{ $category->name }}"></optgroup>
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestCourseSection?->category_one == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_one')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Two</label>
                                    <select class="select2" name="category_two">
                                        <option value=""> Please Select </option>
                                        @foreach ($categories as $category)
                                            @if ($category->subCategories->isNotEmpty())
                                                <optgroup label="{{ $category->name }}"></optgroup>
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestCourseSection?->category_two == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_two')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Three</label>
                                    <select class="select2" name="category_three">
                                        <option value=""> Please Select </option>
                                        @foreach ($categories as $category)
                                            @if ($category->subCategories->isNotEmpty())
                                                <optgroup label="{{ $category->name }}"></optgroup>
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestCourseSection?->category_three == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_three')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Four</label>
                                    <select class="select2" name="category_four">
                                        <option value=""> Please Select </option>
                                        @foreach ($categories as $category)
                                            @if ($category->subCategories->isNotEmpty())
                                                <optgroup label="{{ $category->name }}"></optgroup>
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestCourseSection?->category_four == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_four')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Five</label>
                                    <select class="select2" name="category_five">
                                        <option value=""> Please Select </option>
                                        @foreach ($categories as $category)
                                            @if ($category->subCategories->isNotEmpty())
                                                <optgroup label="{{ $category->name }}"></optgroup>
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestCourseSection?->category_five == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_five')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-download">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M12 17v-6" />
                                        <path d="M9.5 14.5l2.5 2.5l2.5 -2.5" />
                                    </svg>
                                    Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
