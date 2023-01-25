<div class="col-lg-12 allalbums">
    <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action text-center" style="border-radius: {{$properties->de_event_round}}px;">
            <div href="#" class="relative block overflow-hidden bg-[url({{'/'.$event->banner}})] bg-cover bg-center bg-no-repeat" style="border-radius: {{$properties->de_event_round}}px;">
                <div class="relative bg-black bg-opacity-40 p-8 pt-32 text-white">
                    <div class="flex flex-wrap {{$properties->de_text_position}}">
                        <h2 class="text-2xl mr-2 font-extrabold dark:text-white" style="text-shadow:{{$properties->de_city_text_shadow_right}}px {{$properties->de_city_text_shadow_bottom}}px {{$properties->de_city_text_shadow_blur}}px {{$properties->de_city_text_shadow_color}} ;font-family: '{{$properties->de_city_font}}', sans-serif; font-size: {{$properties->de_city_font_size}}em; padding: 0; color: {{$properties->de_city_font_color}}">
                            {{$event->city}}
                        </h2>
                        <h2 class="text-2xl font-extrabold dark:text-white" style="text-shadow:{{$properties->de_location_text_shadow_right}}px {{$properties->de_location_text_shadow_bottom}}px {{$properties->de_location_text_shadow_blur}}px {{$properties->de_location_text_shadow_color}} ;font-family: '{{$properties->de_location_font}}', sans-serif; font-size: {{$properties->de_location_font_size}}em; padding: 0;color: {{$properties->de_location_font_color}}">
                            {{$event->location}}
                        </h2>
                    </div>
                    <div class="flex flex-wrap {{$properties->de_text_position}}">
                        <h2 class="text-lg font-extrabold dark:text-white mr-2" style="text-shadow:{{$properties->de_date_text_shadow_right}}px {{$properties->de_date_text_shadow_bottom}}px {{$properties->de_date_text_shadow_blur}}px {{$properties->de_date_text_shadow_color}} ;font-family: '{{$properties->de_date_font}}', sans-serif; font-size: {{$properties->de_date_font_size}}rem; margin-bottom: 0; color: {{$properties->de_date_font_color}};">
                            @if($properties->de_date_format == 1)
                                {{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}
                            @elseif($properties->de_date_format == 2)
                                {{\Carbon\Carbon::parse($event->date)->format('d.m')}}
                            @elseif($properties->de_date_format == 3)
                                {{ Carbon\Carbon::parse($event->date)->toFormattedDateString() }}
                            @endif
                        </h2>
                        @if($properties->de_show_card_time == 1)
                            <h2 class="text-lg font-extrabold dark:text-white" style="text-shadow:{{$properties->de_time_text_shadow_right}}px {{$properties->de_time_text_shadow_bottom}}px {{$properties->de_time_text_shadow_blur}}px {{$properties->de_time_text_shadow_color}} ;font-family: '{{$properties->de_time_font}}', sans-serif; font-size: {{$properties->de_time_font_size}}em; padding: 0; color: {{$properties->de_time_font_color}}">
                                {{$event->time}}
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>









