@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="ten wide column grid content-container">
        <div class="row">
            <h1 id="prompt-header">We're here to help</h1>
        </div>
        <br><br>

        <div class="six wide column">

            <form class="ui form" method = "POST" action="{{url('/send-message')}}">
            {{ csrf_field() }}
            <div class="ui big form ">
                <div class="field">
                    <label>What would you like to know?</label>
                    <textarea rows="6" name="request" placeholder="eg. How do I invest my savings"></textarea>
                </div>
            </div>
            <br>
            <button id="done-button-itinerary" type="submit" class="ui huge button button-shaded right floated">Done!</button>
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