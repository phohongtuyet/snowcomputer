@foreach($data as $value)
    <div id="blog-comments" class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
        <div class="blog-comments inner-bottom-xs">
            <h4>{{ $value['name'] }}</h4>
            <span class="review-action pull-right">
                {{ $value['date'] }} 
            </span>
            <p>{{ $value['content'] }}</p>
        </div>
    </div>
@endforeach