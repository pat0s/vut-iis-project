<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" id="flash-message" class="{{$successOrerror}}">
    <h2>{{$message}}</h2>
</div>
