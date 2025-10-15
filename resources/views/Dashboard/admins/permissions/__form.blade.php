<style>
    .all-information {
        border: 1px solid rgba(0, 0, 0, 0.116);
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 10px;
    }

    .adress {
        font-family: "regular";
        font-size: 1rem;
    }

    textarea {
        border: 1px solid rgba(0, 0, 0, 0.116);
    }

    .add-cover {
        position: relative;
    }

    .add-cover img {
        width: 100%;
        height: 300px;

        margin-top: 10px;
    }

    .add-cover button {
        position: absolute;
        top: 20px;
        left: 12px;
        background-color: #e5890a;
        border: 1px solid #e5890a;
        padding: 0.5rem;
        font-family: 'regular';
        border-radius: 10px;
        color: white;
    }

    .add-photo .circle {
        margin-top: -76px;
    }
</style>


<form action="{{ $route }}" method="post" id="roleForm" enctype="multipart/form-data">
    @csrf
    @method($method)

    @include('Dashboard.roles.__permissions',[
    'permissions' => $permissions,
    'user' => $admin
    ])

    <div class="add-new">
       {{-- <button type="button" onclick="{{ isset($role) ? 'editTeacher(' . $role->id . ')' : 'addTeacher()' }}"
                class="add-this">{{ isset($role) ? __('messages.edit') : __('messages.add') }}</button>--}}
        <button type="submit" class="add-this">{{ isset($role) ? __('messages.edit') : __('messages.add') }}</button>
        <a href="{{ $routeIndex }}">
            <button type="button" class="add-back">{{ __('messages.back') }}</button>
        </a>
    </div>
</form>

