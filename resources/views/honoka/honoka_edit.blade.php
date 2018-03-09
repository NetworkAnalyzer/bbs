@extends('honoka.honoka')

@section('title')
    BBS -新規投稿-
@endsection

@section('content')
    {{-- 編集フォーム--}}
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">新規投稿</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">投稿内容</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                                    <span class="help-block">注意事項</span>
                                </div>
                            </div>
                            <div>
                                <p><a class="btn btn-primary">投稿する</a></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection