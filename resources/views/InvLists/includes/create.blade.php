<!-- resources/views/InvLists/includes/create.blade.php -->

<div class="panel panel-default">
    <div class="panel-heading">
        New Inventory List
    </div>
    
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
    
        <!-- New InvList Form -->
        <form action="{{ url('invlist/add')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
    
            <!-- InvList Name -->
            <div class="form-group required">
                <label for="invlist-name" class="col-sm-3 control-label">List Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="invlist-name" class="form-control" value="{{ old('invlist') }}"></textarea>
                </div>
            </div>
            
            <!-- InvList Description -->
            <div class="form-group">
                <label for="invlist-description" class="col-sm-3 control-label">List Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="invlist-description" class="form-control" value="{{ old('invlist') }}"></textarea>
                </div>
            </div>
    
            <!-- Add InvList Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Inventory List
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
