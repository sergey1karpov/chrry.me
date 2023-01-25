<div class="col-lg-12 allalbums">
    <ul class="list-group list-group-flush">
        <li class="{{$properties->de_border}} list-group-item list-group-item-action text-center pt-2 pb-2" style="border-color: {{$properties->de_border_color}}; background-color: rgba({{$properties->de_background_color_rgba}}, {{$properties->de_transparency}}); border-radius: {{$properties->de_event_round}}px;">
            <div class="row text-center">
                <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                    <div class="@if($properties->de_text_position == 'justify-start') ml-2 @endif @if($properties->de_text_position == 'justify-end') mr-2 @endif flex flex-wrap {{$properties->de_text_position}}">
                        <h2 class="text-3xl font-extrabold dark:text-white" style="text-shadow:{{$properties->de_city_text_shadow_right}}px {{$properties->de_city_text_shadow_bottom}}px {{$properties->de_city_text_shadow_blur}}px {{$properties->de_city_text_shadow_color}} ;font-family: '{{$properties->de_city_font}}', sans-serif; font-size: {{$properties->de_city_font_size}}em; padding: 0; color: {{$properties->de_city_font_color}}">
                            {{$event->city}}
                        </h2>
                    </div>
                    <div class="@if($properties->de_text_position == 'justify-start') ml-2 @endif @if($properties->de_text_position == 'justify-end') mr-2 @endif flex flex-wrap {{$properties->de_text_position}}">
                        <h2 class="text-2xl font-extrabold dark:text-white" style="text-shadow:{{$properties->de_location_text_shadow_right}}px {{$properties->de_location_text_shadow_bottom}}px {{$properties->de_location_text_shadow_blur}}px {{$properties->de_location_text_shadow_color}} ;font-family: '{{$properties->de_location_font}}', sans-serif; font-size: {{$properties->de_location_font_size}}em; padding: 0;color: {{$properties->de_location_font_color}}">
                            {{$event->location}}
                        </h2>
                    </div>
                    <div class="@if($properties->de_text_position == 'justify-start') ml-2 @endif @if($properties->de_text_position == 'justify-end') mr-2 @endif flex flex-wrap {{$properties->de_text_position}}">
                        <h2 class="text-lg font-extrabold dark:text-white" style="text-shadow:{{$properties->de_date_text_shadow_right}}px {{$properties->de_date_text_shadow_bottom}}px {{$properties->de_date_text_shadow_blur}}px {{$properties->de_date_text_shadow_color}} ;font-family: '{{$properties->de_date_font}}', sans-serif; font-size: {{$properties->de_date_font_size}}rem; margin-bottom: 0; color: {{$properties->de_date_font_color}};">
                            @if($properties->de_date_format == 1)
                                {{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}
                            @elseif($properties->de_date_format == 2)
                                {{\Carbon\Carbon::parse($event->date)->format('d.m')}}
                            @elseif($properties->de_date_format == 3)
                                {{ Carbon\Carbon::parse($event->date)->toFormattedDateString() }}
                            @endif
                        </h2>
                        @if($properties->de_show_card_time == 1)
                            <h2 class="ml-2 text-lg font-extrabold dark:text-white" style="text-shadow:{{$properties->de_time_text_shadow_right}}px {{$properties->de_time_text_shadow_bottom}}px {{$properties->de_time_text_shadow_blur}}px {{$properties->de_time_text_shadow_color}} ;font-family: '{{$properties->de_time_font}}', sans-serif; font-size: {{$properties->de_time_font_size}}em; padding: 0; color: {{$properties->de_time_font_color}}">
                                {{$event->time}}
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

