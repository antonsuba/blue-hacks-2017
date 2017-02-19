@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="ten wide column grid content-container">
        <div class="row">
            <h1 id="prompt-header">We're here to help</h1>
        </div>
        <br>

        <div class="six wide column">

            <form class="ui form" method = "POST" action="{{url('/get-adviser')}}">
            @for($i = 0; $i < len($list); $i += 2)
                <div id="message-container">
                
                </div>
                <div class="ui section divider"></div>
            @endfor

            <form class="ui form" method = "POST" action="{{url('/conversation/')}}">
            {{ csrf_field() }}
            <div class="ui big form ">
                <div class="field">
                    <textarea rows="4" name="request" placeholder="Type a message"></textarea>
                </div>
                <input type="hidden" name="location">
            </div>
            <br>
            <button id="done-button-itinerary" type="submit" class="ui huge button button-shaded right floated">Send</button>
            </form>

        </div>
    </div>

</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $('.ui.dropdown').dropdown();

    var currentTimestamp = Date.now();
    
    var fetchMessages = function() {
        $.ajax({
            dataType: 'json',
            type: "GET",
            url: "/conversation/messages",
            data: {"currentTimestamp": currentTimestamp}
            success: function(data) {
            currentTimestamp = Date.now();
            if(data.length > 0) {
                var j = JSON.parse(data);
                for(var i = 0; i < data.length; i++){
                    var message = j[i];
                    var content = $("<div></div>").text(message["content"]);
                    $("#message-container").append(content);
                }
            }}
        })
    }

    setInterval(fetchMessages, 5000);
</script>

@endsection