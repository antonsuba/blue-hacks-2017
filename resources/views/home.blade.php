@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="seven wide column content-container">
    <div id="cards" class="ui two stackable cards">
        
        {{-- @foreach($categories as $category) --}}
        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
        </div>
        {{-- @endforeach --}}

        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
        </div>

        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="card-background centered">
                    
                </div>
            </div>
        </div>

        <div class="ui raised link card" onclick="window.location='/finance">
            <div class="image">
                <div class="card-background centered">
                    
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