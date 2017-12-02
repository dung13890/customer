<div class="form-comment">
    <div class="box-comment">
        @if (count($item->comments))
        @foreach ($item->comments as $comment)
        <section class="comment-list">
            <article class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                        <img class="img-responsive" src="/frontend/images/avatar_2x.png" />
                    </figure>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i> {{ $comment->name }}</div>
                                <time class="comment-date"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</time>
                            </header>
                            <div class="comment-post">
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        @endforeach
        @endif
    </div>
    <h4>Bình luận</h4>
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    {{ Form::open([
        'url' => route('home.comment'),
        'role'  => 'form',
        'autocomplete'=>'off',
    ]) }}
    {{ Form::hidden('url', Request::url()) }}
    {{ Form::hidden('type', strtolower(class_basename($item))) }}
    {{ Form::hidden('type_id', $item->id) }}
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label></label>
                    <input class="form-control" type="text" placeholder="Họ và tên" name="name" @if(Session::has('message')) autofocus @endif />
                </div>
                <div class="col-sm-6">
                    <label></label>
                    <input class="form-control" type="email" placeholder="Email" name="email" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" type="text" rows="3" placeholder="Nhập nội dung" name="content"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Gửi</button>
        </div>
    {{ Form::close() }}
</div>
