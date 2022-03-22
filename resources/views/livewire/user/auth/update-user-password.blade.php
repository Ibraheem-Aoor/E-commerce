<div>
    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success" style="margin: 5px;">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger" style="margin: 5px;">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="panel default-panel">
                <form wire:submit.prevent="updatePassword()">
                    <div class="panel-heading">
                        Update Password
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-8">
                            <label>Current Passwrod:</label>
                            <input type="password" wire:model.lazy="currentPassword" class="form-control">
                            @error('currentPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-8">
                            <label>New Password</label>
                            <input type="password" wire:model.lazy="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group col-sm-8">
                            <label>Confirm New Password</label>
                            <input type="password" wire:model.lazy="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
