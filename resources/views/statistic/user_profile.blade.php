<div class="modal fade" id="exampleModalStat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
    <div class="modal-dialog" style="margin: 0">
        <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border-radius: 0">
            <div class="block-modal modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                <h5 class="modal-title" id="exampleModalLabel">Просмотры профиля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0">
                <div class="block-modal accordion @if($user->dayVsNight) bg-dark text-white-50 @endif" id="accordionExample" >
                    <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="block-modal accordion-button @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                @lang('app.s_day')
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h1 class="display-4" style="margin: 0">{{count($day['stat'])}}</h1>
                                <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($day['uniqueCity'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->city}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($day['uniqueCountry'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->country}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="block-modal accordion-button collapsed @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @lang('app.s_month')
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h1 class="display-4" style="margin: 0">{{count($month['stat'])}}</h1>
                                <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($month['uniqueCity'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->city}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($month['uniqueCountry'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->country}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="block-modal accordion-button collapsed @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                @lang('app.s_year')
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h1 class="display-4" style="margin: 0">{{count($year['stat'])}}</h1>
                                <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($year['uniqueCity'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->city}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($year['uniqueCountry'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->country}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="block-modal accordion-button collapsed @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                @lang('app.s_all')
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h1 class="display-4" style="margin: 0">{{count($all['stat'])}}</h1>
                                <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($all['uniqueCity'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->city}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
                                <ul class="list-group mb-3">
                                    @foreach($all['uniqueCountry'] as $c)
                                        <li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                                            {{$c->country}}
                                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
