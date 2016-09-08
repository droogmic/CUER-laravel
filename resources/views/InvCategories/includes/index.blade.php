<!-- resources/views/InvCategories/includes/index.blade.php -->

@if (count($invcategories) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-3 text-left">
                    Inventory Categories
                </div>
                <div class="col-sm-6 text-center">
                    {{ $invcategories->links() }}
                </div>
                <div class="col-sm-3 text-right">
                    {{ $invcategories->currentPage() }} of {{ $invcategories->lastPage() }}
                </div>
            </div>
        </div>
        <div class="panel-body">
            {{ $invcategories->links() }}
            <table class="table table-striped invcategory-table">
                <thead>
                    <th>Name</th>
					<th>Description</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($invcategories as $invcategory)
                        <tr>
                            <td class="table-text">
                                <div>
                                    {{ $invcategory->name }}
                                </div>
                            </td>
							<td class="table-text">
                                <div>
                                    {{ $invcategory->description }}
                                </div>
                            </td>
                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('invcategory/'.$invcategory->id) }}" method="POST">
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
