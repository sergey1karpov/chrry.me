<div class="relative bg-white rounded-lg shadow" style="background-color: black" data-clickAway="true">
    <div href="#" class="relative block overflow-hidden rounded-t-xl bg-[url({{'/'.$event->banner}})] bg-cover bg-center bg-no-repeat">
        <div class="relative  p-2 pt-64 text-white">
            <button type="button" class="absolute top-0 right-0 top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" @if(Route::current()->getName() == 'editEventForm') data-modal-toggle="popup-modal" @else data-modal-toggle="popup-modal{{$event->id}}" @endif>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="bg-[{{$properties->de_oc_bg_color}}] flex justify-between pl-2 pr-2">
        @if($properties->de_date_format == 1)
            <h2 class="text-2xl dark:text-white mr-2" style="text-shadow:{{$properties->de_oc_date_font_shadow_right}}px {{$properties->de_oc_date_font_shadow_bottom}}px {{$properties->de_oc_date_font_shadow_blur}}px {{$properties->de_oc_date_font_shadow_color}} ;font-family: '{{$properties->de_oc_date_font}}', sans-serif; font-size: {{$properties->de_oc_date_font_size}}em; padding: 0;color: {{$properties->de_oc_date_font_color}}">{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}</h2>
        @elseif($properties->de_date_format == 2)
            <h2 class="text-2xl dark:text-white mr-2" style="text-shadow:{{$properties->de_oc_date_font_shadow_right}}px {{$properties->de_oc_date_font_shadow_bottom}}px {{$properties->de_oc_date_font_shadow_blur}}px {{$properties->de_oc_date_font_shadow_color}} ;font-family: '{{$properties->de_oc_date_font}}', sans-serif; font-size: {{$properties->de_oc_date_font_size}}em; padding: 0;color: {{$properties->de_oc_date_font_color}}">{{\Carbon\Carbon::parse($event->date)->format('d.m')}}</h2>
        @elseif($properties->de_date_format == 3)
            <h2 class="text-2xl dark:text-white mr-2" style="text-shadow:{{$properties->de_oc_date_font_shadow_right}}px {{$properties->de_oc_date_font_shadow_bottom}}px {{$properties->de_oc_date_font_shadow_blur}}px {{$properties->de_oc_date_font_shadow_color}} ;font-family: '{{$properties->de_oc_date_font}}', sans-serif; font-size: {{$properties->de_oc_date_font_size}}em; padding: 0;color: {{$properties->de_oc_date_font_color}}">{{ Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</h2>
        @endif
        <h2 class="text-2xl dark:text-white" style="text-shadow:{{$properties->de_oc_time_font_shadow_right}}px {{$properties->de_oc_time_font_shadow_bottom}}px {{$properties->de_oc_time_font_shadow_blur}}px {{$properties->de_oc_time_font_shadow_color}} ;font-family: '{{$properties->de_oc_time_font}}', sans-serif; font-size: {{$properties->de_oc_time_font_size}}em; padding: 0;color: {{$properties->de_oc_time_font_color}}">
            {{$event->time}}
        </h2>
    </div>
    <div class="bg-[{{$properties->de_oc_bg_color}}] flex flex-wrap justify-start pl-2 pr-2">
        <h2 class="text-2xl dark:text-white" style="text-shadow:{{$properties->de_oc_city_font_shadow_right}}px {{$properties->de_oc_city_font_shadow_bottom}}px {{$properties->de_oc_city_font_shadow_blur}}px {{$properties->de_oc_city_font_shadow_color}} ;font-family: '{{$properties->de_oc_city_font}}', sans-serif; font-size: {{$properties->de_oc_city_font_size}}em; padding: 0;color: {{$properties->de_oc_city_font_color}}">{{$event->city}}</h2>
    </div>
    <div class="bg-[{{$properties->de_oc_bg_color}}] flex flex-wrap justify-start pl-2 pr-2">
        <h2 class="text-2xl dark:text-white" style="text-shadow:{{$properties->de_oc_location_font_shadow_right}}px {{$properties->de_oc_location_font_shadow_bottom}}px {{$properties->de_oc_location_font_shadow_blur}}px {{$properties->de_oc_location_font_shadow_color}} ;font-family: '{{$properties->de_oc_location_font}}', sans-serif; font-size: {{$properties->de_oc_location_font_size}}em; padding: 0;color: {{$properties->de_oc_location_font_color}}">{{$event->location}}</h2>
    </div>
    @if($event->description)
        <div class="bg-[{{$properties->de_oc_bg_color}}] flex justify-start p-2">
            <h2 class="text-2xl dark:text-white" style="white-space: pre-wrap; text-shadow:{{$properties->de_oc_description_font_shadow_right}}px {{$properties->de_oc_description_font_shadow_bottom}}px {{$properties->de_oc_description_font_shadow_blur}}px {{$properties->de_oc_description_font_shadow_color}} ;font-family: '{{$properties->de_oc_description_font}}', sans-serif; font-size: {{$properties->de_oc_description_font_size}}em; padding: 0;color: {{$properties->de_oc_description_font_color}}">{{$event->description}}</h2>
        </div>
    @endif
    @if($event->video)
        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
            <x-embed url="{{$event->video}}" aspect-ratio="4:3" />
        </div>
    @endif
    @if($event->media)
        <div>
            {!! $event->media !!}
        </div>
    @endif
    @if($event->btn_text)
        <div>
            <button type="button" class="w-full text-white bg-[{{$properties->de_oc_btn_color}}] font-medium rounded-b-lg text-sm px-5 py-2.5">
                <h2 style="text-shadow:{{$properties->de_oc_btn_text_font_shadow_right}}px {{$properties->de_oc_btn_text_font_shadow_bottom}}px {{$properties->de_oc_btn_text_font_shadow_blur}}px {{$properties->de_oc_btn_text_font_shadow_color}} ;font-family: '{{$properties->de_oc_btn_text_font}}', sans-serif; font-size: {{$properties->de_oc_btn_text_font_size}}em; padding: 0;color: {{$properties->de_oc_btn_text_color}}">{{$event->btn_text}}</h2>
            </button>
        </div>
    @endif
</div>
