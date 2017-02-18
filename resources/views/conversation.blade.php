@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="ten wide column grid content-container">
        <div class="row">
            <h1 id="prompt-header">We're here to help</h1>
        </div>
        <br>

        <div class="six wide column">

            <div id="someID">
            
            </div>

            <form class="ui form" method = "POST" action="{{url('/get-adviser')}}">
            {{ csrf_field() }}
            <div class="ui big form ">
                <div class="field">
                    <textarea rows="4" name="request" placeholder="Type a message"></textarea>
                </div>
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
    
    var fetchMessages = function() {
        $.ajax({
            dataType: 'json',
            type: "GET",
            url: "/conversation/messages",
            success: function(data) {
            console.log("YATA");
            if(data.length > 0) {
                var j = JSON.parse(data);
                for(var i = 0; i < data.length; i++){
                    var message = j[i];
                    var content = message["content"];
                    $("#someID").append(content);
                }
            }}
        })
    }

    setInterval(fetchMessages, 5000);
</script>

@endsection