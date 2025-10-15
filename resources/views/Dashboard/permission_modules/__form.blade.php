<form method="post" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="row">

        {{-- @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.name') }}</label>
                {{-- <span class="text-danger"> ( {{ $localeCode }} )</span> --}}
                <div class="text-input">
                    <input class="form-control" type="text" name="name"
                        value="{{ isset($permission_module) ? $permission_module->name ?? '' : old('name') }}"
                        placeholder={{ __('messages.name') }} required>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>
        {{-- @endforeach --}}

        {{-- @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.description') }}</label>
                {{-- <span class="text-danger"> ( {{ $localeCode }} )</span> --}}
                <div class="text-input">
                    <input class="form-control" type="text" name="description"
                        value="{{ isset($permission_module) ? $permission_module->description ?? '' : old('description') }}"
                        placeholder={{ __('messages.description') }}>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>
        {{-- @endforeach --}}

        {{-- Permissions Section --}}
        {{-- <div class="col-lg-12">
            <div class="form-group">
                <label for="permissions">{{ __('messages.permissions') }}</label>
                @foreach ($permissions as $permission)
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $permission->name }}" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    {{ isset($permission_module) && $permission_module->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <!-- Existing Maps -->
        <div class="form-group">
            <label for="maps">{{ __('messages.maps') }}</label>
            @foreach ($maps as $map)
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $map->name }}" readonly>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <input type="checkbox" name="maps[]" value="{{ $map->id }}"
                                {{ isset($permission_module) && $permission_module->maps->contains('id', $map->id) ? 'checked' : '' }}>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add New Map Button -->
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="add-new-map">
                <i class="fas fa-plus"></i> {{ __('messages.add_new_map') }}
            </button>
        </div>

        <!-- New Map Input (Hidden by Default) -->
        <div id="new-map-container" style="display: none;">
            <div class="form-group">
                <label for="new_map_name">{{ __('messages.new_map_name') }}</label>
                <input type="text" name="new_map_name" id="new_map_name" class="form-control">
            </div>
            <button type="button" class="btn btn-success" id="save-new-map">
                <i class="fas fa-save"></i> {{ __('messages.save_new_map') }}
            </button>
        </div>


    </div>
    <div class="add-new">
        <button type="submit" class="sure">{{ __('messages.save') }}</button>
        <a href="{{ $back }}">
            <button type="button" class="back">{{ __('messages.back') }}</button>
        </a>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addNewMapButton = document.getElementById('add-new-map');
        const newMapContainer = document.getElementById('new-map-container');
        const saveNewMapButton = document.getElementById('save-new-map');

        // Show the new map input fields when the "Add New Map" button is clicked
        addNewMapButton.addEventListener('click', function() {
            newMapContainer.style.display = 'block';
        });

        // Save the new map (you can handle this via AJAX or form submission)
        saveNewMapButton.addEventListener('click', function() {
            const newMapName = document.getElementById('new_map_name').value;

            if (!newMapName) {
                alert('Please enter a name for the new map.');
                return;
            }

            // Send an AJAX request to save the new map
            fetch('{{ route('admin.permissions.store_map') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name: newMapName,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        // Dynamically add the new map to the list
                        const newMap = data.data;
                        const mapsContainer = document.querySelector('.form-group');

                        const newMapInput = document.createElement('div');
                        newMapInput.className = 'input-group mb-3';
                        newMapInput.innerHTML = `
                            <input type="text" class="form-control" value="${newMap.name}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <input type="checkbox" name="maps[]" value="${newMap.id}">
                                </span>
                            </div>
                        `;

                        mapsContainer.appendChild(newMapInput);
                        newMapContainer.style.display = 'none'; // Hide the new map input fields
                    } else {
                        alert('Error saving the new map: ' + data.message);
                    }
                })


                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving the new map.');
                });
        });
    });
</script>
