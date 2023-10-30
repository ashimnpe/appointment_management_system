@extends('layout.app')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper p-3">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->

@endsection

