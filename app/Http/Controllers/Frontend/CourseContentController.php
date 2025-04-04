<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use App\Models\CourseChapterLesson;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourseContentController extends Controller
{
    function createChapterModal(string $id) : String {
        return view('frontend.instructor-dashboard.course.partials.course-chapter-modal', compact('id'))->render();
    }

    function storeChapter(Request $request, string $courseId) : RedirectResponse{
        $request->validate([
            'title' => ['required', 'max:255']
        ]);

        $chapter = new CourseChapter();
        $chapter->title = $request->title;
        $chapter->course_id = $courseId;
        $chapter->instructor_id = Auth::user()->id;
        $chapter->order = CourseChapter::where('course_id', $courseId)->count() + 1;
        $chapter->save();

        return redirect()->back();
    }

    function createLesson(Request $request) : String{
        $courseId = $request->course_id;
        $chapterId = $request->chapter_id;
        return view('frontend.instructor-dashboard.course.partials.chapter-lesson-modal', compact('courseId', 'chapterId'))->render();
    }

    function storeLesson(Request $request) : RedirectResponse{
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'source' => ['required', 'string'],
            'file_type' => ['required', 'in:video,audio,file,pdf,doc'],
            'duration' => ['required'],
            'is_preview' => ['nullable', 'boolean'],
            'downloadable' => ['nullable', 'boolean'],
            'description' => ['required']
        ];

        if($request->filled('file')){
            $rules['file'] = ['required'];
        }else {
            $rules['url'] = ['required'];
        }

        $request->validate($rules);

        $lesson = new CourseChapterLesson();
        $lesson->title = $request->title;
        $lesson->slug = \Str::slug($request->title);
        $lesson->storage = $request->source;
        $lesson->file_path = $request->filled('file') ? $request->file : $request->url;
        $lesson->file_type = $request->file_type;
        $lesson->duration = $request->duration;
        $lesson->is_preview = $request->filled('is_preview') ? 1 : 0;
        $lesson->downloadable = $request->filled('downloadable') ? 1 : 0;
        $lesson->description = $request->description;
        $lesson->instructor_id = Auth::user()->id;
        $lesson->course_id = $request->course_id;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->lesson_type = 'lesson';        //check migration table
        $lesson->order = CourseChapterLesson::where('chapter_id', $request->chapter_id)->count() + 1;
        $lesson->save();

        notyf()->success('Created Successfully!!!');

        return redirect()->back();
    }

    function editChapterModal(string $id) : String
    {
        $editMode = true;
        $chapter = CourseChapter::where(['id' => $id, 'instructor_id' => Auth::user()->id])->firstOrFail();
        return view('frontend.instructor-dashboard.course.partials.course-chapter-modal', compact('chapter', 'editMode'))->render();
    }

    function updateChapterModal(Request $request,string $id) : RedirectResponse{
        // dd($id);
        $request->validate([
            'title' => ['required', 'max:255']
        ]);

        $chapter = CourseChapter::findOrFail($id);
        $chapter->title = $request->title;
        $chapter->save();

        notyf()->success('Updated Successfully!!!');

        return redirect()->back();
    }

    function destroyChapter(string $id) : Response {
        try {
            $chapter = CourseChapter::findOrFail($id);
            $chapter->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        }catch(Exception $e) {
            logger("Course Language Error >> ".$e);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }

    function editLesson(Request $request) : String{
        $editMode = true;
        $courseId = $request->course_id;
        $chapterId = $request->chapter_id;
        $lessonId = $request->lesson_id;
        $lesson = CourseChapterLesson::where(
            [
                'id' => $lessonId,
                'chapter_id' => $chapterId,
                'course_id' => $courseId,
                'instructor_id' => Auth::user()->id
            ]
        )->first();

        return view('frontend.instructor-dashboard.course.partials.chapter-lesson-modal', compact('courseId', 'chapterId', 'lesson', 'editMode'))->render();
    }

    function updateLesson(Request $request, string $id) : RedirectResponse {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'source' => ['required', 'string'],
            'file_type' => ['required', 'in:video,audio,file,pdf,doc'],
            'duration' => ['required'],
            'is_preview' => ['nullable', 'boolean'],
            'downloadable' => ['nullable', 'boolean'],
            'description' => ['required']
        ];

        if($request->filled('file')){
            $rules['file'] = ['required'];
        }else {
            $rules['url'] = ['required'];
        }

        $request->validate($rules);

        $lesson = CourseChapterLesson::findOrFail($id);
        $lesson->title = $request->title;
        $lesson->slug = \Str::slug($request->title);
        $lesson->storage = $request->source;
        $lesson->file_path = $request->filled('file') ? $request->file : $request->url;
        $lesson->file_type = $request->file_type;
        $lesson->duration = $request->duration;
        $lesson->is_preview = $request->filled('is_preview') ? 1 : 0;
        $lesson->downloadable = $request->filled('downloadable') ? 1 : 0;
        $lesson->description = $request->description;
        $lesson->instructor_id = Auth::user()->id;
        $lesson->course_id = $request->course_id;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->lesson_type = 'lesson';        //check migration table
        $lesson->save();

        notyf()->success('Updated Successfully!!!');

        return redirect()->back();
    }

    function destroyLesson(string $id) {
        // dd($id);
        try {
            $lesson = CourseChapterLesson::findOrFail($id);
            $lesson->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        }catch(Exception $e) {
            logger("Course Language Error >> ".$e);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }

    function sortLesson(Request $request, string $id) {
        // dd($request->all());
        $newOrders = $request->order_ids;
        foreach($newOrders as $key => $itemId) {
            $lesson  = CourseChapterLesson::where(['chapter_id' => $id, 'id' => $itemId])->first();
            $lesson->order = $key + 1;
            $lesson->save();
        }

        return response(['status' => 'success', 'message' => 'Updated Successfully!']);
    }

    function sortChapter(string $id) : string {
        $chapters = CourseChapter::where('course_id', $id)->orderBy('order')->get();
        // dd($chapters);

        return view('frontend.instructor-dashboard.course.partials.course-chapter-sort-modal', compact('chapters'))->render();
    }
    
    function updateSortChapter(Request $request, string $id) {
        // dd($request->all());
        $newOrders = $request->order_ids;
        foreach($newOrders as $key => $itemId) {
            $lesson  = CourseChapter::where(['course_id' => $id, 'id' => $itemId])->first();
            $lesson->order = $key + 1;
            $lesson->save();
        }

        return response(['status' => 'success', 'message' => 'Updated Successfully!']);
    }
}
