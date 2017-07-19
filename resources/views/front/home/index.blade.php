@extends('layouts.index')
@section('promo')
<div class="promo-block-v1 promo-block-v1-bg-img-v3 fullheight text-center">
    <div class="container vertical-center-aligned">
        <h1 class="promo-block-v1-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">Hello World</h1>
        <p class="promo-block-v1-text margin-b-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
            小榻琴心展，长缨剑胆舒。
        </p>
    </div>
</div>
<div class="bg-color-sky-light">
    <div class="container-sm">
        <div class="bg-color-white border-1 padding-40 margin-t-o-80">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-v1 margin-b-20 text-center">
                        <h2 class="heading-v1-title">碎碎念</h2>
                        <span class="heading-v1-subtitle">我好像在哪见过你</span>
                    </div>

                    <p>我将在茫茫人海中寻访我唯一之灵魂伴侣。</p>
                    <p>得之，我幸；不得，我命。</p>
                </div>
            </div>
        </div>
        <div class="content"></div>
    </div>
</div>

<div class="content-md container" id="pageScroll">
    <div class="heading-v3 text-center">
        <h2 class="heading-v3-title">Great Diary</h2>
        <div class="divider-v3"><div class="divider-v3-element"><i class="divider-v3-icon fa fa-skyatlas"></i></div></div>
        <p class="heading-v3-text">It's the small details that will make a big difference</p>
    </div>
</div>
@endsection
@section('content')
<div class="masonry-grid">
    @if($articles)
    @foreach($articles as $v)
    <div class="masonry-grid-item col-1">
        <article class="blog-grid">
            <div class="blog-grid-box-shadow">
                <div class="blog-grid-content">
                    <h2 class="blog-grid-title-md"><a href="{{url('article/'.$v->id)}}">{{$v->title}}</a></h2>
                    @if($v->img)
                        <div class="starImg">
                            <a href="{{url('article/'.$v->id)}}"><img class="img-responsive margin-b-10" src="{{$v->img}}" alt="{{$v->title}}"></a>
                        </div>
                    @endif
                    <p>{!!$v->intro!!}</p>
                </div>
                <div class="blog-grid-supplemental">
                    <span class="blog-grid-supplemental-title">
                        <a class="blog-grid-supplemental-category" href="{{url('cate/'.$v->category_id)}}"><i class="fa fa-leaf"></i> {!!$cate[$v->category_id]!!}</a>
                         -  <i class="fa fa-clock-o"></i> {{$v->created_at}}
                    </span>
                    <span class="blog-grid-supplemental-title pull-right">
                        <i class="fa fa-eye"></i> {{Redis::get(config('admin.global.redis.article_view').$v->id)}}
                    </span>
                </div>
            </div>
        </article>
    </div>
    @endforeach
    @endif
</div>
{!! $articles->fragment('pageScroll')->links() !!}
@endsection