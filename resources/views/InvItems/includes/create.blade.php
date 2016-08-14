<!-- resources/views/InvItems/includes/create.blade.php -->

<div class="panel panel-default">
    <div class="panel-heading">
        New Inventory Item
    </div>
    
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
    
        <!-- New InvItem Form -->
        <form action="{{ url('invitem/add')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
    
            <!-- InvItem Type -->
            <div class="form-group required">
                <label for="invitem-type" class="col-sm-3 control-label">Item Type</label>
                <div class="col-sm-6">
                    <select class="form-control" name="type">
                        <option selected disabled>Type</option>
                        @foreach ($invtypes as $invtype)
                            <option value="{{ $invtype->id }}">{{ $invtype->name }}</option>
                        @endforeach
                    </select>
                    <!--<input type="text" name="type" id="invitem-type" class="form-control" value="{{ old('invitem') }}" required>-->
                </div>
            </div>
            
            <!-- InvItem Reference -->
            <div class="form-group" data-toggle="tooltip" title="Unique reference number">
                <label for="invitem-reference" class="col-sm-3 control-label">Item Reference</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" name="reference" id="invitem-reference" class="form-control" value="{{ old('invitem') }}">
                            <span class="input-group-addon">
                                <a class='my-tool-tip' data-toggle="tooltip" data-placement="left" title="Unique reference number"> <!-- The class CANNOT be tooltip... -->
                                    <i class='glyphicon glyphicon-info-sign'></i>
                                </a>
                            </span>
                        </input>
                    </div>
                </div>
            </div>
    
            <!-- Add InvItem Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Inventory Item
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
