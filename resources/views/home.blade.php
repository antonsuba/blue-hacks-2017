@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="seven wide column content-container">
    <div id="cards" class="ui two stackable cards">
        
        {{-- @foreach($categories as $category) --}}
        {{-- <div class="ui raised link card" onclick="window.location='/{{$category->name}}"> --}}
        <div class="ui raised link card" onclick="window.location='/finance'">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">Financial</span>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}

        <div class="ui raised link card" onclick="window.location='/finance'">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">Medical</span>
                </div>
            </div>
        </div>

        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">Legal</span>
                </div>
            </div>
        </div>

        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">Technology</span>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="four wide column content-container">
    <div id="cards" class="ui one stackable cards">
        
        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="prev-conversation-card centered">
                    
                </div>
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">Your previous conversation</span>
                </div>
            </div>
        </div>
    </div>

    </div>

</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $('.ui.dropdown').dropdown();
    
    
</script>

@endsection