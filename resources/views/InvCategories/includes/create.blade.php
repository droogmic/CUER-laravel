<!-- resources/views/InvCategories/includes/create.blade.php -->

<div class="panel panel-default">
    <div class="panel-heading">
        New Inventory Category
    </div>
    
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
    
        <!-- New InvCategory Form -->
        <form action="{{ url('invcategory/add')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
    
            <!-- InvCategory Name -->
            <div class="form-group required">
                <label for="invcategory-name" class="col-sm-3 control-label">Category Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="invcategory-name" class="form-control" value="{{ old('invcategory') }}"></textarea>
                </div>
            </div>
            
            <!-- InvCategory Description -->
            <div class="form-group">
                <label for="invcategory-description" class="col-sm-3 control-label">Category Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="invcategory-description" class="form-control" value="{{ old('invcategory') }}"></textarea>
                </div>
            </div>
    
            <!-- Add InvCategory Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Inventory Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
