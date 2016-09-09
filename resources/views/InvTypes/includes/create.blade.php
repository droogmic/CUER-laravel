<!-- resources/views/InvTypes/includes/create.blade.php -->

<div class="panel panel-default">
    <div class="panel-heading">
        New Inventory Item Type
    </div>
    
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
    
        <!-- New InvType Form -->
        <form action="{{ url('invtype/add')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
    
            <!-- InvType Name -->
            <div class="form-group required">
                <label for="invtype-name" class="col-sm-3 control-label">Type Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="invtype-name" class="form-control" value="{{ old('invtype') }}"></textarea>
                </div>
            </div>
            
            <!-- InvType Description -->
            <div class="form-group">
                <label for="invtype-description" class="col-sm-3 control-label">Type Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="invtype-description" class="form-control" value="{{ old('invtype') }}"></textarea>
                </div>
            </div>
            
            <!-- InvType Mass -->
            <div class="form-group">
                <label for="invtype-mass" class="col-sm-3 control-label">Type Mass</label>
                <div class="col-sm-6">
                    <input type="text" name="mass" id="invtype-mass" class="form-control" value="{{ old('invtype') }}" autocomplete="off"></textarea>
                </div>
            </div>
				
    
            <!-- Add InvType Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Inventory Type
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
