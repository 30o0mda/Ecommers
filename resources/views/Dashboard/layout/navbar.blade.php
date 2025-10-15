<!-- ======= Start navbar ======= -->
<nav class="navbar">
    <div class="logo-menu">
        <div class="menu">
            <i class="fa-solid fa-angles-right"></i>
        </div>
    </div>

    <div>
        <div class="dropdown d-flex align-items-center">
            <div class="changelocal d-inline-block">
                <div class="dropdown lang"
                    style="width: 100%;display: block; width: 358px !important; margin-top: 0.5rem;">
                    {{-- <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a> --}}
                    <input type="search" id="searchInput" class="search-field" placeholder="بحث ..." />
                    <ul class="dropdown-menu" id="searchResults" style="display: none;">
                        {{-- <li><a class="dropdown-item" href="#">Item 1</a></li>
                        <li><a class="dropdown-item" href="#">Item 2</a></li>
                        <li><a class="dropdown-item" href="#">Item 3</a></li> --}}
                    </ul>
                </div>
            </div>

            <!-- Search Dropdown -->
            {{-- <div class="changelocal d-inline-block">
                <div class="dropdown lang">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <div class="search-container" >
                        <input type="search" id="searchInput" class="search-field" placeholder="بحث ..." />
                        <button type="button" id="clearSearch" class="clear-search-btn"
                            style="display: none;">×</button>
                    </div>
                    <ul id="searchResults" class="dropdown-menu" aria-labelledby="dropdownMenuLink"></ul>
                </div>
            </div> --}}
            {{-- <div class="changelocal d-inline-block">
                <div class="dropdown lang">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- lang -->
                        <i class="fa-regular fa-message"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item"> الاشعارات </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="changelocal d-inline-block">
                <div class="dropdown lang">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- lang -->
                        <i class="fa-regular fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item"> الاشعارات </a>
                        </li>
                    </ul>
                </div>
            </div> --}}

            <button class="dropdown-toggle profile-btn" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <div class="all-pro">
                    <div class="profile">
                        {{-- <img style="width: 20%" src="{{ asset('assets/image/default-user.png') }}" alt="" /> --}}
                    </div>
                    <div class="emmil">
                        <h4>{{ auth()->user()->name ?? '' }}</h4>
                        <p>{{ auth()->user()->email ?? '' }}</p>
                    </div>

                </div>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="#">{{ __('messages.reports') }}</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">{{ __('messages.settings') }}</a>
                </li>
                <li><a class="dropdown-item" href="#">{{ __('messages.log_out') }}</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ======= End navbar ======= -->
<!-- Search Functionality Script -->
{{-- <script>
    const searchField = document.querySelector('.search-field');
    const dropdownMenu = document.getElementById('searchResults');

    searchField.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            dropdownMenu.style.display = 'block'; // إظهار القائمة
        } else {
            dropdownMenu.style.display = 'none'; // إخفاء القائمة
        }
    });

    // إخفاء القائمة إذا خرج المستخدم من مربع البحث
    searchField.addEventListener('blur', function() {
        setTimeout(() => {
            dropdownMenu.style.display = 'none';
        }, 200);
    });

    searchField.addEventListener('focus', function() {
        if (this.value.trim() !== '') {
            dropdownMenu.style.display = 'block';
        }
    });
</script> --}}
<script>
    const searchField = document.getElementById('searchInput');
    const dropdownMenu = document.getElementById('searchResults');

    // Show/hide dropdown menu based on input
    searchField.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            dropdownMenu.style.display = 'block'; // Show dropdown
        } else {
            dropdownMenu.style.display = 'none'; // Hide dropdown
        }
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!searchField.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });

    // Fetch search results
    searchField.addEventListener('input', function() {
        const searchTerm = searchField.value.trim();

        if (searchTerm.length > 0) {
            fetchSearchResults(searchTerm);
        } else {
            dropdownMenu.innerHTML = ''; // Clear results if search term is empty
        }
    });

    function fetchSearchResults(searchTerm) {
        fetch('/admin/search-routes', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ searchTerm: searchTerm })
        })
        .then(response => response.json())
        .then(data => {
            dropdownMenu.innerHTML = ''; // Clear previous results

            if (data.length > 0) {
                data.forEach(route => {
                    const listItem = document.createElement('li');
                    const link = document.createElement('a');
                    link.href = '/' + route.uri;
                    link.textContent = route.name;
                    link.className = 'dropdown-item';
                    listItem.appendChild(link);
                    dropdownMenu.appendChild(listItem);
                });
            } else {
                const listItem = document.createElement('li');
                listItem.textContent = 'No results found';
                listItem.className = 'dropdown-item';
                dropdownMenu.appendChild(listItem);
            }
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
    }
</script>

<!-- Optional: Add some CSS for better styling -->
{{-- <style>
    .search-container {
        position: relative;
        display: inline-block;
    }

    .search-field {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 200px;
    }

    .clear-search-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #999;
    }

    .clear-search-btn:hover {
        color: #333;
    }

    #searchResults {
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
    }

    #searchResults .dropdown-item {
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        display: block;
    }

    #searchResults .dropdown-item:hover {
        background-color: #f8f9fa;
    }
</style> --}}
<style>
    #dropdownMenu {
        width: 353px;
        margin-top: 0.5rem;
    }
</style>
