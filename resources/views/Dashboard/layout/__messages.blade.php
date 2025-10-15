<style>
    #success-message {
        /* display: none; */
        /* position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        justify-content: center;
        align-items: center; */
        background-color: rgba(187, 230, 183, 0.5);
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

    #error-message {
        /* display: none; */
        /* position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        justify-content: center;
        align-items: center; */
        background-color: rgba(255, 0, 0, 0.5);
        color: white;
        font-size: 20px;
        font-weight: bold;
    }
</style>

@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById("success-message").style.display = "none";
        }, 5000);
    </script>
@endif
@if (session('error'))
    <div id="error-message" class="alert alert-danger">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById("error-message").style.display = "none";
        }, 5000);
    </script>
@endif
@if (session('errors'))
    <div id="error-message" class="alert alert-danger">
        <ul id="errors">
            @foreach (session('errors')->getBag('default')->getMessages() as $error)
                <li>{{ $error[0] }}</li>
            @endforeach
        </ul>
        </div>
    <script>
        setTimeout(function() {
            document.getElementById("error-message").style.display = "none";
        }, 5000);
    </script>
@endif
{{-- @if (session('errors'))
    <div id="success-message" class="alert alert-danger">
        <script>
            var errors = @json(json_decode(session('errors'), true));
            if (errors) {
                var errorMessage = '';
                Object.keys(errors).forEach(function(key) {
                    errorMessage += key + ': ' + errors[key][0] + '\n';
                });
            }

        </script>

        <ul id="errors">
            @foreach (session('errors')->getBag('default')->getMessages() as $error)
                <li>{{ $error[0] }}</li>
            @endforeach
        </ul>


        {{ Session::get('errors') ?? (object) [] }}
        {{ session('errors')->getBag('default')->first() }}
        {{ session('errors') }}
    </div>
    html: `<ul>{{ session('errors')->getBag('default')->first() }}</ul>`,
@endif --}}
