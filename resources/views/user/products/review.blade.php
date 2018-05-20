<div class="additional_info">
    <div class="container">
        <div class="sap_tabs">  
            <div id="horizontalTab1">
                <ul>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>{{ trans('product.title.reviews') }}</span></li>
                </ul>           
                <div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
                    <h4>{{ trans('product.title.review_amount', ['amount' => $product->comments])}}</h4>
                        @if(isset($comments) && !empty($comments))
                            @foreach($comments as $comment)
                                <div class="additional_info_sub_grids">
                                    <div class="col-xs-2 additional_info_sub_grid_left">
                                        <img src="{{ asset(config('custom.image.path_avatar') . '/' . $comment->user->avatar) }}" alt=" " class="img-responsive" />
                                    </div>
                                    <div class="col-xs-10 additional_info_sub_grid_right">
                                        <div class="additional_info_sub_grid_rightl">
                                            {{ $users[$comment->id]->name }}
                                            <h5>{{ $comment->created_at }}</h5>
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                        <div class="additional_info_sub_grid_rightr">
                                            <div class="rating">
                                                @for($i = 0; $i < $comment->rate; $i++)
                                                    <div class="rating-left">
                                                        <img src="{{ asset('assets/Hoang_library/user/images/star-.png') }}" alt=" " class="img-responsive">
                                                    </div>
                                                @endfor
                                                @for($i = 0; $i < 5 - $comment->rate; $i++)
                                                    <div class="rating-left">
                                                        <img src="{{ asset('assets/Hoang_library/user/images/star.png') }}" alt=" " class="img-responsive">
                                                    </div>
                                                @endfor
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            @endforeach
                        @endif
                    <div class="review_grids">
                    @if(Auth::check())  
                        <h5>{{ trans('product.title.add_a_review') }}</h5> 
                        {!! Form::open(
                            [
                                'route' => ['review'],
                                'method' => 'POST',
                                'class' => 'form-horizontal style-form',
                            ]
                        )!!}
                        <div class="form-group">
                            {!! Form::text(
                                'content',
                                null,
                                [
                                    'placeholder' => trans('product.title.add_your_review'),
                                    'class' => 'form-control',
                                    'id' => 'inputReview',
                                    'required'
                                ]
                            ) !!}  
                            {!! Form::hidden('id', $product->id)!!} 
                            <input type="hidden" name="rate" id="rate">
                            {!! Form::close() !!}
                        </div>   
                    </div>                
                    @endif
                </div>                                                            
            </div>  
        </div>
    </div>
</div>
