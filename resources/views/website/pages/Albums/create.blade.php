@extends('website.layouts.index')
@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Create New Album</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        @include('partial.alert')
                        <form action="{{route('albums.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="inputName">Write Your Name</label>
                                <input type="text" id="inputName" class="form-control"
                                       placeholder="Write Your Name" name="name">
                            </div>
                            <div class="form-group ">
                                <label for="inputName">Type Of Album</label>
                                <select name="type" class="form-control">
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label>Upload Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input name="images[]" type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">
                                    <a>Save</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
    <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
    <script>
        var upload = new FileUploadWithPreview('myUniqueUploadId')
    </script>
    <style>
        .custom-file-container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
@endsection
