<!-- resources/views/InvTypes/includes/index.blade.php -->

@if (count($invtypes) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-3 text-left">
                    Current Inventory Types
                </div>
                <div class="col-sm-6 text-center">
                    {{ $invtypes->links() }}
                </div>
                <div class="col-sm-3 text-right">
                    {{ $invtypes->currentPage() }} of {{ $invtypes->lastPage() }}
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped invtype-table">
                <thead>
                    <th>Name</th>
                    <th>Mass /kg</th>
                    <th>Item Count</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($invtypes as $invtype)
                        <tr>
                            <td class="table-text">
                                <div>
                                    <a href="{{ url('invtype/edit/'.$invtype->id) }}">{{ $invtype->name }}</a>
                                    {{-- $invtype->name --}}
                                </div>
                            </td>
                            <td class="table-text">
                                <div>
                                    {{ $invtype->mass }}
                                </div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <a href="{{ url('invitem/type/'.$invtype->id) }}">{{ $invtype->invitemsCount }}</a>
                                </div>
                            </td>
                            <!-- InvType Delete Button -->
                            <td>
                                <form action="{{ url('invtype/'.$invtype->id) }}" method="POST">
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
