        <div class="flex-1 overflow-y-auto content-scroll">
            <div class="p-8 max-w-[1200px] mx-auto">
                {{-- Success Message --}}
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
                @endif

                {{-- Error Message --}}
                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif