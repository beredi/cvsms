@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">{{__('messages.admin.menu.stock.name')}}</h2>
            @can('create', \App\Models\StockItem::class)
                <a href="{{route('stock-item.create')}}" class="float-right btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> {{__('messages.admin.menu.stock.new-record')}}</a>
            @endcan
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Session::has('stock-item-deleted'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('stock-item-deleted') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('stock-item-updated'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('stock-item-updated') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('stock-item-created'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('stock-item-created') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            @include('admin.stock._allItems', ['items' => $items])
        </div>
    </div>
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('messages.admin.general.delete')}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{__('messages.admin.general.delete_msg')}}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('messages.admin.general.cancel')}}</button>
                    <form action="{{route('stock-item.delete')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" value="" name="thing_id" id="thing_id">
                        <input type="submit" class="btn btn-danger" name="delete" value="{{__('messages.admin.general.delete')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $('body').on('click','.delete-button',function (){
                $('#thing_id').val($(this).data('id'));
            });

            $('#all-stock-items').DataTable( {
                "order": []
            } );
        });
    </script>
@endsection
