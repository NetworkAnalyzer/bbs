@extends('blog.default')

@section('h1')
  User Information
@endsection

@section('subheading')
  Show your information
@endsection

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Fill out the form below to post thread a content!</p>
                <form name="sentMessage" id="contactForm" novalidate>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Content</label>
                            <textarea rows="5" class="form-control" placeholder="Content" id="message" required data-validation-required-message="Please enter a content."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Tag</label>
                            <input type="text" class="form-control" placeholder="Tag" id="name" required data-validation-required-message="Please enter tag.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

@endsection