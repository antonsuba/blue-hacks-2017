@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="ten wide column grid content-container">
        <div class="row">
            <h1 id="prompt-header">We're here to help</h1>
        </div>
        <br>

        <div class="six wide column">

            @foreach()

            <div class="ui section divider"></div>

            <form class="ui form" method = "POST" action="{{url('/conversation/')}}">
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
    
    
</script>

@endsection