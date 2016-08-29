<!-- resources/views/InvItems/includes/index.blade.php -->

@if (count($invitems) > 0)
    <div class="panel panel-default">
        <div class="panel-heading container-fluid">
            <div class="row">
                <div class="col-sm-3 text-left">
                    @if( (! empty($invitem_type_name)) && (! empty($invitem_type_id)) )
                        <a href="{{ url('invtype/edit/'.$invitem_type_id) }}">{{ $invitem_type_name }} </a>- Inventory Items
                    @else
                        All Inventory Items
                    @endif
                </div>
                <div class="col-sm-6 text-center">
                    {{ $invitems->links() }}
                </div>
                <div class="col-sm-3 text-right">
                    {{ $invitems->currentPage() }} of {{ $invitems->lastPage() }}
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped invitem-table">
                <thead>
                    <th>Inventory Type</th>
                    <th>Reference Number</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($invitems as $invitem)
                        <tr>
                            <td class="table-text">
                                <div>
                                    <a href="{{ url('invitem/type/'.$invitem->invtype->id) }}">{{ $invitem->invtype->name }}</a>
                                </div>
                            </td>
                            <td class="table-text"><div>{{ $invitem->reference }}</div></td>
                            <!-- InvItem Delete Button -->
                            <td class="text-right">
                                <form action="{{ url('invitem/'.$invitem->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash delete-button"></i>
                                        <!--Delete-->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
