@extends('web.layouts.app')
@section('title', 'Courses')
@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">Create Course</h5>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" name="title" type="text" placeholder="Title">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="short_description">Short Description</label>
                    <input class="form-control" id="short_description" name="short_description" type="text" placeholder="Short Description">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="outcomes">Outcomes</label>
                    <textarea class="form-control" id="outcomes" name="outcomes" type="text" placeholder="Outcomes" rows="5"></textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="requirements">Requirements</label>
                    <textarea class="form-control" id="requirements" name="requirements" type="text" placeholder="Requirements" rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" type="text" placeholder="Description" rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary" id="button-generate" type="button">Generate AI Content</button>
            </div>
            <div class="col-6">
                <button class="btn btn-success float-end" type="button">Create</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(function() {
            $('#button-generate').click(function () {
                let invalidFeedbackContainer = $('.invalid-feedback');
                let buttonGenerate = $('#button-generate');

                buttonGenerate.attr('disabled', 'disabled');

                $.ajax({
                    url: '/api/contents',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        title: $('#title').val()
                    },
                    success: function (response) {
                        if (response.contents) {
                            invalidFeedbackContainer.addClass('d-none');
                            $('#short_description').val(response.contents.short_description);
                            $('#outcomes').text(response.contents.outcomes);
                            $('#requirements').text(response.contents.requirements);
                            $('#description').text(response.contents.description);
                            buttonGenerate.removeAttr('disabled', 'disabled');
                        }
                    },
                    error: function (xhr, status, error) {
                        invalidFeedbackContainer.text('Error fetching contents: ' + error);
                        invalidFeedbackContainer.addClass('d-block');
                        buttonGenerate.removeAttr('disabled', 'disabled');
                    },
                });
            });
        });
    </script>
@endpush
