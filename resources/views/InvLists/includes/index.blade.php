<!-- resources/views/InvLists/includes/index.blade.php -->

@if (count($invlists) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-3 text-left">
                    Inventory Lists
                </div>
                <div class="col-sm-6 text-center">
                    {{ $invlists->links() }}
                </div>
                <div class="col-sm-3 text-right">
                    {{ $invlists->currentPage() }} of {{ $invlists->lastPage() }}
                </div>
            </div>
        </div>
        <div class="panel-body">
            {{ $invlists->links() }}
            <table class="table table-striped invlist-table">
                <thead>
                    <th>Name</th>
                    <th>Location</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($invlists as $invlist)
                        <tr>
                            <td class="table-text">
                                <div>
                                    {{ $invlist->name }}
                                </div>
                            </td>
                            <td class="table-text">
                                <div>
                                    {{ $invlist->location_id }}
                                </div>
                            </td>
                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('invlist/'.$invlist->id) }}" method="POST">
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
