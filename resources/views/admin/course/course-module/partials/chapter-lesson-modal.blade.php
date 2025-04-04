<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lesson</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ @$editMode == true ? 
         route('admin.course-content.update-lesson', $lesson->id ) : 
         route('admin.course-content.store-lesson') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $courseId }}">
            <input type="hidden" name="chapter_id" value="{{ $chapterId }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" value="{{ @$lesson?->title }}" name="title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_basic_info_imput form-group mb-3">
                        <label for="">Source</label>
                        <select name="source" id="" class="storage">
                            <option value="">Select</option>
                            @foreach (config('course.video_sources') as $source => $name)
                                <option @selected(@$lesson?->storage == $source) value="{{ $source }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_basic_info_imput upload_source">
                        <label for="#">Path</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control source-input" value="{{ @$lesson?->file_path }}" type="text" name="file">
                        </div>
                    </div>
                    <div class="add_course_basic_info_imput external_source d-none">
                        <label for="#">Path</label>
                        <input type="text" name="url" class="source-input">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_basic_info_imput form-group mb-3">
                        <label for="">File Type</label>
                        <select name="file_type" id="" class="">
                            <option value="">Select</option>
                            @foreach (config('course.file_types') as $source => $name)
                                <option @selected(@$lesson?->file_type == $source) value="{{ $source }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_basic_info_imput form-group mb-3">
                        <label for="">Duration</label>
                        <input type="text" class="form-control" value="{{ @$lesson?->duration }}" name="duration" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check" style="width: 200px">
                            <input @checked(@$lesson?->is_preview == 1) class="form-check-input" type="checkbox" name="is_preview" value="1" id="preview">
                            <label class="form-check-label" for="preview">Is Preview</label>
                        </div>
                        <div class="form-check" style="width: 200px">
                            <input @checked(@$lesson?->downloadable == 1) class="form-check-input" type="checkbox" name="downloadable" value="1" id="downloadable">
                            <label class="form-check-label" for="downloadable">Is Downloadable</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="add_course_basic_info_imput form-group mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="add_course_basic_info_imput" id="" cols="30" rows="10">{!! @$lesson?->description !!}</textarea>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">{{ @$editMode ? 'Update' : 'Create' }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#lfm').filemanager('file', {prefix: '/admin/laravel-filemanager'});
</script>
